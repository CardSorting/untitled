<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Size Selection -->
    <div class="space-y-4">
        <label class="block text-sm font-medium text-gray-700">Size</label>
        <div class="grid grid-cols-2 gap-4">
            @foreach(['small', 'medium', 'large'] as $size)
                <div class="relative">
                    <input type="radio" 
                           name="size" 
                           value="{{ $size }}"
                           id="size_{{ $size }}"
                           class="hidden peer"
                           {{ $size === 'medium' ? 'checked' : '' }}>
                    <label for="size_{{ $size }}"
                           class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                                  transition-all duration-200 peer-checked:border-blue-500 
                                  peer-checked:bg-blue-50 hover:border-blue-200">
                        {{ ucfirst($size) }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Style Selection -->
    <div class="space-y-4">
        <label class="block text-sm font-medium text-gray-700">Style</label>
        <div class="grid grid-cols-2 gap-4">
            @foreach(['cute', 'realistic', 'cartoon', 'pixel'] as $style)
                <div class="relative">
                    <input type="radio" 
                           name="style" 
                           value="{{ $style }}"
                           id="style_{{ $style }}"
                           class="hidden peer"
                           {{ $style === 'cartoon' ? 'checked' : '' }}>
                    <label for="style_{{ $style }}"
                           class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                                  transition-all duration-200 peer-checked:border-blue-500 
                                  peer-checked:bg-blue-50 hover:border-blue-200">
                        {{ ucfirst($style) }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
