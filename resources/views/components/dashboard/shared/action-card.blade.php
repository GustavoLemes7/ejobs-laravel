@props([
    'title',
    'description',
    'icon',
    'href',
    'buttonText'
])

<div class="bg-white rounded-2xl shadow p-6 text-center">

    <div class="text-4xl mb-4">
        <i class="fas fa-{{ $icon }}"></i>
    </div>

    <h2 class="text-xl font-bold">
        {{ $title }}
    </h2>

    <p class="text-gray-500 mt-2">
        {{ $description }}
    </p>

    <a
        href="{{ $href }}"
        class="inline-block mt-4 bg-black text-white px-4 py-2 rounded-lg"
    >
        {{ $buttonText }}
    </a>

</div>