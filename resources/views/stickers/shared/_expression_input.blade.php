<div class="space-y-4">
    <label class="block text-sm font-medium text-gray-700">Expression</label>
    <div class="grid grid-cols-2 gap-4">
        @foreach($expressions as $expression)
            <div class="relative">
                <input type="radio" 
                       name="expression" 
                       value="{{ $expression }}"
                       id="expression_{{ $expression }}"
                       class="hidden peer">
                <label for="expression_{{ $expression }}"
                       class="block p-4 text-center rounded-xl border-2 cursor-pointer 
                              transition-all duration-200 peer-checked:border-blue-500 
                              peer-checked:bg-blue-50 hover:border-blue-200">
                    {{ ucfirst(str_replace('_', ' ', $expression)) }}
                </label>
            </div>
        @endforeach
    </div>
</div>
