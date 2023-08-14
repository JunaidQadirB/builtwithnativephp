<div class="format lg:format-md border mx-auto px-2">
    <h1 class="my-3 text-center">Submit your App</h1>
    <form class="flex flex-col gap-6">
        <div>
            <x-label for="name" :value="__('Name')"/>
            <x-input id="name" maxlength="30" class=" mt-1 w-10/12" type="text" name="name" :value="old('name')"
                     required
                     autofocus/>
        </div>

        <x-flowbite.textarea label="Description" name="description" id="description" rows="4" class="w-10/12" required
                             placeholder="Write a description of your app in 3000 characters or less." maxlength="3000"/>
    </form>
</div>
