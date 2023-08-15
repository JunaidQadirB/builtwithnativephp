<div class="text-primary h-full flex flex-col bg-white break-words border rounded-sm {{@$cardClasses ? @$cardClasses : null}}">
    <div class="flex-auto p-5 {{@$cardBodyClasses ? @$cardBodyClasses : null}}">
        <a href="{{$url}}" class="text-lg">
            @if(@$iconClasses)
                <span
                class="w-20 h-20 rounded-full bg-warning text-center flex p-3 mr-auto ml-auto justify-center">
                        <span class="{{@$iconClasses ? $iconClasses : null}} flex self-center"></span>
                </span>
            @endif
            <div class="block text-center">{{$text}}</div>
        </a>
        {!! $slot !!}
    </div>
</div>
