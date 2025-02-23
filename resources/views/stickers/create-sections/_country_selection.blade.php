<!-- Country Selection Panel -->
<div x-show="mainTab === 'sports' || mainTab === 'people'" class="mt-4">
    <h3 class="text-lg font-medium text-gray-900 mb-3">Select Character's Country</h3>
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
        @foreach($countries as $code => $name)
            <label class="relative flex items-start p-4 cursor-pointer bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                <input
                    type="radio"
                    name="country"
                    value="{{ $code }}"
                    {{ old('country') == $code ? 'checked' : '' }}
                    class="sr-only peer"
                    required
                >
                <span class="ml-3 text-sm font-medium text-gray-900 peer-checked:text-blue-600">
                    <span class="fi fi-{{ strtolower($code) }}"></span> {{ $name }}
                </span>
                <span class="absolute inset-0 rounded-lg ring-2 ring-transparent peer-checked:ring-blue-500"></span>
            </label>
        @endforeach
    </div>
</div>
