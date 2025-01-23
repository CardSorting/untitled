<div>
    <x-input-label for="expression" :value="__('Expression')" />
    <x-text-input id="expression" class="block mt-1 w-full" type="text" name="expression" :value="old('expression')" required />
    <x-input-error :messages="$errors->get('expression')" class="mt-2" />
</div>
