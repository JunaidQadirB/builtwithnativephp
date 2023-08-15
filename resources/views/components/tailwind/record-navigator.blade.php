<div class="text-primary w-full flex flex-wrap mb-3 border-b">
    <div class="w-full md:w-10/12">
        {!! $heading !!}

    </div>
    <div class="w-full md:w-2/12 flex h-full md:justify-start sm:justify-between self-center">
        @if($previous)
            <a class="mr-auto btn-previous-record" href="{{route($route, $previous)}}" title="Previous">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </a>&nbsp;
        @else
            <div class="mr-auto text-gray-500 btn-previous-record" title="Previous">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </div>
        @endif
        @if($next)
            <a class="ml-auto btn-next-record" href="{{route($route, $next)}}" title="Next">
                Next <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        @else
            <div class="ml-2 text-gray-500 btn-next-record" title="Next">Next <i class="fa fa-chevron-right"
                                                                              aria-hidden="true"></i>
            </div>
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
                                window.location = $('.btn-previous-record').attr('href')
                            }
                            break
                        case 'ArrowRight':
                            if ($('.btn-next-record').attr('href')) {
                                window.location = $('.btn-next-record').attr('href')
                            }
                            break
                    }
                })
            })
        })
    </script>
@endpush
