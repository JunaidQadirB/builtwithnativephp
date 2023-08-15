<div class="mb-4 text-gray-600">
    @if(null !== @$label && @$label!==false)
        <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    @endif
    <textarea rows="{{@$rows??5}}" class="block w-full py-2 px-3 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200 {{$errors->has($name) ? 'border-red-500' : null}}"
              name="{{$name}}" wire:model="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
              @if(@$placeholder) placeholder="{{@$placeholder}}" @endif>{{$value}}</textarea>
    @if($errors->has($name))
        <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif
</div>

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <style>
        html.interface-interface-skeleton__html-container {
            position: unset;
        }
    </style>
@endpush

@once
    @push('scripts')
        <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
        <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
        <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Laraberg.init('{{$name}}',
                {
                    minHeight: '500px',
                    sidebar: false,
                })
        })
    </script>
@endpush
