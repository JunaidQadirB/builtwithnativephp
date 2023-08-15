@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('content')
    <div class="text-primary w-full flex flex-wrap items-center justify-between my-6">
        <div class="justify-start">
            <h2 class="text-3xl font-bold">App</h2>
        </div>
        <div class="justify-end">
            <div class="flex flex-wrap justify-start" role="toolbar" aria-label="apps Context Toolbar">
                <div class="relative inline-flex items-center" role="group" aria-label="">
                    <a href="{{route('apps.index')}} class="py-1.5 px-2 text-sm text-primary border border-primary hover:bg-primary hover:text-white focus:z-10 focus:bg-primary focus:text-white">Back to list</a>
                </div>
            </div>
        </div>
    </div>
    @component('components.record-navigator', [
        'heading'=> $app->name,
        'route' => 'apps.show',
        'previous' => $previous,
        'next' => $next
    ])@endcomponent

    <p>Display fields here.</p>
@endsection



