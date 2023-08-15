<div class="mb-4 text-gray-600 {{@$groupClasses ? @$groupClasses : null}}">
    <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    <div>
        <input id="{{$name}}Input" type="hidden" name="{{$name}}">
        <trix-editor
            value="{{old($name, $value)}}"
            rows="{{@$rows??5}}" class="block w-full py-2 px-3 text-base leading-4 border outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
            id="{{isset($id)?$id:$name}}" wire:model.live="{{$name}}" aria-describedby="{{$name}}HelpId"
            @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
            input="{{$name}}Input"></trix-editor>

        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
        @elseif(isset($helpText))
            <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{$helpText}}</small>
        @endif
    </div>
</div>
