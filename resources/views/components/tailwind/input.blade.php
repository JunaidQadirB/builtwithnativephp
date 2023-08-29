@props([
    'disabled' => false,
    'type' => 'text',
    'name' => '',
    'label' => '',
    'maxlength' => 0,
    'showLength' => false,
])

<div class="inline-flex gap-1 flex-col" x-data="{}"
>
    <div class="flex justify-between px-1">
        <x-label value="{{$label}}"></x-label>
        @if ($maxlength ||$showLength)
            <div class="text-xs text-right"
                 wire:ignore.self
                 @if ($maxlength > 0)
                     x-text="`${$wire.get('{{$name}}') ? $wire.get('{{$name}}').length:'0'} / {{$maxlength}}`"
                 @elseif ($showLength)
                     x-text="`${$wire.get('{{$name}}').length} characters`"
                    @endif
            ></div>
        @endif
    </div>

    <input x-ref="{{$name}}" wire:model="{{$name}}"
           class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
           {{ $disabled ? 'disabled' : '' }}
           type="{{$type}}"
           @if ($maxlength > 0)
               maxlength="{{$maxlength}}"
            @endif
    />
    <x-input-error for="{{$name}}"/>
</div>
