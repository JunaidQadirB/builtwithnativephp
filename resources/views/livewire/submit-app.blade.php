<div class="format lg:format-md mx-auto px-2">
    <h1 class="mt-12 my-6 text-center">Submit your App</h1>
    <form class="flex flex-col gap-6">
        <x-dynamic-component
            component="tailwind.input"
            name="name"
            label="Name"
            type="text"
            :value="old('name')" />

        <x-dynamic-component
            component="tailwind.textarea"
            name="short_description"
            label="Short Description"
            type="text"
            :value="old('short_description')" />

        <x-tailwind.textarea
            wire:model="description"
            name="description"
            label="Description"
            type="text" />

        <x-dynamic-component
            component="tailwind.file"
            name="icon"
            label="Icon"
            type="text"
            :value="old('icon')"
            type="image" />
        />

        <x-dynamic-component
            component="tailwind.input"
            name="cover"
            label="Cover"
            type="text"
            :value="old('cover')" />



    </form>
</div>
