<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        @if($stickers->isEmpty())
            <div class="text-center py-16">
                <div class="mx-auto max-w-md">
                    <svg class="mx-auto h-48 w-48 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L5 19m7-7l2.879-2.879M12 12l2.879 2.879M12 12l-2.879 2.879M12 12l-2.879-2.879M12 12l2.879-2.879"></path>
                    </svg>
                    <h3 class="mt-6 text-2xl font-semibold text-gray-900">No stickers yet</h3>
                    <p class="mt-2 text-gray-500">Get started by creating your first sticker</p>
                    <div class="mt-6">
                        <a href="{{ route('stickers.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Sticker
                        </a>
                    </div>
                </div>
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
