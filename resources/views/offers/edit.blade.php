<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'offre') }}
        </h2>
    </x-slot>


    <div class="relative flex flex-col rounded-xl bg-transparent">

        <form action="{{ route('offers.update', $offer->id) }}" method="POST" class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
            @csrf
            @method('PUT')
            <div class="mb-1 flex flex-col gap-6">
                <label for="denomination" class="block text-sm font-medium text-gray-700">Dénomination</label>
                <input
                    type="text"
                    id="denomination"
                    name="denomination"
                    value="{{ old('denomination', $offer->denomination) }}"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
                <label for="denomination" class="block text-sm font-medium text-gray-700">Numéro IFU</label>
                <input
                    type="text"
                    id="ifu_number"
                    name="ifu_number"
                    value="{{ old('ifu_number', $offer->ifu_number) }}"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

          <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
          <a href="{{ route('offers.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded ml-2">Annuler</a>
        </form>
    </div>
</x-app-layout>
