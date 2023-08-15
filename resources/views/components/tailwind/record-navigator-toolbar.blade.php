<div class="flex flex-wrap justify-start" role="toolbar" aria-label="Record Navigator Context Toolbar">
    <div class="relative text-xs text-primary inline-flex align-middle shadow-sm mx-auto lg:mr-0 lg:ml-auto" role="group" aria-label="">
        {{--<a href="{{route('dashboard.menus.index')}}" class="btn btn-outline-primary">Back to list</a>
        <a href="{{route('dashboard.menus.index')}}" class="btn btn-outline-primary">Back to list</a>--}}
        @if($previous)
            <a class="p-2 border border-r-0 border-primary hover:bg-primary hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-200 focus:bg-primary focus:text-white btn-previous-record" href="{{$previous}}" title = "Previous [Left Arrow Key]">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </a>
        @else
            <a class="p-2 border border-r-0 border-primary hover:bg-primary focus:z-10 focus:ring-2 focus:ring-gray-200 focus:bg-primary text-gray-500 btn-previous-record" title = "Previous [Left Arrow Key]">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </a>
        @endif
        @if($next)
            <a class="p-2 border border-primary hover:bg-primary hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-200 focus:bg-primary focus:text-white btn-next-record" href="{{$next}}" title = "Next [Right Arrow Key]">
                Next <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        @else
            <a class="p-2 border border-primary hover:bg-primary focus:z-10 focus:ring-2 focus:ring-gray-200 focus:bg-primary text-gray-500 btn-next-record" title = "Next [Right Arrow Key]">Next
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery(document).ready(function ($) {
                $(document).on('keyup', (event) => {
                    switch (event.originalEvent.code) {
                        case 'ArrowLeft':
                            if ($('.btn-previous-record').attr('href')) {
                                window.location = $('.btn-previous-record').attr('href');
                            }
                            break;
                        case 'ArrowRight':
                                if ($('.btn-next-record').attr('href')) {
                                window.location = $('.btn-next-record').attr('href');
                            }
                            break;
                    }
                })
            });
        });
    </script>
@endpush
