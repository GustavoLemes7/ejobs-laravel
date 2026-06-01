<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                Criar Vaga
            </h2>

            <form method="POST" action="{{ route('job.store') }}">
                @csrf

                <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Título
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
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
                            <option value="REMOTE">Remoto</option>
                            <option value="PRESENTIAL">Presencial</option>
                            <option value="HYBRID">Híbrido</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Horário de Trabalho
                        </label>

                        <input
                            type="text"
                            name="work_schedule"
                            value="{{ old('work_schedule') }}"
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
                            <option value="CLT">CLT</option>
                            <option value="PJ">PJ</option>
                            <option value="INTERNSHIP">Estágio</option>
                            <option value="FREELANCE">Freelancer</option>
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
                            value="{{ old('salary') }}"
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
                        >{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Requisitos
                        </label>

                        <textarea
                            name="requirements"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        >{{ old('requirements') }}</textarea>
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
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                        >
                            Publicar Vaga
                        </button>
                    </div>

                </div>
            </form>

        </div>

    </div>

</x-app-layout>