<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-white">
                    {{ __('Generate New Sticker') }}
                </h2>
                <p class="mt-2 text-lg text-blue-100">
                    Create custom stickers for your favorite gaming moments
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg transform transition-all duration-300 hover:shadow-2xl">
                <div class="p-8">
                    @if(session('error'))
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('stickers.store') }}" method="POST" class="space-y-8" id="sticker-form">
                        @csrf

                        <div class="space-y-6">
                            <!-- Subject Input -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    What character or creature would you like?
                                </label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        id="subject"
                                        name="subject"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                                        placeholder="E.g., cat, dog, penguin, dragon"
                                        value="{{ old('subject') }}"
                                        required
                                    >
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                </div>
                                @error('subject')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Expression Select -->
                            <div>
                                <label for="expression" class="block text-sm font-medium text-gray-700 mb-2">
                                    Expression
                                </label>
                                <div class="relative">
                                    <select
                                        id="expression"
                                        name="expression"
                                        class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5bGluZSBwb2ludHM9IjYgOSAxMiAxNSAxOCA5Ij48L3BvbHlsaW5lPjwvc3ZnPg==')] bg-no-repeat bg-[right_0.75rem_center]"
                                        required
                                    >
                                        <option value="">Select an expression</option>
                                        <option value="hype" {{ old('expression') == 'hype' ? 'selected' : '' }}>Hype - Excited and energetic</option>
                                        <option value="tilted" {{ old('expression') == 'tilted' ? 'selected' : '' }}>Tilted - Frustrated and annoyed</option>
                                        <option value="gg" {{ old('expression') == 'gg' ? 'selected' : '' }}>GG - Content and respectful</option>
                                        <option value="sadge" {{ old('expression') == 'sadge' ? 'selected' : '' }}>Sadge - Sad and disappointed</option>
                                        <option value="clutch" {{ old('expression') == 'clutch' ? 'selected' : '' }}>Clutch - Focused and determined</option>
                                        <option value="pog" {{ old('expression') == 'pog' ? 'selected' : '' }}>Pog - Amazed and surprised</option>
                                        <option value="facepalm" {{ old('expression') == 'facepalm' ? 'selected' : '' }}>Facepalm - Exasperated</option>
                                        <option value="monkas" {{ old('expression') == 'monkas' ? 'selected' : '' }}>MonkaS - Anxious and nervous</option>
                                        <option value="ez" {{ old('expression') == 'ez' ? 'selected' : '' }}>EZ - Smug and confident</option>
                                        <option value="nope" {{ old('expression') == 'nope' ? 'selected' : '' }}>Nope - Rejecting and avoiding</option>
                                        <option value="sleepy" {{ old('expression') == 'sleepy' ? 'selected' : '' }}>Sleepy - Yawning and tired</option>
                                        <option value="blush" {{ old('expression') == 'blush' ? 'selected' : '' }}>Blush - Shy and bashful</option>
                                        <option value="surprise" {{ old('expression') == 'surprise' ? 'selected' : '' }}>Surprise - Unexpected shock</option>
                                        <option value="laugh" {{ old('expression') == 'laugh' ? 'selected' : '' }}>Laugh - Joyful and happy</option>
                                        <option value="determined" {{ old('expression') == 'determined' ? 'selected' : '' }}>Determined - Focused and resolute</option>
                                    </select>
                                </div>
                                @error('expression')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-3 text-sm text-gray-500">Each expression comes with a unique pose and style perfect for gaming moments!</p>
                            </div>

                            <!-- Grid Section -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Size Select -->
                                <div>
                                    <label for="size" class="block text-sm font-medium text-gray-700 mb-2">
                                        Size
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="size"
                                            name="size"
                                            class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5bGluZSBwb2ludHM9IjYgOSAxMiAxNSAxOCA5Ij48L3BvbHlsaW5lPjwvc3ZnPg==')] bg-no-repeat bg-[right_0.75rem_center]"
                                        >
                                            <option value="1024x1024">Large (1024x1024)</option>
                                            <option value="512x512">Small (512x512)</option>
                                        </select>
                                    </div>
                                    @error('size')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Style Select -->
                                <div>
                                    <label for="style" class="block text-sm font-medium text-gray-700 mb-2">
                                        Style
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="style"
                                            name="style"
                                            class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5bGluZSBwb2ludHM9IjYgOSAxMiAxNSAxOCA5Ij48L3BvbHlsaW5lPjwvc3ZnPg==')] bg-no-repeat bg-[right_0.75rem_center]"
                                        >
                                            <option value="default">Default</option>
                                            <option value="cartoon">Cartoon</option>
                                            <option value="realistic">Realistic</option>
                                        </select>
                                    </div>
                                    @error('style')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Custom Style Textarea -->
                                <div class="md:col-span-2">
                                    <label for="custom_style" class="block text-sm font-medium text-gray-700 mb-2">
                                        Custom Style Elements (Optional)
                                    </label>
                                    <div class="relative">
                                        <textarea
                                            id="custom_style"
                                            name="custom_style"
                                            rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                                            placeholder="E.g., wearing a crown and wizard hat, cyberpunk style, pixel art style"
                                        >{{ old('custom_style') }}</textarea>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Add any custom style elements or accessories you'd like your sticker to have.</p>
                                    @error('custom_style')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end items-center gap-4">
                            <div id="loading-indicator" class="hidden">
                                <div class="flex items-center">
                                    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></div>
                                    <span class="ml-2 text-sm text-gray-600">Generating your sticker...</span>
                                </div>
                            </div>
                            
                            <button
                                type="submit"
                                id="submit-button"
                                class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 transition-all duration-200 transform hover:scale-105"
                            >
                                <span id="button-text">Generate Sticker</span>
                                <span id="button-spinner" class="hidden ml-2">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>

                    @push('scripts')
                    <script>
                        document.getElementById('sticker-form').addEventListener('submit', function(e) {
                            const button = document.getElementById('submit-button');
                            const buttonText = document.getElementById('button-text');
                            const spinner = document.getElementById('button-spinner');
                            const loadingIndicator = document.getElementById('loading-indicator');
                            
                            // Disable button and show loading state
                            button.disabled = true;
                            buttonText.textContent = 'Generating...';
                            spinner.classList.remove('hidden');
                            loadingIndicator.classList.remove('hidden');
                        });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
