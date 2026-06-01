@props([
    'title',
    'description' => null
])

<div class="mb-6">

    <h2 class="text-2xl font-bold">
        {{ $title }}
    </h2>

    @if($description)
        <p class="text-gray-500 mt-1">
            {{ $description }}
        </p>
    @endif

</div>