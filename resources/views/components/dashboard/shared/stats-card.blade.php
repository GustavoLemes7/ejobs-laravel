@props([
    'title',
    'value',
])

<div class="bg-white rounded-2xl shadow p-6 text-center">

    <div class="text-3xl font-bold">
        {{ $value }}
    </div>

    <div class="text-gray-500 mt-2">
        {{ $title }}
    </div>

</div>