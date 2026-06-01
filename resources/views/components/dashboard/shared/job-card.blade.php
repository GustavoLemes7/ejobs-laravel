@props([
    'job'
])

<div class="border rounded-xl p-4 mb-4">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="font-bold">
                {{ $job->title }}
            </h3>

            <p class="text-gray-500 text-sm">
                {{ $job->category->name }}
                •
                {{ $job->modality }}
            </p>

        </div>

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            {{ $job->status }}
        </span>

    </div>

</div>