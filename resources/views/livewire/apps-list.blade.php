<div>
    <livewire:search :search-term="$searchTerm" onSearch="search"/>
   <div>
       <ul class="relative sm:flex flex-wrap sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white p-1">
           @forelse($apps as $app)
               <li class="flex flex-col gap-2 w-48 bg-gray-50 p-3">
                   <a href="{{$app->url}}">
                       <img class="rounded-3xl" src="{{$app->icon}}" width="185" alt="{{$app->name}}"/>
                       <h2 class="text-xl px-2 font-bold break-all truncate" title="{{$app->name}}">{{$app->name}}</h2>
                       <div class="text-gray-400 text-sm">
                           {{$app->categories->count() ? $app->categories->pluck('name')->join(', ') : 'Uncategorized'}}
                       </div>
                       <div class="flex justify-between">
                           <div>⭐⭐⭐</div>
                           <div>
                               <span>{{$app->price<=0 ? 'Free' : $app->formatted_price}}</span>
                           </div>
                       </div>
                   </a>
               </li>

           @empty
               <li>
                   <p>No Apps to display.</p>
               </li>
           @endforelse
       </ul>
       <div class="m-3 p-3 justify-center">
           {{$apps->links()}}
       </div>
   </div>
</div>
