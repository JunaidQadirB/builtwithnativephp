<div class="text-gray-600 mb-3 {{@$isImage ? 'mb-0' : ''}}" wire:ignore>
    <label for="{{$name}}" class="block mb-1.5">{{$label}}</label>
    <div class="relative flex flex-wrap items-stretch py-1.5 px-2 border">
        @if(isset($prepend) && strlen(trim($prepend)) > 0)
            <div class="flex -mr-[-1px]">
                @if($prepend != strip_tags($prepend))
                    {!! $prepend !!}
                @else
                    <span class="flex items-center py-1.5 px-3 text-base text-gray-700 bg-gray-200 border rounded">{{$prepend}}</span>
                @endif
            </div>
        @endif
        <input class="relative flex flex-wrap items-stretch w-full pb-5 {{$errors->has($name) ? 'border-red-600' : null}}"
               type="file"
               name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
               value="{{old($name, $value)}}"
               @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
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
    @if(@$isImage)
        <div class="relative flex flex-wrap items-stretch w-full border-t-0" style="height: 150px">
            <img class="py-1 self-center ml-auto mr-auto h-full"
                 id="{{$name}}Preview" height="100px" alt="{{$label}}"
            />
        </div>
    @endif
    @if($errors->has($name))
        <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{!! @$helpText !!}</small>
    @endif
</div>
@if(@$isImage)

    @push('scripts')
        <script>
            (function () {
                $ = jQuery;

                function setPreview(file) {
                    var reader = new FileReader();
                    // Set preview image into the popover data-content
                    reader.onload = function (e) {

                        let src = e.target.result;
                        $('#{{$name}}Preview').attr('src', src);
                    };
                    reader.readAsDataURL(file);
                }

                @if($value)
                $('#{{$name}}Preview').attr('src', "{{$value}}");
                @endif

                $("#{{$name}}:file").change(function () {
                    var file = this.files[0];
                    setPreview(file);
                });
            })();
        </script>
    @endpush
@endif
