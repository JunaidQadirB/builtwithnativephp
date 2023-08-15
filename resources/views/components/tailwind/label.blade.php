@if(!in_array($name,$exclude))
    <div class="mb-4 text-gray-600 w-full flex flex-wrap items-center">
        @if(is_array($value))
            @if(@$types[$name] == 'image')
                <label class="w-6/12 block leading-normal mb-1.5"><img src="{!!$value!!}" alt="" width="150"/></label>
            @else
                @foreach($value as $key=>$val)
                    @if($key==0)
                        <label for="{{$name}}" class="w-3/12 block leading-normal mb-1.5"><strong>{{$label}}</strong></label>
                    @else
                        <label for="{{$name}}" class="w-3/12 block leading-normal mb-1.5"></label>
                    @endif
                        <label class="w-7/12 block leading-normal mb-1.5">{{$val}}</label>
                @endforeach
            @endif
        @else
            <label for="{{$name}}" class="w-3/12 block leading-normal mb-1.5"><strong>{{$label}}</strong></label>

            @if(@$types[$name] == 'image')
                <label class="w-6/12 block leading-normal mb-1.5"><img src="{!!$value!!}" alt="" width="150"/></label>
            @else
                <label class="w-6/12 block leading-normal mb-1.5">{!!$value!!}</label>
            @endif
        @endif

    </div>
@endif
