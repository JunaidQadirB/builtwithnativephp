<li class="{{collect(['class' =>'group/item flex flex-col rounded-lg relative p-3 sm:my-0 gap-2 w-auto bg-white rounded-lg shadow hover:shadow-xl'])
    ->union(['passed_class' => $class])->implode(' ')}}">
    <div class="flex flex-col gap-2">

        <div class="flex flex-row">
            @if($app->iconUrl)
                <div class="basis-1/6 mr-2">
                    <img class="p-0 m-0 min-w-[60px] w-[60px] aspect-square rounded-lg shadow" src="{{$app->iconUrl}}"
                         alt="{{$app->name}}"/>
                </div>
            @endif
            <div class="basis-full">
                <h2 class="text-xl my-0 font-bold break-all truncate overflow-hidden max-w-2xl w-46 xs:w-56"
                    title="{{$app->name}}">
                    <a href="{{$app->url}}" wire:navigate>{{$app->name}}</a>
                </h2>
                @if($showPublisher)
                    <span class="inline-block text-gray-400 text-sm text-clip ">
                    @if ($app->publisher?->url)
                            <a class="hover:text-gray-600" href="{{$app->publisher->url}}" target="_blank"
                               title="Opens in a new tab">{{$app->publisher?->name}}</a>
                        @else
                            {{$app->publisher?->name}}
                        @endif
                </span>

                @endif
            </div>
            <div class="flex ml-2">
                @if ($showStatus)
                    <div class="self-start">
                    <span
                        class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full {{$this->statusColor($app->status)}}">{{$app->status}}</span>
                    </div>
                @endif

                @if (@$app->isOwner())
                    <div class="group/edit ml-auto invisible group-hover/item:visible">
                        <button id="dropdownMenuIconButton{{$app->id}}" data-dropdown-toggle="dropdownDots{{$app->id}}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor"
                                 viewBox="0 0 4 15">
                                <path
                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDots{{$app->id}}"
                             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconButton{{$app->id}}">
                                <li>
                                    <a href="{{route('apps.edit', $app)}}"
                                       wire:navigate
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <button wire:click="deleteApp({{$app->id}})"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-100 dark:hover:bg-red-600 dark:text-red-200 dark:hover:text-white">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
        @if($showCategories)
            <div class="text-gray-400 mt-3 text-xs">
                @if($app->categories->count())
                    @foreach($app->categories as $cat)
                        <a class="hover:text-gray-600  bg-purple-100 text-purple-800 rounded-xl py-1 px-2"
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
                    <livewire:star-rating
                        wire:key="rating_{{$app->id}}"
                        :app="$app"
                        :rating="$app->userRating"
                        :reviews="false">
                    </livewire:star-rating>
                </div>
                <div>
                    <span class="text-sm font-bold">{{$app->price<=0 ? 'Free' : $app->formatted_price}}</span>
                </div>
            </div>
        @endif
        @if($showPlatform)
            <div class="flex gap-6 my-1">
                @foreach($app->platforms as $os)
                    @svg('heroicon-m-os-' . $os->slug, 'text-gray-500 w-5 h-5')
                @endforeach
                @if (count($app->platforms)>0)
                    <div class="self-center text-sm ml-auto">
                        <a href="{{$app->url}}" class="text-blue-500 font-bold hover:text-blue-600">Download</a>
                    </div>
                @endif

            </div>

        @endif
    </div>
    {{-- <a href="{{$app->url}}"
        class="mt-auto pt-2 rounded-lg w-full text-center border h-[40px] hover:bg-blue-500 hover:text-white">App
         details</a>--}}
</li>
