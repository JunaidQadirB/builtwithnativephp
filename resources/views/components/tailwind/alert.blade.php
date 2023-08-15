<div x-data="{alert: true}" x-show="alert" class="text-gray-800 px-3 flex items-center mb-4 bg-red-100 fill-transparent rounded-lg" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" role="alert">
    {!! $slot !!}
    <button x-on:click="alert=false" type="button" class="ml-auto mb-auto text-inherit text-2xl p-3 font-bold leading-none shadow-sm opacity-50 hover:opacity-75 focus:ring focus:opacity-75" aria-label="Close">
        <span class="sr-only">Close</span>
        <span aria-hidden="true">&times;</span>
    </button>
</div>
