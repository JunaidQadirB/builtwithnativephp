<div>
    {{--<img src="{{$app->cover}}" alt="{{$app->name}}" class="w-full"/>--}}
    <div class="format lg:format-md w-12/12 mx-auto mt-5 mb-5 px-3">
        <article class="format lg:format-md">
            <div class="flex flex-row gap-2 my-0">
                <img src="{{$app->icon}}" alt="{{$app->name}} Icon" width="150px" class="py-0 my-0 mb-3"/>
                <div class="flex flex-col gap-2">
                    <h1 class="mb-2">{{$app->name}}</h1>
                    @if($app->publisher)
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
                    <div>
                        <livewire:star-rating :app="$app" :rating="$app->userRating"></livewire:star-rating>
                    </div>
                    <div>
                        {!! $app->categories->count() ? $app->categories
        ->pluck('name','slug')
        ->map(function ($name,$slug){
        return <<< LINK
         <a class="hover:text-blue-800 hover:bg-blue-100" href="/categories/$slug" target="_blank" title="Open $name category in a new tab">$name</a>
        LINK;
        })->join(' • ') : 'Uncategorized' !!}
                    </div>
                </div>
            </div>
            <div class="flex justify-between my-5">
                <a href="/downlaod"
                   class="no-underline text-blue-700 hover:text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    @svg('heroicon-o-share', 'w-5 h-5 inline-block mr-1')
                </a>
                @if($app->downloadUrls())
                    <div class="flex flex-row gap-1 items-center px-3 bg-gray-200 rounded-full">
                        <label class="text-sm font-bold">Available for &nbsp;</label>
                        @foreach($app->downloadUrls() as $os)
                            <a href="{{$os->url}}"
                               class="no-underline border border-gray-700 hover:border-blue-800 text-blue-700 hover:text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full font-medium text-xs px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                @svg('heroicon-o-arrow-small-down', 'w-4 h-4 inline-block mr-1')
                                {{$os->name}}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div>{{$app->description}}</div>
        </article>
    </div>
    <hr class="format mx-auto"/>
    @if ($app->similarApps()->count())
        <div class="w-full md:w-8/12 mx-auto my-9 h-96S px-3 sm:px-0">
            <div class="format max-w-full lg:format-md text-center">
                <h2 class="my-3">Similar Apps</h2>
            </div>
            <ul class="flex flex-wrap mx-auto xs:w-full justify-center">
                @forelse ($app->similarApps() as $item)
                    <livewire:app-card
                        :app="$item"
                        :key="$item->id"
                        :short-description="false"
                        :price="false"
                        :publisher="false"
                        :categories="false"
                        :ratings="false"
                        :platform="false"
                    ></livewire:app-card>
                @empty
            </ul>
            @endforelse
        </div>
    @endif

</div>
