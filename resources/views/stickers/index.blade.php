<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        @if($stickers->isEmpty())
            <div class="text-center py-16">
                <p class="text-gray-500">No stickers found</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($stickers as $sticker)
                    <article class="group relative flex flex-col overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="aspect-square bg-gray-100">
                            <img 
                                src="{{ $sticker->image_url }}" 
                                alt="Sticker" 
                                class="h-full w-full object-cover object-center"
                                loading="lazy"
                            >
                        </div>
                        <div class="flex-1 p-4 bg-white">
                            <p class="text-sm text-gray-600 line-clamp-2">{{ $sticker->prompt }}</p>
                            <div class="mt-2 flex items-center justify-between">
                                <time class="text-xs text-gray-500" datetime="{{ $sticker->created_at->toIso8601String() }}">
                                    {{ $sticker->created_at->diffForHumans() }}
                                </time>
                            </div>
                        </div>
                        <a 
                            href="{{ route('stickers.show', $sticker) }}" 
                            class="absolute inset-0 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            aria-label="View sticker details"
                        >
                            <span class="sr-only">View details</span>
                        </a>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
