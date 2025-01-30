<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deuxième Registre') }}
        </h2>
    </x-slot>

    <section class="bg-gray-100 py-4">
        <div class="container mx-auto px-4">

            <!-- Table des offres -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-auto w-full text-left divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-2 py-2 border">Nº ordre</th>
                            <th class="px-2 py-2 border">Date et Heure de dépôt</th>
                            <th class="px-2 py-2 border">Domaine</th>
                            <th class="px-2 py-2 border">Objet</th>
                            <th class="px-2 py-2 border">Observation</th>
                            <th class="px-0 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($offresRecevables as $offer)
                            <tr class="hover:bg-gray-100">
                                <!-- Nº ordre -->
                                <td class="px-2 py-2 border">{{ $offer->id }}</td>

                                <!-- Date de dépôt -->
                                <td class="px-2 py-2 border">
                                    {{ \Carbon\Carbon::parse($offer->date_heure)->format('d-m-Y H:i') }}
                                </td>
                                <td class="px-2 py-2 border">
                                    {{ $offer->domain->name }}
                                </td>
                                <!-- Objet -->
                                <td class="px-4 py-2 border">
                                    {{ $offer->objet ?? 'Non défini' }}
                                </td>

                                <!-- Observation -->
                                <td class="px-2 py-2 border">
                                    {{ $offer->observation->name ?? 'Non spécifiée' }}
                                </td>

                                <!-- Actions -->
                                <td class="px-4 py-2 border">
                                    <div class="flex ...">
                                        <!-- Edit Icon -->
                                        <a href="{{ route('second_registers.edit', $offer->id) }}" class="flex-1">
                                            <i class="fa-solid fa-right-to-bracket"></i>
                                        </a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('second_registers.destroy', $offer->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button @click="open = true">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center px-4 py-2 border">
                                    Aucune offre disponible.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $offresRecevables->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
