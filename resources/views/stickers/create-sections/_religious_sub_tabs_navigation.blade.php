<!-- Religious Sub-Navigation -->
<div class="border-b border-gray-200 mt-4 overflow-x-auto">
    <nav class="-mb-px flex space-x-6" aria-label="Religious categories">
        <button
            type="button"
            @click="religiousTab = 'religious_figures'"
            :class="religiousTab === 'religious_figures' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🙏</span>
            Religious Figures
        </button>
        <button
            type="button"
            @click="religiousTab = 'religious_symbols'"
            :class="religiousTab === 'religious_symbols' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🔯</span>
            Religious Symbols
        </button>
        <button
            type="button"
            @click="religiousTab = 'religious_places'"
            :class="religiousTab === 'religious_places' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🕍</span>
            Religious Places
        </button>
        <button
            type="button"
            @click="religiousTab = 'religious_texts'"
            :class="religiousTab === 'religious_texts' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">📚</span>
            Religious Texts
        </button>
    </nav>
</div>
