<!-- Sports Category Panel -->
<div x-show="mainTab === 'sports'">
    @include('stickers.create-sections._sports_sub_tabs_navigation')
    
    @foreach(['team_sports', 'individual_sports', 'combat_sports', 'esports'] as $category)
        <div
            x-show="sportsTab === '{{ $category }}'"
            class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3"
        >
            @foreach($subjects[$category] as $value => $subject)
                <label class="relative flex items-start p-4 cursor-pointer bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                    <input
                        type="radio"
                        name="subject"
                        value="{{ $value }}"
                        {{ old('subject') == $value ? 'checked' : '' }}
                        class="sr-only peer"
                        required
                    >
                    <span class="ml-3 text-sm font-medium text-gray-900 peer-checked:text-blue-600 flex items-center">
                        @if(is_array($subject))
                            {{ $subject['label'] }}
                            @if(isset($subject['country']))
                                <span class="ml-1">{{ $subject['country'] }}</span>
                            @endif
                        @else
                            {{ $subject }}
                        @endif
                    </span>
                    <span class="absolute inset-0 rounded-lg ring-2 ring-transparent peer-checked:ring-blue-500"></span>
                </label>
                <div class="mt-2">
                    <label class="text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender_{{ $value }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
