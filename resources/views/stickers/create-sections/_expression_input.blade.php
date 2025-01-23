<?php echo '<?php' ?>
<!-- Expression Select -->
<div class="col-span-2 sm:col-span-1">
    <label for="expression" class="block text-sm font-medium text-gray-900 mb-2">
        What emotion should it express?
    </label>
    <div class="mt-1">
        <select id="expression" name="expression" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
            <option value="">Choose an emotion</option>
            @foreach($expressions as $value => $label)
                <option value="{{ $value }}" {{ old('expression') == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    @error('expression')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
