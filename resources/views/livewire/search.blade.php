<div class="my-3 flex justify-center">
    <form class="w-full px-3 sm:px-0 sm:w-6/12 " wire:submit.prevent="search">
        <div class="flex justify-center w-auto">
            @if ($showCategories)
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">Categories
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div wire:ignore.self id="dropdownSearch"
                     class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                    <div class="p-3">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="input-group-search"
                                   class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search category">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownSearchButton">
                        @foreach($categories as $category)
                            <li wire:key="cats_{{$category->id}}">
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="category_{{$category->slug}}" type="checkbox"
                                           wire:model="selectedCategories"
                                           value="{{$category->slug}}"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="category_{{$category->slug}}"
                                           class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$category->name}}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button type="button"
                            wire:click.prevent="unSelectAllCategories"
                            class="w-full p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-500 hover:underline">
                        Clear
                    </button>
                </div>
            @endif

            <div class="relative w-full">
                <input wire:model="searchTerm" type="search" id="search-dropdown" minlength="2"
                       class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg rounded-l-lg @if($showCategories) border-l-gray-50 border-l-2 @endif border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                       placeholder="Find your favorite NativePHP app" required/>


                <button type="submit"
                        class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <button type="button"
                        class="{{!$searchTerm ? 'd-none':''}} absolute top-0 right-9 p-2.5 text-sm font-medium h-full text-gray-500 focus:ring-4 focus:outline-none focus:border-none dark:focus:ring-gray-800"
                        wire:click.prevent="clearSearchTerm">
                    <x-heroicon-m-x-mark class="w-4"/>

                    <span class="sr-only">Clear</span>
                </button>
            </div>

        </div>
        @if ($showCategories)
            <div class="mt-2 mb-3">
                Searching in {{Str::plural('category',count($selectedCategories))}}: <span
                    class="font-medium text-blue-700">{{count($selectedCategories) ? collect($selectedCategories)
->map(function($cat)use($categories){
    return $categories->firstWhere('slug',$cat)->name;
})->join(' - ') : 'All'}}</span>
            </div>
        @endif
    </form>
</div>
