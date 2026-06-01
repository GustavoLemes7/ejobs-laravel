@props([
    'title',
    'subtitle'
])

<div class="mb-8">

    <h1 class="text-3xl font-bold">
        {{ $title }}
    </h1>

    <p class="text-gray-500 mt-2">
        {{ $subtitle }}
    </p>

</div>