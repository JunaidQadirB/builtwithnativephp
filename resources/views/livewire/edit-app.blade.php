<div>
    <div class="format lg:format-md mx-auto w-full px-2">
        <h1 class="mt-12 my-6 text-center">Edit App</h1>
        <form wire:submit.prevent="submit" class="flex flex-col gap-6 px-4 sm:w-8/12 sm:px-0 mx-auto">
            <x-tailwind.input
                name="name"
                label="Name"
                maxlength="100"
                show-length="true"
                placeholder="Name of the app"/>

            <x-tailwind.input
                name="short_description"
                label="Sort Description"
                maxlength="100"
                row="3"
                show-length="true"
                placeholder="Sort Description of the app"/>

            <x-tailwind.textarea
                name="description"
                label="Description"
                maxlength="3000"
                row="15"
                show-length="true"
                placeholder="Description of the app"/>

            <x-tailwind.input
                name="icon"
                type="file"
                label="App Icon"
                placeholder="Choose an icon for the app"/>
            @if ($this->iconUrl && !$errors->has('icon'))
                <img src="{{ $this->iconUrl }}" alt="Preview" width="100"/>
            @endif
            <x-button class="mt-6 mx-auto">Submit</x-button>
        </form>
    </div>
</div>
