<li class="flex flex-col rounded-lg my-3 p-3 sm:my-0 gap-6 w-full sm:max-w-[18rem] md:max-w-[22rem] bg-gray-50 rounded-lg shadow hover:shadow-xl">
    {{--                    <img class="mx-auto w-full rounded-t-lg" src="{{$app->cover}}" width="185" alt="{{$app->name}}"/>--}}
    <div class="flex flex-col gap-2">
        <div class="flex">
            <img class="p-0 m-0" src="{{$app->icon}}" alt="{{$app->name}}" width="48px"/>
            <h2 class="text-xl px-2 my-3 font-bold break-all truncate"
                title="{{$app->name}}">{{$app->name}}</h2>
        </div>
        @if($showPublisher)
            <div>
                <span class="inline-block text-gray-400 text-sm text-clip ">
                    @if ($app->publisher->url)
                        <a class="hover:text-gray-600" href="{{$app->publisher->url}}" target="_blank"
                           title="Opens in a new tab">{{$app->publisher->name}}</a>
                    @else
                        {{$app->publisher->name}}
                    @endif
                </span>
            </div>
        @endif
        @if($showCategories)
            <div class="text-gray-400 text-sm">
                @if($app->categories->count())
                    @foreach($app->categories as $cat)
                        <a class="hover:text-gray-600"
                           wire:key="category_{{$app->id}}_{{$cat->id}}"
                           href="{{route('categories.show', $cat->slug)}}"
                           title="Goto {{$cat->name}}">{{$cat->name}}</a>
                    @endforeach
                @endif
            </div>
        @endif
        @if ($showRatings)
            <div class="flex justify-between">
                <div>
                    <livewire:star-rating :app="$app" :rating="$app->userRating"
                                          :reviews="false"></livewire:star-rating>
                </div>
                <div>
                    <span>{{$app->price<=0 ? 'Free' : $app->formatted_price}}</span>
                </div>
            </div>
        @endif
        @if($showPlatform)
            <div class="flex justify-between my-3">
                @foreach($app->platforms as $os)
                    <img class="text-gray-400"
                         wire:key="platform_{{$app->id}}_{{$os->id}}"
                         src="{{'/vendor/blade-heroicons/m-' . $os->slug . '.svg'}}" width="22"
                         alt="{{$os->name}}"/>
                @endforeach
            </div>
        @endif
    </div>
    <a href="{{$app->url}}" class="mt-auto pt-2 rounded-lg w-full text-center border h-[40px] hover:bg-blue-500 hover:text-white">App
        details</a>
</li>
