<div x-data="{modal: false}" x-show="modal" class="fixed w-full h-full top-0 left-0 flex items-center justify-center" x-cloak="" tabindex="-1" role="dialog" x-transition x-transition.duration.300ms>
    <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="text-gray-700 text-left">
            @if(isset($title))
                <div class="flex justify-between items-center px-3 py-4 border-b">
                    <p class="text-xl font-semibold" id="{{$id}}">{{ $title  }}</p>
                    <div @click="modal=false" class="cursor-pointer z-50 opacity-50 hover:opacity-75">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
            @endif
            <!-- Modal Body -->
            <div class="block py-2 px-3">
                {{ $slot }}
            </div>
            {{ $footer  }}
        </div>
    </div>
</div>
