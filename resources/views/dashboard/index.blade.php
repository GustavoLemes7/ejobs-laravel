<x-app-layout>

    <div class="container py-6">

        @if(auth()->user()->isCompany())

            <x-dashboard.company-dashboard
                :company="$company"
                :jobs="$jobs"
                :jobsCount="$jobsCount"
            />

        @elseif(auth()->user()->isCandidate())

            <x-dashboard.candidate-dashboard />

        @endif

    </div>

</x-app-layout>