<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate New Sticker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('stickers.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                What character or creature would you like?
                            </label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="E.g., cat, dog, penguin, dragon"
                                    value="{{ old('subject') }}"
                                    required
                                >
                            </div>
                            @error('subject')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="expression" class="block text-sm font-medium text-gray-700">
                                Expression
                            </label>
                            <select
                                id="expression"
                                name="expression"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
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
                            @error('expression')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">Each expression comes with a unique pose and style perfect for gaming moments!</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="size" class="block text-sm font-medium text-gray-700">
                                    Size
                                </label>
                                <select
                                    id="size"
                                    name="size"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                >
                                    <option value="1024x1024">Large (1024x1024)</option>
                                    <option value="512x512">Small (512x512)</option>
                                </select>
                                @error('size')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="style" class="block text-sm font-medium text-gray-700">
                                    Style
                                </label>
                                <select
                                    id="style"
                                    name="style"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                >
                                    <option value="default">Default</option>
                                    <option value="cartoon">Cartoon</option>
                                <option value="realistic">Realistic</option>
                            </select>
                            @error('style')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="custom_style" class="block text-sm font-medium text-gray-700">
                                Custom Style Elements (Optional)
                            </label>
                            <div class="mt-1">
                                <textarea
                                    id="custom_style"
                                    name="custom_style"
                                    rows="2"
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="E.g., wearing a crown and wizard hat, cyberpunk style, pixel art style"
                                >{{ old('custom_style') }}</textarea>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Add any custom style elements or accessories you'd like your sticker to have.</p>
                            @error('custom_style')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Generate Sticker
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
