@php
        use App\Enums\UserType;
@endphp
<x-app-layout>
    
    <div class="min-h-screen flex items-center justify-center bg-gray-100">

        <div class="w-full max-w-4xl px-6">

            <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">
                Como você quer usar o E-Jobs?
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- CANDIDATO -->
                <div class="bg-white rounded-2xl shadow-md p-8 text-center">

                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="w-14 h-14 text-blue-600">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-semibold mb-2">
                        Candidato
                    </h3>

                    <p class="text-gray-600 mb-6">
                        Quero encontrar um emprego
                    </p>

                    <form method="POST" action="{{ route('onboarding.tipo.store') }}">
                        @csrf

                        <input
                            type="hidden"
                            name="user_type"
                            value="{{ UserType::CANDIDATE->value }}"
                        >

                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition"
                        >
                            Sou Candidato
                        </button>
                    </form>

                </div>

                <!-- EMPRESA -->
                <div class="bg-white rounded-2xl shadow-md p-8 text-center">

                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="w-14 h-14 text-green-600">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v16.5H3.75V3.75A.75.75 0 014.5 3zm3 3h3v3h-3V6zm0 6h3v3h-3v-3zm6-6h3v3h-3V6zm0 6h3v3h-3v-3z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-semibold mb-2">
                        Empresa
                    </h3>

                    <p class="text-gray-600 mb-6">
                        Quero contratar pessoas
                    </p>

                    <form method="POST" action="{{ route('onboarding.tipo.store') }}">
                        @csrf

                       

                        <input
                            type="hidden"
                            name="user_type"
                            value="{{ UserType::COMPANY->value }}"
                        >

                        <button
                            type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition"
                        >
                            Sou Empresa
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>