<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h3 class="mb-0">
                                {{ $job->title }}
                            </h3>

                            <div>

                                <a href="{{ route('jobs') }}"
                                   class="btn btn-outline-primary me-2">
                                    Voltar
                                </a>

                                @auth

                                    @if(auth()->id() !== $job->company->user_id)

                                        <form action="{{ route('applications.store', $job) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-success">
                                                Candidatar-se
                                            </button>
                                        </form>

                                    @endif

                                @else

                                    <a href="{{ route('login') }}"
                                       class="btn btn-success">
                                        Login para se candidatar
                                    </a>

                                @endauth

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <p>
                                    <strong>Empresa:</strong>
                                    {{ $job->company->trade_name }}
                                </p>

                                <p>
                                    <strong>Categoria:</strong>
                                    {{ $job->category->name }}
                                </p>

                                <p>
                                    <strong>Modalidade:</strong>
                                    {{ $job->modality }}
                                </p>

                                <p>
                                    <strong>Horário:</strong>
                                    {{ $job->work_schedule }}
                                </p>

                            </div>

                            <div class="col-md-6">

                                <p>
                                    <strong>Regime:</strong>
                                    {{ $job->contract_type }}
                                </p>

                                <p>
                                    <strong>Salário:</strong>

                                    @if($job->salary)
                                        R$ {{ number_format($job->salary, 2, ',', '.') }}
                                    @else
                                        A combinar
                                    @endif
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    {{ $job->status }}
                                </p>

                            </div>

                        </div>

                        <hr>

                        <div class="mb-4">

                            <h5>
                                Requisitos
                            </h5>

                            <p>
                                {{ $job->requirements }}
                            </p>

                        </div>

                        <div>

                            <h5>
                                Descrição
                            </h5>

                            <p>
                                {{ $job->description }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>