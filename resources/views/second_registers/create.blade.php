<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Deuxième Registre > Enregistrer une Offre Recevable') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-4">
        <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('second_registers.store') }}" class="space-y-6">
                @csrf

                <table class="w-full border-collapse border border-gray-300 text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Numéro d'Ordre</th>
                            <th class="border px-4 py-2">Soumissionnaire</th>
                            <th class="border px-4 py-2">Observation</th>
                            <th class="border px-4 py-2">Objet (Nom de la société)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offresRecevables as $offre)
                            <tr>
                                <!-- Affichage en lecture seule des champs existants -->
                                <td class="border px-4 py-2">
                                    <span>{{ $offre->id }}</span>
                                    <input type="hidden" name="offres[{{ $offre->id }}][id]" value="{{ $offre->id }}">
                                </td>
                                <td class="border px-4 py-2">
                                    <span>{{ $offre->soumissionnaire }}</span>
                                    <input type="hidden" name="soumissionnaire[{{ $offre->id }}][soumissionnaire]" value="{{ $offre->soumissionnaire }}">
                                </td>
                                <td class="border px-4 py-2">
                                    <span>{{ $offre->observation->name }}</span>
                                    <input type="hidden" name="offres[{{ $offre->id }}][observation]" value="{{ $offre->observation->name }}">
                                </td>
                                <!-- Champ modifiable pour l'objet -->
                                <td class="border px-4 py-2">
                                    <input
                                        type="text"
                                        name="offres[{{ $offre->id }}][objet]"
                                        class="w-full border border-gray-300 rounded px-2 py-1"
                                        placeholder="Entrez le nom de l'entreprise"
                                        required
                                    >
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-end mt-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
