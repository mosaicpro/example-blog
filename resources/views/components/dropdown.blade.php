@props(['trigger'])
<div class="relative lg:inline-flex">
    <div x-data="{ show: false }">
        <div @click="show = !show">
            {{$trigger}}
        </div>

        <div x-show = "show" class="absolute mt-2 w-full rounded bg-gray-100 z-50 overflow-auto max-h-52" style="display: none">
            {{$slot}}
        </div>
    </div>
</div>
