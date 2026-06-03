<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                Editar Vaga
            </h2>

            <form method="POST" action="{{ route('job.update', $job) }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Título
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $job->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Modalidade
                        </label>

                        <select
                            name="modality"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                            @foreach($modalities as $modality)
                                <option value="{{ $modality }}" @selected(old('modality', $job->modality) === 'REMOTE')>
                                    {{ $modality }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Horário de Trabalho
                        </label>

                        <input
                            type="text"
                            name="work_schedule"
                            value="{{ old('work_schedule', $job->work_schedule) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo de Contrato
                        </label>

                        <select
                            name="contract_type"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                            @foreach($contract_types as $contract_type)
                                <option value="{{$contract_type}}" @selected(old('contract_type', $job->contract_type) === 'CLT')>
                                    {{ $contract_type }}
                                </option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Salário
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="salary"
                            value="{{ old('salary', $job->salary) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descrição
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >{{ old('description', $job->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Requisitos
                        </label>

                        <textarea
                            name="requirements"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >{{ old('requirements', $job->requirements) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Categoria
                        </label>

                        <select
                            name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('category_id', $job->category_id) == $category->id)
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status da Vaga
                        </label>

                        <select
                            name="status"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >
                            @foreach($statuses as $status)

                                <option
                                    value="{{ $status->value }}"
                                    @selected(old('status', $job->status->value ?? $job->status) == $status->value)
                                >
                                    {{ $status->value }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end gap-2">

                        <a href="{{ route('job.list') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-md">
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                        >
                            Salvar Alterações
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>