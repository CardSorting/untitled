<!-- Animal Category Panel -->
<div x-show="mainTab === 'animals'">
    @include('stickers.create-sections._animal_sub_tabs_navigation')
    
    @foreach(['pets', 'wild_animals', 'mythical', 'fantastic'] as $category)
        <div
            x-show="animalTab === '{{ $category }}'"
            class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3"
        >
            @foreach($subjects[$category] as $value => $label)
                <label class="relative flex items-start p-4 cursor-pointer bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                    <input
                        type="radio"
                        name="subject"
                        value="{{ $value }}"
                        {{ old('subject') == $value ? 'checked' : '' }}
                        class="sr-only peer"
                        required
                    >
                    <span class="ml-3 text-sm font-medium text-gray-900 peer-checked:text-blue-600">
                        {{ $label }}
                    </span>
                    <span class="absolute inset-0 rounded-lg ring-2 ring-transparent peer-checked:ring-blue-500"></span>
                </label>
            @endforeach
        </div>
    @endforeach
</div>
