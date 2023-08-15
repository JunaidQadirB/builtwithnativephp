<div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
    <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    <div class="w-full">
        <input type="text"
               id="{{$name}}"
               class="block w-full py-2 px-3 mb-1 text-base leading-4 border placeholder-gray-400 placeholder:text-sm outline-0 focus:ring-1 ring-blue-200"
               @if(isset($value))
               data-initial-value="{{ $value }}"
               @endif
               name="{{$name}}" wire:model="{{$name}}"
               multiple="{{@$multiple ?? false}}"
               data-url="{{$url}}"
               data-user-option-allowed="true"
               data-load-once="true"
        />
        @if($errors->has($name))
            <small class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery(function ($) {
                let {{$name}} = $('#{{$name}}');
                if({{$name}}.data('initial-value')){
                    {{$name}}.val({{$name}}.data('initial-value').map(item => {
                        return item.value
                    }).join(','));
                }

                {{$name}}.fastselect()
            })
        });
    </script>
@endpush
