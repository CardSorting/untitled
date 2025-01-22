<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Welcome Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Welcome Back, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600">Create unique stickers or explore the gallery to see what others have made.</p>
                        <div class="mt-4 flex space-x-4">
                            <a href="{{ route('stickers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Create New Sticker
                            </a>
                            <a href="{{ route('stickers.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                                Browse Gallery
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Sticker Stats</h3>
                        <dl class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 px-4 py-5 sm:rounded-lg">
                                <dt class="text-sm font-medium text-gray-500">Total Stickers</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ Auth::user()->stickers()->count() }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:rounded-lg">
                                <dt class="text-sm font-medium text-gray-500">Latest Creation</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    @if($latest = Auth::user()->stickers()->latest()->first())
                                        {{ $latest->created_at->diffForHumans() }}
                                    @else
                                        No stickers yet
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Recent Stickers -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Recent Stickers</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse(Auth::user()->stickers()->latest()->take(4)->get() as $sticker)
                            <a href="{{ route('stickers.show', $sticker) }}" class="block group">
                                <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $sticker->image_path) }}" alt="{{ $sticker->subject }}" class="w-full h-full object-cover group-hover:opacity-75">
                                </div>
                                <p class="mt-2 text-sm text-gray-500">{{ $sticker->subject }}</p>
                            </a>
                        @empty
                            <div class="col-span-4 text-center py-8 text-gray-500">
                                No stickers created yet. <a href="{{ route('stickers.create') }}" class="text-blue-500 hover:underline">Create your first one!</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
