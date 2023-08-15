<div class="mb-4 flex flex-wrap items-center w-full">
    @if(isset($label) && trim($label) !=='')
        <label for="{{$name}}" class="{{@$leftCol??'sm:w-6/12'}} leading-normal md:text-right">{{$label}}</label>
    @endif
    <div class="{{@$rightCol??'sm:flex-1'}}">
        @foreach($options as $key => $option)
            <div class="flex items-center w-full py-2">
                <input class="overflow-visible" type="checkbox" name="{{$name}}" id="{{$name}}{{$key}}"
                       @if(isset($required) && $required) required @endif
                       value="{{$option['value']}}"
                       @if($value == $option['value']) checked @endif
                >
                <label class="inline-block ml-2" for="{{$name}}{{$key}}">
                    {{$option['label']}}
                </label>
            </div>
        @endforeach
        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
        @endif
    </div>
</div>
