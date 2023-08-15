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
            <input class="block flex-1 py-2 px-3 mb-1 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
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
            <input class="block w-full py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm {{$errors->has($name2) ? 'border-red-500' : null}}"
                   type="{{@$type2?:'text'}}"
                   name="{{$name2}}" id="{{$name2}}" aria-describedby="{{$name2}}HelpId"
                   value="{{old($name2, $value)}}"
                   @if(@$placeholder2) placeholder="{{@$placeholder2}}" @endif
                   @if(@$pattern2) pattern="{{@$pattern2}}" @endif
                   @if($type2 == 'number') step="{{@$step?:1}}" @endif
                   @if($type2 == 'number') min="{{@$min2?:0}}" @endif
                   @if($type2 == 'number' && isset($max2)) max="{{@$max2}}" @endif
            />
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

        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
        @endif
    </div>
</div>
