<div>
    <div class="flex justify-center my-3">
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button type="button" wire:click="clearPlatform"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-100 hover:text-blue-700 border border-gray-200 rounded-l-lg focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
            >All
            </button>
            @foreach($platforms as $os)
                <button wire:click="togglePlatform({{$os}})"
                        wire:key="platform_{{$os->id}}"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900  {{in_array($os->slug, $platform) ? 'bg-blue-500 hover:bg-blue-100 hover:text-blue-700':'bg-white hover:bg-gray-100 hover:text-blue-700'}} border border-gray-200 {{$loop->last?'rounded-r-lg':''}} focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                >{{$os->name}}
                </button>
            @endforeach
        </div>
    </div>
    <livewire:search :categories="(object)$categories" :selectedCategories="$selectedCategories"
                     :search-term="$searchTerm" onSearch="search"/>
    <div>
        <ul class="max-w-7xl mx-auto py-6 px-3 sm:px-6 lg:px-3
        gap-3 grid grid-cols-auto sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white
        ">
            @forelse($apps as $app)
                <livewire:app-card :app="$app" :key="'card_'.$app->id"/>
            @empty
                <li class="text-center w-full">
                    <p class="text-gray-400">No Apps to display.</p>
                </li>
            @endforelse
        </ul>
        <div class="m-3 p-3 justify-center">
            {{$apps->links()}}
        </div>
    </div>
</div>
