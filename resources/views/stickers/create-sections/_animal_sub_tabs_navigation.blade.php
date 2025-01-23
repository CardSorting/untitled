<!-- Animal Sub-Navigation -->
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
