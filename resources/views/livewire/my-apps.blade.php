<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Apps') }}
        </h2>
    </x-slot>
    <div>
        <ul class="max-w-7xl mx-auto py-6 px-3 sm:px-6 lg:px-3
        gap-3 grid grid-cols-auto sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white
        ">
            @forelse($apps as $app)
                <livewire:app-card :app="$app" :key="'card_'.$app->id" :showStatus="true"/>
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
