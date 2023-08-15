<div class="mb-4 text-gray-600">
    <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    <textarea rows="{{@$rows??5}}" class="block w-full py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
              name="{{$name}}" wire:model="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
              @if(@$placeholder) placeholder="{{@$placeholder}}" @endif>@if(@$value) {{old($name, @$value)}} @endif</textarea>
    @if($errors->has($name))
        <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif
    {{$value}}
</div>
