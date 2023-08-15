<div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
    <label for="{{$name}}" class="{{@$leftCol??'sm:w-6/12'}} block w-full mb-1.5">{{$label}}</label>
    <div class="{{@$rightCol??'sm:flex-1'}}">
        @foreach($options as $key => $option)
            <div class="flex items-center w-full mb-1.5">
                <input class="overflow-visible" type="radio" name="{{$name}}" wire:model.live="{{$name}}" id="{{$name}}{{$key}}"
                       value="{{$option['value']}}"
                       @if(old($name, $value) == $option['value']) checked @endif
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
