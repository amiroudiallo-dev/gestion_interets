<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des offres') }}
        </h2>
    </x-slot>

    <section class="bg-gray-100 py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('offers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Ajouter une offre
                </a>
            </div>

            <!-- Table des offres -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-auto w-full text-left divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Dénomination</th>
                            <th class="px-4 py-2 border">Numéro IFU</th>
                            <th class="px-4 py-2 border">Numéro RCCM</th>
                            <th class="px-4 py-2 border">Nature de l'activité</th>
                            <th class="px-4 py-2 border">Contact</th>
                            <th class="px-4 py-2 border">Date de dépôt</th>
                            <th class="px-4 py-2 border">Numéro enveloppe</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $offer->id }}</td>
                                <td class="px-4 py-2 border">{{ $offer->denomination }}</td>
                                <td class="px-4 py-2 border">{{ $offer->ifu_number }}</td>
                                <td class="px-4 py-2 border">{{ $offer->rccm_number }}</td>
                                <td class="px-4 py-2 border">{{ $offer->nature_of_activity }}</td>
                                <td class="px-4 py-2 border">{{ $offer->contact_info }}</td>
                                <td class="px-4 py-2 border">{{ $offer->deposit_date }}</td>
                                <td class="px-4 py-2 border">{{ $offer->envelope_number }}</td>
                                <td class="px-4 py-2 border">
                                    <div class="flex ...">
                                        <!-- Edit Icon -->
                                        <a href="{{ route('offers.edit', $offer->id) }}" class="flex-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">
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
                {{ $offers->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
