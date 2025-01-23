<!-- Sports Sub-Navigation -->
<div class="border-b border-gray-200 mt-4 overflow-x-auto">
    <nav class="-mb-px flex space-x-6" aria-label="Sports categories">
        <button
            type="button"
            @click="sportsTab = 'team_sports'"
            :class="sportsTab === 'team_sports' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">⚽️</span>
            Team Sports
        </button>
        <button
            type="button"
            @click="sportsTab = 'individual_sports'"
            :class="sportsTab === 'individual_sports' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🎾</span>
            Individual Sports
        </button>
        <button
            type="button"
            @click="sportsTab = 'combat_sports'"
            :class="sportsTab === 'combat_sports' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🥊</span>
            Combat Sports
        </button>
        <button
            type="button"
            @click="sportsTab = 'esports'"
            :class="sportsTab === 'esports' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
            class="py-2 px-1 font-medium text-sm border-b-2 flex items-center gap-2 whitespace-nowrap focus:outline-none"
        >
            <span class="text-lg">🎮</span>
            Esports
        </button>
    </nav>
</div>
