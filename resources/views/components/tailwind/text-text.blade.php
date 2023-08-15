<div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
    <label for="{{$name}}" class="{{@$leftCol??'sm:w-6/12'}} block w-full leading-normal mb-1.5">{{$label}}</label>
    <div class="{{@$rightCol??'sm:flex-1'}}">
        <div class="relative flex flex-wrap items-stretch">
            <select type="text" class="inline-block h-auto w-full py-2 px-3 text-base leading-4 border text-sm align-middle {{$errors->has($name) ? 'border-red-500' : null}}"
                    name="{{$name}}" wire:model.live="{{$name}}" id="{{$name}}"
                    aria-describedby="{{$name}}HelpId">
                <option value="">Select</option>
                @foreach($options as $option)
                    <option
                            {{old($name, $value) == $option[$optionValueKey] ? 'selected' : null}}
                            value="{{$option[$optionValueKey]}}"
                    >{{$option[$optionTextKey]}}</option>
                @endforeach
            </select>
            <span class="pl-1 pr-1 pt-2">&ndash;</span>
            <select type="text"
                    class="inline-block h-auto w-full py-2 px-3 text-base leading-4 border text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) || $errors->has($selectName)  ? 'border-red-500' : null}}"
                    name="{{$selectName}}" id="{{$selectName}}"
                    aria-describedby="{{$selectName}}HelpId">
                <option value="">Select</option>
                @foreach($options as $option)
                    <option
                            {{old($selectName, $selectValue) == $option[$optionValueKey] ? 'selected' : null}}
                            value="{{$option[$optionValueKey]}}"
                    >{{$option[$optionTextKey]}}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has($name))
            <small id="{{$name}}"
                   class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}" class="block mt-1 text-gray-500">{{@$helpText}}</small>
        @endif
    </div>
</div>
