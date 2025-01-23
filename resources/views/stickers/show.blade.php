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
                            <div class="flex flex-col justify-center items-center space-y-4">
                                <div class="w-full max-w-md">
                                    <div class="flex justify-between mb-1">
                                        <span class="text-base font-medium text-blue-700">Progress</span>
                                        <span class="text-sm font-medium text-blue-700">{{ $loadingState->progress ?? 0 }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $loadingState->progress ?? 0 }}%"></div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <p class="text-gray-600">{{ $loadingState->message ?? 'Starting sticker generation...' }}</p>
                                    @if($loadingState->substages ?? false)
                                        <ul class="mt-2 space-y-1 text-sm text-gray-500">
                                            @foreach($loadingState->substages as $substage)
                                                <li class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    {{ $substage }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                        
                        <!-- Generated Images Grid -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">All Variations</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($sticker->variations as $variation)
                                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <img 
                                        src="{{ Storage::url($variation) }}"
                                        alt="Sticker variation"
                                        class="w-full h-auto transform group-hover:scale-105 transition-transform duration-300"
                                    >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
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
