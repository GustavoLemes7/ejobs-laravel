<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-4xl mx-auto px-6">

            <div class="bg-white shadow-xl rounded-3xl overflow-hidden">

                <!-- HEADER -->
                <div class="bg-blue-600 px-8 py-6">

                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        Cadastro de Candidato
                    </h2>

                    <p class="text-blue-100 mt-1">
                        Complete suas informações para continuar
                    </p>

                </div>

                <!-- FORM -->
                <div class="p-8">

                    <form method="POST"
                          action="{{ route('onboarding.candidate.store') }}"
                          class="space-y-6">

                        @csrf

                        <!-- NOME -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nome Completo
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('full_name')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- CPF -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                CPF
                            </label>

                            <input
                                type="text"
                                id="cpf"
                                name="cpf"
                                value="{{ old('cpf') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('cpf')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- DATA NASCIMENTO -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Data de Nascimento
                            </label>

                            <input
                                type="date"
                                name="birth_date"
                                value="{{ old('birth_date') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >

                            @error('birth_date')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- BOTÕES -->
                        <div class="flex justify-between pt-4">

                            <a href="{{ route('dashboard') }}"
                               class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">

                                Voltar

                            </a>

                            <button
                                type="submit"
                                class="px-6 py-3 rounded-xl bg-green-500 hover:bg-green-600 text-white font-semibold transition"
                            >

                                Salvar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- INPUT MASK -->
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/inputmask.min.js"></script>

    <script>
        Inputmask("999.999.999-99").mask("#cpf");
    </script>

</x-app-layout>