@props(['loadingState' => []])
<div class="flex flex-col justify-center items-center space-y-4">
    <div class="w-full max-w-md">
        <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-blue-700">Progress</span>
            <span class="text-sm font-medium text-blue-700">{{ $loadingState['progress'] ?? 0 }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $loadingState['progress'] ?? 0 }}%"></div>
        </div>
    </div>
    
    <div class="text-center">
        <p class="text-gray-600">{{ $loadingState['message'] ?? 'Starting sticker generation...' }}</p>
        @if($loadingState['substages'] ?? false)
            <ul class="mt-2 space-y-1 text-sm text-gray-500">
                @foreach($loadingState['substages'] as $substage)
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $substage }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
