<?php echo '<?php' ?>
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
