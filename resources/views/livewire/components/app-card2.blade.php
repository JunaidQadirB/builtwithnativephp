<li class="{{
    collect(['class' =>'flex flex-col rounded-lg relative my-3 p-3 sm:my-0 gap-6 w-full sm:max-w-[18rem] md:max-w-[22rem] bg-gray-50 rounded-lg shadow hover:shadow-xl'])
    ->union(['passed_class' => $class])->implode(' ')
}}">
    {{--@if ($app->status!=='Published')
        <livewire:ribbon :title="$app->status"/>
    @endif--}}
    {{-- <img class="mx-auto w-full rounded-t-lg" src="{{$app->cover}}" width="185" alt="{{$app->name}}"/>--}}
    <div class="flex flex-col gap-2">
        <div class="flex justify-between">
            @if($app->iconUrl)
                <div>
                    <img class="p-0 m-0 w-20 aspect-square rounded-lg shadow" src="{{$app->iconUrl}}"
                         alt="{{$app->name}}"/>
                </div>
            @endif

            <div class="flex flex-col px-2">
                <h2 class="text-xl my-1 font-bold break-all truncate"
                    title="{{$app->name}}">{{$app->name}}</h2>
                <div>
                    <span
                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Yellow</span>
                </div>
            </div>

            <div>
                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 4 15">
                        <path
                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDots"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="#"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        @if($showPublisher)
            <div>
                <span class="inline-block text-gray-400 text-sm text-clip ">
                    @if ($app->publisher?->url)
                        <a class="hover:text-gray-600" href="{{$app->publisher->url}}" target="_blank"
                           title="Opens in a new tab">{{$app->publisher?->name}}</a>
                    @else
                        {{$app->publisher?->name}}
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
    @if ($app->isOwner())

    @endif
    {{-- <a href="{{$app->url}}"
        class="mt-auto pt-2 rounded-lg w-full text-center border h-[40px] hover:bg-blue-500 hover:text-white">App
         details</a>--}}
</li>
