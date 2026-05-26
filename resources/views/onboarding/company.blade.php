<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-5xl mx-auto px-6">

            <div class="bg-white shadow-xl rounded-3xl overflow-hidden">

                <!-- HEADER -->
                <div class="bg-blue-600 px-8 py-6">

                    <h2 class="text-2xl font-bold text-white">
                        Cadastro de Empresa
                    </h2>

                    <p class="text-blue-100 mt-1">
                        Complete as informações da sua empresa
                    </p>

                </div>

                <!-- FORM -->
                <div class="p-8">

                    <form method="POST"
                          action="{{ route('onboarding.company.store') }}"
                          class="space-y-8">

                        @csrf

                        <!-- DADOS DA EMPRESA -->
                        <div>

                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                Dados da Empresa
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- NOME FANTASIA -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nome Fantasia
                                    </label>

                                    <input
                                        type="text"
                                        name="trade_name"
                                        value="{{ old('trade_name') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >

                                    @error('trade_name')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- RAZÃO SOCIAL -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Razão Social
                                    </label>

                                    <input
                                        type="text"
                                        name="legal_name"
                                        value="{{ old('legal_name') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >

                                    @error('legal_name')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- CNPJ -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        CNPJ
                                    </label>

                                    <input
                                        type="text"
                                        id="cnpj"
                                        name="cnpj"
                                        value="{{ old('cnpj') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >

                                    @error('cnpj')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- INSCRIÇÃO -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Inscrição Estadual
                                    </label>

                                    <input
                                        type="text"
                                        name="state_registration"
                                        value="{{ old('state_registration') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    >

                                </div>

                                <!-- DATA ABERTURA -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Data de Abertura
                                    </label>

                                    <input
                                        type="date"
                                        name="founded_at"
                                        value="{{ old('founded_at') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    >

                                </div>

                                <!-- FUNCIONÁRIOS -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Número de Funcionários
                                    </label>

                                    <input
                                        type="number"
                                        name="employee_count"
                                        value="{{ old('employee_count') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- CONTATO -->
                        <div>

                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                Contato
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- EMAIL -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="contact_email"
                                        value="{{ old('contact_email') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >

                                    @error('contact_email')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- TELEFONE -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Telefone
                                    </label>

                                    <input
                                        type="text"
                                        id="phone"
                                        name="contact_phone"
                                        value="{{ old('contact_phone') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    >

                                </div>

                                <!-- SITE -->
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Site
                                    </label>

                                    <input
                                        type="url"
                                        name="website_url"
                                        value="{{ old('website_url') }}"
                                        placeholder="https://"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- SOBRE -->
                        <div>

                            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                Sobre a Empresa
                            </h3>

                            <textarea
                                name="description"
                                rows="5"
                                placeholder="Descreva sua empresa..."
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('description') }}</textarea>

                        </div>

                        <!-- BOTÕES -->
                        <div class="flex justify-between pt-6">

                            <a href="{{ route('dashboard') }}"
                               class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">

                                Voltar

                            </a>

                            <button
                                type="submit"
                                class="px-6 py-3 rounded-xl bg-green-500 hover:bg-green-600 text-white font-semibold transition"
                            >

                                Salvar Empresa

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
        Inputmask("99.999.999/9999-99").mask("#cnpj");
        Inputmask("(99) 99999-9999").mask("#phone");
    </script>

</x-app-layout>