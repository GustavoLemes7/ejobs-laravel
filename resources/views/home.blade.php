<x-app-layout>

    <div class="min-h-screen bg-gray-100">

        <!-- HERO -->
        <div class="bg-blue-600 text-white py-20">
            <div class="max-w-5xl mx-auto text-center px-6">

                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Encontre seu próximo emprego
                </h1>

                <p class="text-lg text-blue-100 mb-8">
                    Milhares de vagas disponíveis para você
                </p>

                <!-- SEARCH -->
                <form method="GET" action="{{route('jobs.search')}}">
                    <div class="flex flex-col md:flex-row gap-3 justify-center">

                        <input
                            type="text"
                            name="search"
                            placeholder="Digite o título da vaga"
                            class="w-full md:w-2/3 px-4 py-3 rounded-xl text-gray-800"
                            required
                        >

                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 px-6 py-3 rounded-xl font-semibold"
                        >
                            Buscar
                        </button>

                    </div>
                </form>

            </div>
        </div>

        <!-- CATEGORIAS -->
        <div class="max-w-6xl mx-auto py-16 px-6">

            <h2 class="text-2xl font-bold text-center mb-10">
                Categorias Populares
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                @foreach($categories as $category)

                    <a href="{{route('jobs.category', ['category_id' => $category->id])}}"
                       class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 text-center">

                        <div class="text-blue-600 text-4xl mb-3">
                            <i class="{{ $category->icon }}"></i>
                        </div>

                        <h3 class="font-semibold text-lg">
                            {{ $category->name }}
                        </h3>

                        <p class="text-gray-500 text-sm mt-2">
                            {{ $category->jobs_count }} vagas disponíveis
                        </p>

                    </a>

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>