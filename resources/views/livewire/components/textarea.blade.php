<div class="mb-4 text-gray-600" x-data="{}" wire:ignore>
    <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    <textarea
            class="block w-full py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors && $errors->has($name) ? 'border-red-500' : null}}"
            wire:model.live="value"
            wire:key="textarea_{{$name}}"
            name="{{$name}}"
            rows="{{@$rows}}"
            aria-describedby="{{$name}}HelpId"
            @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
            @if(@$maxlength) maxlength="{{@$maxlength}}" @endif
            @if(@$required) required @endif
            @if(@$disabled) disabled @endif
            @if(@$readonly) readonly @endif
            @if(@$autofocus) autofocus @endif
    ></textarea>
    {{var_dump($errors)}}
    @if($errors?->has($name))
        YAY
        <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors?->first($name)}}</small>
    @else
        <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif

    @if ($maxlength)
        <div class="text-xs text-right"
             wire:ignore.self
             x-text="`${$wire.get('value').length} / ${$wire.get('maxlength')}`"></div>
    @endif
</div>

<?php

use Livewire\Attributes\Modelable;
use Livewire\Volt\Component;

new class extends Component {
    #[Modelable]
    public $value = '';

    public $errors;

    public ?string $label;

    public ?string $name;

    public ?string $placeholder;

    public ?int $rows = 10;

    public ?int $cols;

    public ?int $maxlength;

    public bool $disabled = false;

    public bool $readonly = false;

    public bool $required = false;

    public bool $autofocus = false;

    public bool $autocomplete = false;

    public function countChars(): int
    {
        return strlen($this->value);
    }
}
?>
