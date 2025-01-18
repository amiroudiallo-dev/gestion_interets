<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Obersavtions') }}
        </h2>
    </x-slot>
    <section class="bg-gray-100 py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('observations.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Ajouter une observation
                </a>
            </div>

            <!-- Table des offres -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-auto w-full text-left divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-7 py-2 border">Numéro</th>
                            <th class="px-7 py-2 border">Libellé</th>
                            <th class="px-0 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($observations as $observation)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $observation->id }}</td>
                                <td class="px-4 py-2 border">{{ $observation->name }}</td>
                                <td class="px-4 py-2 border">
                                    <div class="flex">
                                        <!-- Edit Icon -->
                                        <a href="{{ route('observations.edit', $observation->id) }}" class="flex-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('observations.destroy', $observation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button @click="open = true">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $observations->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
