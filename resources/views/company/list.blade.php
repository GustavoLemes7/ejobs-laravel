<x-app-layout>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="mb-0">
                Minhas Vagas
            </h3>

            <a href="{{ route('job') }}"
               class="btn btn-success">
                Nova Vaga
            </a>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($jobs->isEmpty())

            <div class="alert alert-warning text-center">
                Você ainda não publicou nenhuma vaga.
            </div>

        @else

            <div class="card shadow-sm">

                <div class="card-body">

                    <table class="table table-hover align-middle">

                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Modalidade</th>
                                <th>Regime</th>
                                <th>Status</th>
                                <th>Candidaturas</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($jobs as $job)

                                <tr>

                                    <td>
                                        {{ $job->title }}
                                    </td>

                                    <td>
                                        {{ $job->modality }}
                                    </td>

                                    <td>
                                        {{ $job->contract_type }}
                                    </td>

                                    <td>

                                        @if($job->status === 'Ativa')
                                            <span class="badge bg-success">
                                                {{ $job->status }}
                                            </span>
                                        @elseif($job->status === 'Pausada')
                                            <span class="badge bg-warning text-dark">
                                                {{ $job->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                {{ $job->status }}
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $job->applications_count ?? $job->applications->count() }}
                                    </td>

                                    <td>

                                        <div class="btn-group">

                                            <a href="{{ route('jobs.show', $job) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                Visualizar
                                            </a>

                                            <a href="{{ route('job.edit', $job) }}"
                                               class="btn btn-outline-warning btn-sm">
                                                Editar
                                            </a>

                                            <a href="{{ route('job', $job) }}"
                                               class="btn btn-outline-info btn-sm">
                                                Candidatos
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    </div>

</x-app-layout>