<?php echo '<?php' ?>
<div class="relative group">
    <label for="subject" class="block text-sm font-medium text-gray-900 mb-2">
        What character or creature would you like?
        <span class="ml-1 inline-flex items-center text-sm text-gray-500">
            <span class="group-hover:hidden">👾</span>
            <span class="hidden group-hover:inline">Be creative!</span>
        </span>
    </label>
    <div class="relative">
        <div x-data="{ mainTab: 'animals', animalTab: 'pets', peopleTab: 'healthcare' }">
            <!-- Main Tab Navigation -->
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-6" aria-label="Main categories">
                    <button
                        type="button"
                        @click="mainTab = 'animals'"
                        :class="mainTab === 'animals' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                        class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                    >
                        Animals
                    </button>
                    <button
                        type="button"
                        @click="mainTab = 'people'"
                        :class="mainTab === 'people' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                        class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                    >
                        People
                    </button>
                </nav>
            </div>

            <!-- Animals Tab Panels -->
            <div x-show="mainTab === 'animals'">
                <div class="border-b border-gray-200 mt-4 overflow-x-auto">
                    <nav class="-mb-px flex space-x-6" aria-label="Animal categories">
                        <button
                            type="button"
                            @click="animalTab = 'pets'"
                            :class="animalTab === 'pets' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">🐱</span>
                            Pets
                        </button>
                        <button
                            type="button"
                            @click="animalTab = 'wild_animals'"
                            :class="animalTab === 'wild_animals' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">🦁</span>
                            Wild Animals
                        </button>
                        <button
                            type="button"
                            @click="animalTab = 'mythical'"
                            :class="animalTab === 'mythical' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">🐉</span>
                            Mythical
                        </button>
                        <button
                            type="button"
                            @click="animalTab = 'fantastic'"
                            :class="animalTab === 'fantastic' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">🤖</span>
                            Fantastic
                        </button>
                    </nav>
                </div>
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

            <!-- People Tab Panels -->
            <div x-show="mainTab === 'people'">
                <div class="border-b border-gray-200 mt-4 overflow-x-auto">
                    <nav class="-mb-px flex space-x-6" aria-label="People categories">
                        <button
                            type="button"
                            @click="peopleTab = 'healthcare'"
                            :class="peopleTab === 'healthcare' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">👨‍⚕️</span>
                            Healthcare
                        </button>
                        <button
                            type="button"
                            @click="peopleTab = 'tech'"
                            :class="peopleTab === 'tech' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">👩‍💻</span>
                            Tech
                        </button>
                        <button
                            type="button"
                            @click="peopleTab = 'education'"
                            :class="peopleTab === 'education' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">👩‍🏫</span>
                            Education
                        </button>
                        <button
                            type="button"
                            @click="peopleTab = 'business'"
                            :class="peopleTab === 'business' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">👨‍💼</span>
                            Business
                        </button>
                        <button
                            type="button"
                            @click="peopleTab = 'creative'"
                            :class="peopleTab === 'creative' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
                        >
                            <span class="text-lg">👩‍🎨</span>
                            Creative
                        </button>
                    </nav>
                </div>
                @foreach(['healthcare', 'tech', 'education', 'business', 'creative'] as $category)
                    <div
                        x-show="peopleTab === '{{ $category }}'"
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
        </div>
    </div>
    @error('subject')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
