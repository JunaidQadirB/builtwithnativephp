<div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
    <label for="{{$name1}}" class="{{@$leftCol??'sm:6/12'}} block w-full leading-normal mb-1.5">{{$label}}</label>
    <div class="{{@$rightCol??'sm:flex-1'}}">
        <div class="relative flex flex-wrap items-center w-full space-x-1">
            @if(isset($prepend1) && strlen(trim($prepend1)) > 0)
                <div class="flex -mr-[-1px]">
                    @if($prepend1 != strip_tags($prepend1))
                        {!! $prepend1 !!}
                    @else
                        <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$prepend1}}</span>
                    @endif
                </div>
            @endif
            <select type="text" class="inline-block flex-1 py-2 px-3 text-base leading-4 border border-gray-400 text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name1) ? 'border-red-500' : null}}"
                    name="{{$name1}}" id="{{$name1}}"
                    aria-describedby="{{$name1}}HelpId">
                <option value="">Select</option>
                @foreach($options1 as $option)
                    <option
                            {{old($name1, $value1) == $option[$option1ValueKey] ? 'selected' : null}}
                            value="{{$option[$option1ValueKey]}}"
                    >{{$option[$option1TextKey]}}</option>
                @endforeach
            </select>
            @if(isset($append1) && strlen(trim($append1)) > 0)
                <div class="flex -mr-[-1px]">
                    @if($append1 != strip_tags($append1))
                        {!! $append1 !!}
                    @else
                        <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$append1}}</span>
                    @endif
                </div>
            @endif
            @if(@$showHyphen!=false)
                <span class="pl-1 pr-1 pt-2">&ndash;</span>
            @endif
            @if(isset($prepend2) && strlen(trim($prepend2)) > 0)
                <div class="flex -mr-[-1px]">
                    @if($prepend2 != strip_tags($prepend2))
                        {!! $prepend2 !!}
                    @else
                        <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$prepend2}}</span>
                    @endif
                </div>
            @endif
            <select type="text"
                    class="inline-block h-auto flex-1 py-2 px-3 text-base leading-4 border border-gray-400 text-sm align-middle outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name2) || $errors->has($name2)  ? 'border-red-500' : null}}"
                    name="{{$name2}}" id="{{$name2}}"
                    aria-describedby="{{$name2}}HelpId">
                <option value="">Select</option>
                @foreach($options2 as $option)
                    <option
                            {{old($name2, $value2) == $option[$option2ValueKey] ? 'selected' : null}}
                            value="{{$option[$option2ValueKey]}}"
                    >{{$option[$option2TextKey]}}</option>
                @endforeach
            </select>
            @if(isset($append2) && strlen(trim($append2)) > 0)
                <div class="flex -mr-[-1px]">
                    @if($append2 != strip_tags($append2))
                        {!! $append2 !!}
                    @else
                        <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$append2}}</span>
                    @endif
                </div>
            @endif
        </div>
        @if($errors->has($name1) || $errors->has($name2))
            <small id="{{$name1}}"
                   class="block mt-1 text-red-500">
                {{$errors->first($name1)}}
                {{$errors->first($name2)}}
            </small>
        @else
            <small id="{{$name1}}" class="block mt-1 text-gray-500">
                {{@$helpText}}
            </small>
        @endif
    </div>
</div>
