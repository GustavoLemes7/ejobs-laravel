<x-app-layout>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET" action="{{ route('jobs') }}">

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Buscar</label>

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Título, descrição..."
                           value="{{ request('search') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Categoria</label>

                    <select name="category_id" class="form-select">

                        <option value="">
                            Todas
                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                @selected(request('category_id') == $category->id)>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Modalidade</label>

                    <select name="modality" class="form-select">

                        <option value="" selected>Todas</option>

                        @foreach($modalities as $modality)

                            <option value="{{ $modality }}">

                                {{ $modality }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Contrato</label>

                    <select name="contract_type" class="form-select">

                        <option value="">Todos</option>

                        @foreach($contract_types as $contract_type)

                            <option value="{{ $contract_type }}">

                                {{ $contract_type }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button type="submit"
                            class="btn btn-primary w-100">
                        Filtrar
                    </button>

                </div>

            </div>

        </form>

    </div>
</div>

<div class="container py-5">

    @if(request('search'))
        <div class="text-center mb-4">
            <h4>Resultados para "{{ request('search') }}"</h4>
        </div>
    @endif

    @if($vagas->isEmpty())
        <div class="alert alert-warning">
            Nenhuma vaga encontrada.
        </div>
    @else

        <div class="row">

            @foreach($vagas as $vaga)

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                {{ $vaga->title }}
                            </h5>

                            <p class="text-muted mb-3">
                                {{ $vaga->company->trade_name ?? 'Empresa não informada' }}
                            </p>

                            <ul class="list-unstyled small">

                                <li>
                                    <strong>Modalidade:</strong>
                                    {{ $vaga->modality ?? '-' }}
                                </li>

                                <li>
                                    <strong>Horário:</strong>
                                    {{ $vaga->work_schedule ?? '-' }}
                                </li>

                                <li>
                                    <strong>Contrato:</strong>
                                    {{ $vaga->contract_type ?? '-' }}
                                </li>

                                <li>
                                    <strong>Salário:</strong>

                                    @if($vaga->salary)
                                        R$ {{ number_format($vaga->salary, 2, ',', '.') }}
                                    @else
                                        A combinar
                                    @endif
                                </li>

                                <li>
                                    <strong>Categoria:</strong>
                                    {{ $vaga->category->name ?? '-' }}
                                </li>

                            </ul>

                            <div class="mt-3">
                                <strong>Descrição:</strong>

                                <p class="mt-1">
                                    {{ \Illuminate\Support\Str::limit($vaga->description, 120) }}
                                </p>
                            </div>

                            <div class="mt-3">
                                <strong>Requisitos:</strong>

                                <p class="mt-1">
                                    {{ \Illuminate\Support\Str::limit($vaga->requirements, 80) }}
                                </p>
                            </div>

                            <div class="mt-auto">

                                <a href="{{ route('jobs.show', $vaga) }}"
                                   class="btn btn-primary w-100">
                                    Ver detalhes
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="mt-4">
            {{ $vagas->links() }}
        </div>

    @endif

</div>

</x-app-layout>