<div class="flex items-center py-1">
    @foreach(range(1, 5) as $i)
        <label for="rating-{{ $i }}" class="cursor-pointer" wire:key="star_{{$app->id}}_{{$i}}"
               wire:click="rate({{$i}})">
            <span class="sr-only">Rating {{ $i }}</span>
            <svg
                class="w-5 h-5 fill-current hover:text-yellow-300 {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-400' }}"
                viewBox="0 0 24 24">
                <path
                    d="M12 17.27l-5.27 3.18 1.09-6.01L2.5 9.82l6.05-.88L12 3.5l2.45 5.44 6.05.88-5.32 4.62 1.09 6.01z"/>
            </svg>
        </label>
    @endforeach

    @if ($this->average>0)
        <p class="my-0 ml-2 text-sm font-bold text-gray-900 dark:text-white">{{$this->average}}</p>
    @endif

    @if ($reviews)
        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
        <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">73
            reviews</a>
    @endif
</div>
