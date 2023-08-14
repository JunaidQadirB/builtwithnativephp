@props(['label', 'name', 'id', 'rows', 'class', 'required', 'placeholder'])

<div class="mb-4">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block {{ $class }} shadow-sm sm:text-sm border-gray-300 rounded-md" @if($required) required @endif placeholder="{{ $placeholder }}"></textarea>
</div>
