<div class="mb-4"
     x-data="{
    value: @entangle($attributes->wire('model')),
    initPikaday(){
    new Pikaday({
        field: this.$refs.{{ $attributes['name']}},
        format: 'YYYY-MM-DD',
         toString(date, format) {
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${year}/${month}/${day}`;
    },
    parse(dateString, format) {
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
         })
    }
    }"
     x-init="initPikaday"
     x-on:change="value = $event.target.value"
>
    <label for="{{$attributes['name']}}" class="block mb-1.5">{{$attributes['label']}}</label>
    <div class="relative flex flex-wrap items-stretch">
        <input {{ $attributes['class'] }}
            x-ref="{{ $attributes['name']}}"
            type="text"
            x-bind:value="value"/>
    </div>
    @error($attributes['name'])
    <small id="fromHelp"
           class="block mt-1 text-red-500">{{$message}}</small>
    @enderror
</div>
