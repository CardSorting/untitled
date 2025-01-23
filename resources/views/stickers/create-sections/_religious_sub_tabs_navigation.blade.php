<!-- Religious Sub Tabs Navigation -->
<div class="border-b border-gray-200 mt-4 overflow-x-auto">
    <nav class="-mb-px flex space-x-6" aria-label="Religious categories">
        <button
            type="button"
            @click="religiousTab = 'priest'"
            :class="religiousTab === 'priest' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Priest
        </button>
        <button
            type="button"
            @click="religiousTab = 'monk'"
            :class="religiousTab === 'monk' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Monk
        </button>
        <button
            type="button"
            @click="religiousTab = 'imam'"
            :class="religiousTab === 'imam' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Imam
        </button>
        <button
            type="button"
            @click="religiousTab = 'rabbi'"
            :class="religiousTab === 'rabbi' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Rabbi
        </button>
        <button
            type="button"
            @click="religiousTab = 'pastor'"
            :class="religiousTab === 'pastor' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Pastor
        </button>
        <button
            type="button"
            @click="religiousTab = 'buddhist-monk'"
            :class="religiousTab === 'buddhist-monk' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Buddhist Monk
        </button>
        <button
            type="button"
            @click="religiousTab = 'sikh-priest'"
            :class="religiousTab === 'sikh-priest' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Sikh Priest
        </button>
        <button
            type="button"
            @click="religiousTab = 'shaman'"
            :class="religiousTab === 'shaman' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            Shaman
        </button>
    </nav>
</div>
