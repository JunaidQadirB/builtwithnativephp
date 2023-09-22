<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Apps') }}
        </h2>
    </x-slot>
    <div>
        <ul class="max-w-7xl mx-auto py-6 px-3 sm:px-6 lg:px-3 gap-3 grid grid-cols-auto sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
            @forelse($apps as $app)
                <livewire:app-card :app="$app" :key="'card_'.$app->id" :showStatus="true" :showPublisher="true"/>
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

    <x-confirmation-modal wire:model.live="confirmAppDeletion">
        <x-slot name="title">
            {{ __('Delete') }} {{$appNameToDelete}}
        </x-slot>

        <x-slot name="content">
            <p>
                {{ __('Are you sure you would like to delete this App?') }}
            </p>
            @if ($appToDeleteIsPublished)
                <p class="text-red-500 my-3">
                    <span
                        class="font-bold">{{_('Warning:')}}</span> {{ __('This App is published and will be removed from the store.') }}
                </p>

            @endif
            <p>

            </p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmAppDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteApp" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
