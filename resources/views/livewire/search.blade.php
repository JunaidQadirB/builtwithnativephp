<div class="my-3 flex justify-center" wire:ignore>
    <form class="w-6/12" wire:submit.prevent="search">
        <div class="flex justify-center w-auto">
            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                    type="button">Search In
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdown"
                 class="relative z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 h-48 overflow-y-scroll">
                <div class="sticky top-0 inline-flex w-full" role="group">
                    <button type="button"
                            class="px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                            wire:click.prevent="selectAllCategories"
                    >
                        Select All
                    </button>
                    <button type="button"
                            class="px-4 py-2 text-xs font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                            wire:click.prevent="clearSearchTerm"
                    >
                        Clear
                    </button>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    @foreach($categories as $category)
                        <li wire:key="categories_li_{{$category->id}}">
                            <label for="category_{{$category->slug}}"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <input id="category_{{$category->slug}}" wire:model="searchInCategories" type="checkbox"
                                       value="{{$category->slug}}"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                {{$category->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative w-full">
                <input wire:model="searchTerm" type="search" id="search-dropdown"
                       class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                       placeholder="Search Mockups, Logos, Design Templates..." required>

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
    </form>

    {{$searchTerm}}
</div>
