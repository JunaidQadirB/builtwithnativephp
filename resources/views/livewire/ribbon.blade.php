<div class="absolute overflow-hidden -right-1 -top-1 w-12 aspect-square text-sm">
    <div class="absolute w-1 h-1 bg-yellow-500 top-0 left-0 z-0"></div>
    <div class="absolute w-1 h-1 bg-yellow-500 bottom-0 right-0 z-0"></div>
    <div
        class="absolute block bg-yellow-300 text-yellow-600 bottom-0 right-0 w-[141.42%] h-5 shadow-md text-center origin-bottom-right rotate-45"
        @if($title!=='')
            title="{{$title}}"
        @endif
    >{{$text}}</div>
</div>
