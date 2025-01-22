<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Stickers') }}
            </h2>
            <a href="{{ route('stickers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Sticker
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($stickers as $sticker)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{ route('stickers.show', $sticker) }}">
                            <img src="{{ Storage::url($sticker->image_path) }}" 
                                 alt="{{ $sticker->prompt }}"
                                 class="w-full h-64 object-cover">
                            <div class="p-4">
                                <p class="text-gray-600 text-sm truncate">{{ $sticker->prompt }}</p>
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $sticker->created_at->diffForHumans() }}</span>
                                    <form action="{{ route('stickers.destroy', $sticker) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" 
                                                onclick="return confirm('Are you sure you want to delete this sticker?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No stickers generated yet.</p>
                        <a href="{{ route('stickers.create') }}" class="text-blue-500 hover:text-blue-700 mt-2 inline-block">
                            Generate your first sticker
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $stickers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
