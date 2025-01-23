<?php echo '<?php' ?>
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
