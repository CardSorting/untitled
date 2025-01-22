<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use App\Services\DallEService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StickerController extends Controller
{
    protected $dallEService;

    public function __construct(DallEService $dallEService)
    {
        $this->dallEService = $dallEService;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $stickers = auth()->user()->stickers()->latest()->paginate(12);
        return view('stickers.index', compact('stickers'));
    }

    public function create()
    {
        return view('stickers.create');
    }

    public function store(GenerateStickerRequest $request)
    {
        try {
            // Generate image with DALL-E
            $imageData = $this->dallEService->generateSticker(
                $request->subject,
                $request->expression,
                $request->custom_style
            );
            
            // Process and save the image
            $processedImage = $this->dallEService->processImage($imageData);
            $filename = 'stickers/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $processedImage);

            // Create sticker record
            $template = DallEService::EXPRESSIONS[strtolower($request->expression)];
            $prompt = str_replace('{subject}', $request->subject, $template);
            if ($request->custom_style) {
                $prompt .= " Style: {$request->custom_style}.";
            }

            $sticker = auth()->user()->stickers()->create([
                'subject' => $request->subject,
                'expression' => $request->expression,
                'prompt' => $prompt,
                'image_path' => $filename,
                'size' => $request->size ?? '1024x1024',
                'style' => $request->style ?? 'default',
                'custom_style' => $request->custom_style,
            ]);

            return redirect()->route('stickers.show', $sticker)
                ->with('success', 'Sticker generated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to generate sticker: ' . $e->getMessage());
        }
    }

    public function show(Sticker $sticker)
    {
        $this->authorize('view', $sticker);
        return view('stickers.show', compact('sticker'));
    }

    public function destroy(Sticker $sticker)
    {
        $this->authorize('delete', $sticker);
        
        if ($sticker->image_path) {
            Storage::disk('public')->delete($sticker->image_path);
        }
        
        $sticker->delete();
        
        return redirect()->route('stickers.index')
            ->with('success', 'Sticker deleted successfully!');
    }
}
