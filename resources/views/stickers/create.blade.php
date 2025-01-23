<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-white/[0.1] bg-[size:16px_16px]"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/[0.1] to-transparent"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <h2 class="text-4xl font-extrabold text-white tracking-tight">
                    {{ __('Generate New Sticker') }}
                </h2>
                <p class="mt-3 text-lg text-blue-100 max-w-3xl">
                    Create custom stickers for your favorite gaming moments with our AI-powered generator
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl transform transition-all duration-300 hover:shadow-2xl border border-gray-100">
                <div class="p-8 space-y-8">
                    @if(session('error'))
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6" role="alert">
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

                        <div class="space-y-8">
                            <!-- Subject Input -->
                            <div class="relative group">
                                <label for="subject" class="block text-sm font-medium text-gray-900 mb-2">
                                    What character or creature would you like?
                                    <span class="ml-1 inline-flex items-center text-sm text-gray-500">
                                        <span class="group-hover:hidden">👾</span>
                                        <span class="hidden group-hover:inline">Be creative!</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <select
                                        id="subject"
                                        name="subject"
                                        class="block w-full pl-4 pr-10 py-3.5 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white hover:border-gray-400"
                                        required
                                        aria-describedby="subject-help"
                                    >
                                        <option value="">Select a character</option>
                                        @foreach($subjects as $value => $label)
                                            <option value="{{ $value }}" {{ old('subject') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
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
                                <label for="expression" class="block text-sm font-medium text-gray-900 mb-2">
                                    Expression
                                    <span class="ml-1 inline-block text-gray-500">😊</span>
                                </label>
                                <div class="relative">
                                    <select
                                        id="expression"
                                        name="expression"
                                        class="block w-full pl-4 pr-10 py-3.5 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white hover:border-gray-400"
                                        required
                                        aria-describedby="expression-help"
                                    >
                                        <option value="">Select an expression</option>
                                        @foreach($expressions as $value => $label)
                                            <option value="{{ $value }}" {{ old('expression') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('expression')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p id="expression-help" class="mt-3 text-sm text-gray-500">Each expression comes with a unique pose and style perfect for gaming moments!</p>
                            </div>

                            <!-- Grid Section -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Size Select -->
                                <div>
                                    <label for="size" class="block text-sm font-medium text-gray-900 mb-2">
                                        Size
                                        <span class="ml-1 inline-block text-gray-500">📏</span>
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="size"
                                            name="size"
                                            class="block w-full pl-4 pr-10 py-3.5 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white hover:border-gray-400"
                                        >
                                            <option value="square_hd">Square HD (1024x1024)</option>
                                            <option value="square">Square (512x512)</option>
                                            <option value="portrait_4_3">Portrait 4:3</option>
                                            <option value="portrait_16_9">Portrait 16:9</option>
                                            <option value="landscape_4_3">Landscape 4:3</option>
                                            <option value="landscape_16_9">Landscape 16:9</option>
                                        </select>
                                    </div>
                                    @error('size')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Style Select -->
                                <div>
                                    <label for="style" class="block text-sm font-medium text-gray-900 mb-2">
                                        Style
                                        <span class="ml-1 inline-block text-gray-500">🎨</span>
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="style"
                                            name="style"
                                            class="block w-full pl-4 pr-10 py-3.5 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white hover:border-gray-400"
                                        >
                                            <option value="realistic_image">Realistic</option>
                                            <option value="digital_illustration">Digital Art</option>
                                            <option value="vector_illustration">Vector Art</option>
                                        </select>
                                    </div>
                                    @error('style')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Custom Style Select -->
                                <div class="md:col-span-2">
                                    <label for="custom_style" class="block text-sm font-medium text-gray-900 mb-2">
                                        Custom Style Elements
                                        <span class="text-gray-500">(Optional)</span>
                                        <span class="ml-1 inline-block text-gray-500">✨</span>
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="custom_style"
                                            name="custom_style"
                                            class="block w-full pl-4 pr-10 py-3.5 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white hover:border-gray-400"
                                        >
                                            <option value="">No additional style</option>
                                            <option value="with a small red mushroom cap">Mushroom Cap</option>
                                            <option value="wearing a wizard hat and carrying a magic staff">Wizard Theme</option>
                                            <option value="wearing gaming headphones and holding a controller">Gamer Theme</option>
                                            <option value="in cyberpunk style with neon accents">Cyberpunk Theme</option>
                                            <option value="in pixel art style">Pixel Art Theme</option>
                                            <option value="wearing a crown and royal cape">Royal Theme</option>
                                            <option value="with rainbow sparkles and stars">Sparkle Theme</option>
                                            <option value="in chibi anime style">Anime Theme</option>
                                            <option value="with superhero cape and mask">Superhero Theme</option>
                                        </select>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Choose an optional theme or style for your sticker</p>
                                    @error('custom_style')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end items-center gap-4">
                            <div id="loading-indicator" class="hidden w-full bg-gray-100 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full transition-all duration-500 ease-out" style="width: 0%"></div>
                            </div>
                            
                            <button
                                type="submit"
                                id="submit-button"
                                class="inline-flex justify-center py-3.5 px-8 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 transition-all duration-200 transform hover:scale-[1.02]"
                                aria-live="polite"
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
                        // Enhanced loading state
                        document.getElementById('sticker-form').addEventListener('submit', function(e) {
                            const button = document.getElementById('submit-button');
                            const buttonText = document.getElementById('button-text');
                            const spinner = document.getElementById('button-spinner');
                            const loadingBar = document.querySelector('#loading-indicator div');
                            
                            // Initial loading state
                            button.disabled = true;
                            buttonText.textContent = 'Generating...';
                            spinner.classList.remove('hidden');
                            loadingBar.parentElement.classList.remove('hidden');

                            // Simulate progress animation
                            let progress = 0;
                            const interval = setInterval(() => {
                                progress += Math.random() * 10;
                                loadingBar.style.width = Math.min(progress, 95) + '%';
                                if (progress >= 95) clearInterval(interval);
                            }, 500);
                        });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
