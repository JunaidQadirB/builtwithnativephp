<div>
    <li class="flex flex-col rounded-lg my-3 p-3 sm:my-0 gap-6 mx-1 md:w-[18rem] w-full bg-gray-50 rounded-lg shadow hover:shadow-xl">
        {{--                    <img class="mx-auto w-full rounded-t-lg" src="{{$app->cover}}" width="185" alt="{{$app->name}}"/>--}}
        <div class="flex flex-col gap-2">
            <div class="flex">
                <img class="p-0 m-0" src="{{$app->icon}}" alt="{{$app->name}}" width="48px"/>
                <h2 class="text-xl px-2 my-3 font-bold break-all truncate"
                    title="{{$app->name}}">{{$app->name}}</h2>
            </div>
            @if($publisher)
                <div>
                <span class="inline-block text-gray-700 text-sm text-clip ">
                    @if ($app->publisher->url)
                        <a href="{{$app->publisher->url}}" target="_blank">{{$app->publisher->name}}</a>
                    @else
                        {{$app->publisher->name}}
                    @endif
                </span>
                </div>
            @endif
            @if($categories)
                <div class="text-gray-400 text-sm">
                    {{$app->categories->count() ? $app->categories->pluck('name')->join(', ') : 'Uncategorized'}}
                </div>
            @endif
            @if ($ratings)
                <div class="flex justify-between">
                    <div>⭐⭐⭐</div>
                    <div>
                        <span>{{$app->price<=0 ? 'Free' : $app->formatted_price}}</span>
                    </div>
                </div>
            @endif
            @if($platform)
                <div class="flex justify-between my-3">
                    @foreach($app->platforms as $os)
                        <img class="text-gray-400"
                             src="{{'/vendor/blade-heroicons/m-' . $os->slug . '.svg'}}" width="22"
                             alt="{{$os->name}}"/>
                    @endforeach
                </div>
            @endif
        </div>
        <a href="{{$app->url}}" class="mt-auto pt-2 w-full text-center border h-[40px] hover:bg-blue-500">App
            details</a>
    </li>
</div>
