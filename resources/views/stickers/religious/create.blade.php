<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-white/[0.1] bg-[size:16px_16px]"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/[0.1] to-transparent"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <h2 class="text-4xl font-extrabold text-white tracking-tight">
                    {{ __('Create Religious Sticker') }}
                </h2>
                <p class="mt-3 text-lg text-blue-100 max-w-3xl">
                    Design your custom religious sticker with our AI-powered generator
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl transform transition-all duration-300 hover:shadow-2xl border border-gray-100">
                <div class="p-8 space-y-8">
                    @if(session('error'))
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('stickers.religious.store') }}" method="POST" class="space-y-8">
                        @csrf

                        <!-- Religious Categories -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Religious Category</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($religiousCategories as $category)
                                    <div class="relative">
                                        <input type="radio" 
                                               name="subject" 
                                               value="{{ $category }}"
                                               id="category_{{ $category }}"
                                               class="hidden peer">
                                        <label for="category_{{ $category }}"
                                               class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                                                      transition-all duration-200 peer-checked:border-blue-500 
                                                      peer-checked:bg-blue-50 hover:border-blue-200">
                                            {{ ucwords(str_replace('_', ' ', $category)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Religious Figures -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Religious Figure Type</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($religiousFigures as $figure)
                                    <div class="relative">
                                        <input type="radio" 
                                               name="figure_type" 
                                               value="{{ $figure }}"
                                               id="figure_{{ $figure }}"
                                               class="hidden peer">
                                        <label for="figure_{{ $figure }}"
                                               class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                                                      transition-all duration-200 peer-checked:border-blue-500 
                                                      peer-checked:bg-blue-50 hover:border-blue-200">
                                            {{ ucwords(str_replace('_', ' ', $figure)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Religious Symbols -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Religious Symbol</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($religiousSymbols as $symbol)
                                    <div class="relative">
                                        <input type="radio" 
                                               name="symbol" 
                                               value="{{ $symbol }}"
                                               id="symbol_{{ $symbol }}"
                                               class="hidden peer">
                                        <label for="symbol_{{ $symbol }}"
                                               class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                                                      transition-all duration-200 peer-checked:border-blue-500 
                                                      peer-checked:bg-blue-50 hover:border-blue-200">
                                            {{ ucwords(str_replace('_', ' ', $symbol)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Expression Selection -->
                        @include('stickers.shared._expression_input')

                        <!-- Size and Style Selection -->
                        @include('stickers.shared._size_style_selection')

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="inline-flex justify-center py-3.5 px-8 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Generate Sticker
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
