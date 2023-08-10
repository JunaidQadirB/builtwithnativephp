<div class="w-12/12 mx-auto border">
    <livewire:search :search-term="$searchTerm" onSearch="search" :show-categories="false"/>
    <h1 class="my-6 text-center text-5xl">{{$category->name}}</h1>
    <div>
        <ul class="relative sm:flex flex-wrap sm:justify-start mx-auto bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white p-1 gap-3 w-11/12">
            @forelse ($apps as $item)
                <livewire:app-card
                    :app="$item"
                    :key="$item->id"
                    :categories="false"
                ></livewire:app-card>
            @empty
        </ul>
        @endforelse
    </div>
</div>
