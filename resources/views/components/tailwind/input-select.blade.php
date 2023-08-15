<div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
    <label for="{{$name}}" class="{{@$leftCol??'sm:w-6/12'}} block w-full leading-normal mb-1.5">{{$label}}</label>
    <div class="{{@$rightCol??'sm:flex-1'}}">
        <div class="relative flex flex-wrap items-stretch">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="flex -mr-[-1px]">
                    @if($prepend != strip_tags($prepend))
                        {!! $prepend !!}
                    @else
                        <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$prepend}}</span>
                    @endif
                </div>
            @endif
            <input class="block flex-1 py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) || $errors->has($selectName)  ? 'border-red-500' : null}}"
                   type="{{@$type?:'text'}}"
                   name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
                   @if(@$pattern) pattern="{{@$pattern}}" @endif
                   @if($type == 'number') step="{{@$step?:1}}" @endif
                   @if($type == 'number') min="{{@$min?:0}}" @endif
                   @if($type == 'number' && isset($max)) max="{{@$max}}" @endif
            />
                @if(isset($append) && strlen(trim($append)) > 0)
                    <div class="flex -mr-[-1px]">
                        @if($append != strip_tags($append))
                            {!! $append !!}
                        @else
                            <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$append}}</span>
                        @endif
                    </div>
                @endif
                @if(isset($selectPrepend) && strlen(trim($selectPrepend)) > 0)
                    <div class="flex -mr-[-1px]">
                        @if($selectPrepend != strip_tags($selectPrepend))
                            {!! $selectPrepend !!}
                        @else
                            <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$selectPrepend}}</span>
                        @endif
                    </div>
                @endif
                <select type="text" class="inline-block h-auto w-full py-2 px-3 text-base leading-4 border text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) || $errors->has($selectName)  ? 'border-red-500' : null}}"
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
                @if(isset($selectAppend) && strlen(trim($selectAppend)) > 0)
                    <div class="flex -mr-[-1px]">
                        @if($selectAppend != strip_tags($selectAppend))
                            {!! $selectAppend !!}
                        @else
                            <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$selectAppend}}</span>
                        @endif
                    </div>
                @endif
        </div>

        @if($errors->has($name) || $errors->has($selectName))
            <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}} {{$errors->first($selectName)}}</small>
        @else
            <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
        @endif
    </div>
</div>
