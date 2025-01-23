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
        <button
            type="button"
            @click="mainTab = 'sports'"
            :class="mainTab === 'sports' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Sports
        </button>
    </nav>
</div>
