<form action="{{$action}}" method="post"
      @if(@$hasFile==true)
      enctype="multipart/form-data"
        @endif
>
    {{csrf_field()}}
    @if($method != 'post')
        <input type="hidden" name="_method" value="{{$method}}"/>
    @endif
    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-8/12">
            @include($form)
            <div class="mb-4 w-full flex flex-wrap">
                <div class="w-full md:w-6/12">&nbsp;</div>
                <div class="w-full md:w-6/12">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</form>
