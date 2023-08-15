<div class="mb-4 {{isset($show) && @$show==false?'hidden':null}}" wire:ignore wire:key="formGroup_{{isset($id)?$id:$name}}">
    <label for="{{@$id ?? $name}}" class="block mb-1.5">{{$label}}</label>
        <select @if(isset($multiple) && $multiple) multiple data-actions-box="true" @endif size="{{$size ?? 8}}"
        @if(isset($required) && $required) required @endif
                class="inline-block h-auto w-full py-2 px-3 text-base leading-4 border text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
                name="{{$name}}" wire:model="{{$name}}" wire:loading.attr="disabled" id="{{@$id ?? $name}}"
                aria-describedby="{{@$id ?? $name}}HelpId" data-live-search="true"
        >
            @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                <option value="">Select</option>
            @endif
            @if(@$hasGroups===true)
                @foreach($options as $group)
                    <optgroup label="{{$group['label']}}">
                        @foreach($group['options'] as $option)
                            <option
                                @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                                {{old($name, $value) == $option[$optionValueKey] ? 'selected' : null}}
                                @else
                                {{@in_array($option[$optionValueKey], $value) ? 'selected' : null}}
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
            @else
                @foreach($options as $option)
                    <option
                        @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                        {{old($name, $value) == $option[$optionValueKey] ? 'selected' : null}}
                        @else
                        {{@in_array($option[$optionValueKey] , old($name))  || @in_array($option[$optionValueKey], $value) ? 'selected' : null}}
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
            @endif
        </select>
        <br/>
    {{($id ?? $name)}}
        @if($errors->has(@$id ?? $name))
            <small id="{{@$id ?? $name}}Error"
                   class="block mt-1 text-red-500">{{$errors->first(@$id ?? $name)}}</small>
        @else
            <small id="{{@$id ?? $name}}Error"
                   class="block mt-1 text-gray-500">{!! @$helpText !!}</small>
        @endif
</div>

@push('scripts')
    <script src="{{asset('vendor/bootstrap-select/js/bootstrap-select.min.js')}}">

    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}"/>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery(document).ready(function ($) {
                $.fn.selectpicker.Constructor.BootstrapVersion = '4';
                $('#{{@$id??@$name}}').selectpicker();
            });
        });
    </script>
@endpush
