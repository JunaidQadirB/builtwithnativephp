<div class="mb-4 text-gray-600">
    <label for="{{isset($id)?$id:$name}}" class="block mb-1.5">{{$label}}</label>
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
        <input class="block flex-1 py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
               type="{{@$type?:'text'}}"
               name="{{$name}}" wire:model.live="{{$name}}" id="{{isset($id)?$id:$name}}" aria-describedby="{{isset($id)?$id:$name}}HelpId"
               value="{{old($name, @$value)}}"
               @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
               @if(@$pattern) pattern="{{@$pattern}}" @endif
               @if($type == 'number') step="{{@$step?:1}}" @endif
               @if($type == 'number') min="{{@$min?:0}}" @endif
               @if($type == 'number' && isset($max)) max="{{@$max}}" @endif

               @if(@$pattern) pattern="{{@$pattern}}"
               oninvalid="this.setCustomValidity('{{@$placeholder? $placeholder:'Format not valid'}}')"
               onchange="try{setCustomValidity('')}catch(e){}"
               oninput="setCustomValidity(' ')"
            @endif

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
    </div>

    @if($errors->has($name))
        <small id="{{isset($id)?$id:$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{isset($id)?$id:$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif
</div>
