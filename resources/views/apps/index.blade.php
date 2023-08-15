<x-app-layout>



    <div class="text-primary w-full flex flex-wrap items-center justify-between my-6">
        <div class="justify-start">
            <h2 class="text-3xl font-bold">Apps</h2>
        </div>
        <div class="justify-end">
            <div class="flex flex-wrap justify-start" role="toolbar" aria-label="apps Context Toolbar">
                <div class="relative inline-flex align-middle items-center" role="group" aria-label="">
                    <a href="{{route('apps.create')}}" class="py-1.5 px-2 text-sm text-primary border border-primary hover:bg-primary hover:text-white focus:z-10 focus:bg-primary focus:text-white">Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-primary relative table-auto overflow-x-auto">
        <table class="table border-t border-b-inherit w-full text-sm text-left">
            <thead class="bg-white">
                <tr class="border-b-2 border-b-inherit font-light">
                    <th class="py-3 px-4">Id</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Description</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="text-right py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($apps as $app)
                <tr class="border-b border-gray-300 odd:bg-gray-100 even:bg-white">
                    <td class="py-2 px-4">{{$app->id}}</td>
                    <td class="py-2 px-4">{{$app->name}}</td>
                    <td class="py-2 px-4">{{$app->description}}</td>
                    <td class="py-2 px-4">{{$app->status}}</td>
                    <td class="py-2 px-4 text-right">
                        <div class="relative inline-flex align-middle" role="group" aria-label="">
                            <a type="button" class="p-2 text-xs bg-primary text-white hover:bg-gray-900 focus:bg-gray-900" href="{{route('apps.edit', $app->id)}}">Edit</a>
                            <div x-data="{show:false}" @click.away="show=false" class="inline-block relative">
                                <button @click="show=!show" type="button" class="px-1 py-2 bg-gray-400 text-white">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="show" class="absolute py-1 text-center right-5 mt-1 text-gray-700 z-20 w-24 bg-white rounded border">
                                    <a type="submit"
                                    href="{{route('apps.edit', $app->id)}}"
                                    data-toggle="modal" data-id="{{$app->id}}"
                                    class="block text-red-500 py-2 px-4 hover:bg-warning">Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="border-b border-gray-300 odd:bg-gray-100 even:bg-white">
                    <td colspan="5" class="py-3 px-4">
                        <p class="text-center mb-0">
                            No App to show. <a class="p-2 text-xs bg-primary text-white hover:bg-gray-900"
                            href="{{route('apps.create')}}">Add One</a>
                        </p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $apps->links() }}
    @include('apps.modals.delete',['id' => "deleteAppModal"])

</x-app-layout>
