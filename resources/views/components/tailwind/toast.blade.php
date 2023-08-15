<!-- Toast -->
<div x-data="{showToast: true}" x-show="showToast" class="text-gray-700 w-full w-80 text-sm bg-white border shadow-md rounded-md" role="alert" aria-live="assertive" aria-atomic="true" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
    <!-- Toast header -->
    <div class="flex justify-between items-center py-1 px-3 border-b">
        <button type="button" x-on:click="showToast=false" class="text-2xl text-black font-bold ml-1" data-bs-dismiss="toast" aria-label="Close">
            <span class="sr-only">Close</span>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Toast body -->
    <div class="p-3 break-words">
        {!! $slot !!}
    </div>
</div>
