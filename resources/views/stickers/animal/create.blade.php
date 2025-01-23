<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Animal Sticker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('stickers.animal.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="animal_type" :value="__('Animal Type')" />
                            <x-text-input id="animal_type" class="block mt-1 w-full" type="text" name="animal_type" :value="old('animal_type')" required autofocus />
                            <x-input-error :messages="$errors->get('animal_type')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="subject" :value="__('Subject')" />
                            <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required />
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            @include('stickers.shared._expression_input')
                        </div>

                        <div class="mt-4">
                            @include('stickers.shared._size_style_selection')
                        </div>

                        <div class="mt-4">
                            <x-input-label for="country" :value="__('Country (Optional)')" />
                            <select id="country" name="country" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Select Country (Optional)</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Generate Sticker') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
