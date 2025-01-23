<?php echo '<?php' ?>
<!-- Subject Input -->
<div class="relative group">
    <label for="subject" class="block text-sm font-medium text-gray-900 mb-2">
        What character or creature would you like?
        <span class="ml-1 inline-flex items-center text-sm text-gray-500">
            <span class="group-hover:hidden">👾</span>
            <span class="hidden group-hover:inline">Be creative!</span>
        </span>
    </label>
    
    <div class="relative">
        <div x-data="{ mainTab: 'animals', animalTab: 'pets', peopleTab: 'healthcare', sportsTab: 'team_sports' }">
            <!-- Main Navigation -->
            @include('stickers.create-sections._main_subject_tabs_navigation')

            <!-- Category Panels -->
            @include('stickers.create-sections._animal_category_panel')
            @include('stickers.create-sections._people_category_panel')
            @include('stickers.create-sections._sports_category_panel')
        </div>
    </div>

    @error('subject')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
