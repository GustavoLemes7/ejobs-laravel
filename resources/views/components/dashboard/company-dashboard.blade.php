@props([
    'company',
    'jobs',
    'jobsCount'
])

<div>

    <x-dashboard.shared.welcome-section
        :title="'Bem-vindo(a), ' . $company->trade_name"
        subtitle="Gerencie suas vagas de forma eficiente"
    />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <x-dashboard.shared.action-card
            title="Vagas Publicadas"
            :description="$jobsCount"
            icon="briefcase"
            :href="route('job.list')"
            buttonText="Ver vagas"
        />

        <x-dashboard.shared.action-card
            title="Nova Vaga"
            description="Crie uma nova vaga"
            icon="plus-circle"
            :href="route('job')"
            buttonText="Criar vaga"
        />

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-6">
            Vagas Ativas
        </h2>

        @forelse($jobs as $job)

            <x-dashboard.shared.job-card
                :job="$job"
            />

        @empty

            <p class="text-gray-500">
                Nenhuma vaga ativa no momento.
            </p>

        @endforelse

    </div>

</div>