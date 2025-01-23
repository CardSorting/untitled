<!-- People Sub-Navigation -->
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
