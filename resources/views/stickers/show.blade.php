<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sticker Details') }}
            </h2>
            <a href="{{ route('stickers.index') }}" class="text-blue-500 hover:text-blue-700">
                &larr; Back to Stickers
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($sticker->status === 'completed')
                            <div class="flex justify-center items-center">
                                <img 
                                    src="{{ Storage::url($sticker->image_path) }}"
                                    alt="{{ ucfirst($sticker->expression) }} {{ $sticker->subject }} sticker"
                                    class="max-w-full h-auto rounded-lg shadow-lg"
                                >
                            </div>
                        @else
                            <x-loading-state :loadingState="$loadingState" />
                        @endif
                        
                        <!-- Generated Images Grid -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">All Variations</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($sticker->variations as $variation)
                                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <img 
                                        src="{{ Storage::url($variation->image_path) }}"
                                        alt="Sticker variation {{ $variation->variation_index }}"
                                        class="w-full h-auto transform group-hover:scale-105 transition-transform duration-300"
                                    >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-sm">
                                        Variation #{{ $variation->variation_index + 1 }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Details</h3>
                                <dl class="mt-2 text-sm text-gray-600">
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Character:</dt>
                                        <dd class="col-span-2">{{ ucfirst($sticker->subject) }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Expression:</dt>
                                        <dd class="col-span-2">{{ ucfirst($sticker->expression) }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Size:</dt>
                                        <dd class="col-span-2">{{ $sticker->size }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Style:</dt>
                                        <dd class="col-span-2">{{ ucfirst($sticker->style) }}</dd>
                                    </div>
                                    @if($sticker->custom_style)
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Custom Style:</dt>
                                        <dd class="col-span-2">{{ $sticker->custom_style }}</dd>
                                    </div>
                                    @endif
                                    <div class="grid grid-cols-3 gap-4 py-2">
                                        <dt class="font-medium">Created:</dt>
                                        <dd class="col-span-2">{{ $sticker->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Generated Prompt</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $sticker->prompt }}</p>
                            </div>

                            <div class="pt-4">
                                <a 
                                    href="{{ Storage::url($sticker->image_path) }}"
                                    download
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150"
                                >
                                    Download Sticker
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
