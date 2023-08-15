@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Add App
@endsection

@section('content')
    <div class="text-primary w-full flex flex-wrap items-center justify-between my-6">
        <div class="justify-end">
            <h2 class="text-3xl font-bold">Add App</h2>
        </div>
        <div class="">
            <div class="flex flex-wrap justify-start" role="toolbar" aria-label="apps Context Toolbar">
                <div class="relative inline-flex items-center" role="group" aria-label="">
                    <a href="{{route('apps.index')}}" class="py-1.5 px-2 text-sm text-primary border border-primary hover:bg-primary hover:text-white focus:z-10 focus:bg-primary focus:text-white">Back to list</a>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('apps.store')}}" method="post">
        <div class="w-full flex flex-wrap">
            {{csrf_field()}}
            <div class="w-full md:w-8/12 mx-auto">
                @include('apps._form')
                <div class="mb-4 flex flex-wrap">
                    <div class="w-full sm:w-6/12 ml-auto">
                        <button type="submit" class="block w-full p-2 bg-primary text-white ml-auto">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
