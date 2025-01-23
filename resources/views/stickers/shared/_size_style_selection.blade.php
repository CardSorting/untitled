<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <x-input-label for="size" :value="__('Size')" />
        <select id="size" name="size" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option value="">Select Size</option>
            <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small</option>
            <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large</option>
        </select>
        <x-input-error :messages="$errors->get('size')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="style" :value="__('Style')" />
        <select id="style" name="style" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option value="">Select Style</option>
            <option value="cartoon" {{ old('style') == 'cartoon' ? 'selected' : '' }}>Cartoon</option>
            <option value="realistic" {{ old('style') == 'realistic' ? 'selected' : '' }}>Realistic</option>
            <option value="minimalist" {{ old('style') == 'minimalist' ? 'selected' : '' }}>Minimalist</option>
            <option value="pixel-art" {{ old('style') == 'pixel-art' ? 'selected' : '' }}>Pixel Art</option>
        </select>
        <x-input-error :messages="$errors->get('style')" class="mt-2" />
    </div>
</div>
