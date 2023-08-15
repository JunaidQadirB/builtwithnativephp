<div class="mb-4 text-gray-600 {{isset($show) && @$show==false?'d-none':null}}">
    <label for="{{@$id?$id:$name}}" class="block mb-1.5">{{$label}}</label>
    <select type="text" @if(isset($multiple) && $multiple) multiple @endif size="{{$size ?? 8}}"
    @if(isset($required) && $required) required @endif
            class="inline-block h-auto w-full py-2 px-3 text-base leading-4 border text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
            name="{{$name}}" wire:model.live="{{$name}}" id="{{@$id?$id:$name}}"
            aria-describedby="{{@$id?$id:$name}}HelpId">
        @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
            <option value="">Select</option>
        @endif
        @foreach($options as $optionGroup)
            <optgroup label="{{$optionGroup['label'] }}">
                @foreach($optionGroup['options'] as $option)
                    <option
                        @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                            @if(@$value)
                        {{old($name, @$value) == $option[$optionValueKey] ? 'selected' : null}}
                            @endif
                        @else
                            @if(@$value)
                        {{@in_array($option[$optionValueKey] , old($name))  || @in_array($option[$optionValueKey], @$value) ? 'selected' : null}}
                            @endif
                        @endif
                        value="{{$option[$optionValueKey]}}"
                    >
                        @if(is_array(@$optionTextKeys))
                            @php
                                $text = @$optionTextFormat
                            @endphp
                            @foreach (@$optionTextKeys as $textKey)
                                @php
                                    $text = str_replace('%'.$textKey.'%',$option[$textKey], $text)
                                @endphp
                            @endforeach
                            {{$text}}
                        @else
                            {{$option[$optionTextKey]}}
                        @endif
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    <br/>
    @if(isset($multiple) && $multiple)
        <button type="button" id="clear{{@$id?$id:$name}}Selection"
                class="block p-2 border border-gray-600 text-sm mt-2 mb-1">Clear Selection
        </button>
    @endif
    @if($errors->has(@$id?$id:$name))
        <small id="{{@$id?$id:$name}}Error"
               class="block mt-1 text-red-500">{{$errors->first(@$id?$id:$name)}}</small>
    @else
        <small id="{{@$id?$id:$name}}Error"
               class="block mt-1 text-gray-500">{!! @$helpText?@$helpText:(@$multiple?'<span class="text-gray-500">Hold down Ctrl key to select multiple items</span>':'') !!}</small>
    @endif
</div>

@if(isset($multiple) && $multiple)
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                jQuery(document).ready(function ($) {
                    $('#clear{{@$id?$id:$name}}Selection').click(function (e) {
                        $('#{{@$id?$id:$name}}').val([])
                        e.preventDefault()
                    })
                })
            })
        </script>
    @endpush
@endif
