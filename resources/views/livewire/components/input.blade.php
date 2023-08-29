<?php

use function Livewire\Volt\{mount, state};

state('value', '')->modelable();

state('name', '');

state('label', '');

state('placeholder', '');

state('helpText', '');

state('maxlength', null);

state('showLength', false);

state('error', null);

?>

<div class="inline-flex gap-1 flex-col">
    <x-label value="{{$label}}"></x-label>
    <x-input class="mx-0" autocomplete="off"
             wire:model="value"
             name="name" label="Name"
             maxlength="{{$maxlength??null}}"
    />
    @if ($maxlength ||$showLength)
        <div class="text-xs text-right"
             wire:ignore.self
             @if ($maxlength > 0)
                 x-text="`${$wire.get('value') ? $wire.get('value').length:'0'} / ${$wire.get('maxlength')}`"
             @elseif ($showLength)
                 x-text="`${$wire.get('value').length} characters`"
                @endif
        ></div>
    @endif
</div>
