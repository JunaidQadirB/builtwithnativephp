<div class="mb-4 text-gray-600">
    <label for="{{isset($id)?$id:$name}}">{{$label}}</label>
    <div class="relative flex flex-wrap items-stretch flatpickr">
        @if(isset($prepend) && strlen(trim($prepend)) > 0)
            <div class="flex -mr-[-1px]">
                @if($prepend != strip_tags($prepend))
                    {!! $prepend !!}
                @else
                    <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$prepend}}</span>
                @endif
            </div>
        @endif

        <input data-input class="relative flex-auto block py-1.5 px-3 text-sm font-normal border border-r-0 border-gray-400 outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 {{$errors->has($name) ? 'border-red-500' : null}}"

               name="{{$name}}" wire:model="{{$name}}" id="{{isset($id)?$id:$name}}"
               aria-describedby="{{isset($id)?$id:$name}}HelpId"
               value="{{old($name, $value)}}"
               @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
               @if(@$pattern) pattern="{{@$pattern}}" @endif

        />
        <div class="flex items-center">
            <button type="button" class="py-1.5 px-3 inline-block align-middle text-center text-sm border border-r-0 border-gray-500 transition-colors duration-150 ease-in-out hover:bg-gray-500 hover:text-white focus:bg-gray-500 focus:text-white focus:ring-4 focus:ring-gray-300" title="Toggle" data-toggle>
                <i class="fas fa-calendar"></i>
            </button>
            <button type="button" class="py-1.5 px-3 inline-block align-middle text-center text-sm border border-gray-500 transition-colors duration-150 ease-in-out hover:bg-gray-500 hover:text-white focus:bg-gray-500 focus:text-white focus:ring-4 focus:ring-gray-300" title="Clear" data-clear>
                <i class="fas fa-times  "></i>
            </button>
        </div>
        {{-- <flat-pickr class="form-control {{$errors->has($name) ? 'is-invalid' : null}}"
                     name="{{$name}}" wire:model="{{$name}}" id="{{isset($id)?$id:$name}}" aria-describedby="{{isset($id)?$id:$name}}HelpId"
                     value="{{old($name, $value)}}"
                     :config="{
                                 wrap: true,
                                 altFormat: 'F j, Y  @ h:i K',
                                 altInput: true,
                                 dateFormat: 'Y-m-d H:i:S',
                                 enableTime: true,
                                 enableSeconds:true,
                             }"></flat-pickr>--}}

    </div>
    @if($errors->has($name))
        <small id="{{isset($id)?$id:$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{isset($id)?$id:$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(($) => {
            flatpickr('.flatpickr', {
                wrap: true,
                altFormat: {!! @$altFormat ? @$altFormat : "'F j, Y  @ h:i K'" !!} ,
                altInput: true,
                dateFormat: 'Y-m-d H:i:S',
                enableTime: {!! @$enableTime ? @$enableTime : 'false' !!},
                enableSeconds: true,
            });
        })
    </script>
@endpush
