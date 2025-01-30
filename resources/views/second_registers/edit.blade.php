<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deuxième Registre > Validation') }}
        </h2>
    </x-slot>


    <div class="container mx-auto py-4">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('second_registers.update', $firstRegister) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="denomination" :value="__('Nº ordre')" />
                        <x-text-input class="mt-1" disabled
                            id="id"
                            name="id"
                            type="text"
                            value="{{ old('id', $firstRegister->id) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="date_heure" :value="__('Date et Heure de dépôt')" />
                        <x-datetime-input class="mt-1" disabled
                            id="date_heure"
                            name="date_heure"
                            value="{{ old('date_heure', $firstRegister->date_heure) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('date_heure')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="objet" :value="__('Objet')" />
                        <x-text-input class="mt-1"
                            id="objet"
                            name="objet"
                            type="text"
                            value="{{ old('objet', $firstRegister->objet) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('objet')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="observation" :value="__('Observation')" />
                        <x-text-input class="mt-1" disabled
                            id="observation"
                            name="observation"
                            type="text"
                            value="{{ old('observation', $firstRegister->observation->name) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('observation')" class="mt-2" />
                    </div>

                </div>

                <div class="flex gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                    <div class="flex-1 mr-4">
                        <a href="{{ route('second_registers.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
