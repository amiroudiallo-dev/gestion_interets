<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Premier Registre > Enregistrer une Offre') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-4">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('first_registers.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-4 md:grid-cols-6">

                    <!-- Date de dépôt -->
                    <div>
                        <x-input-label for="date_heure" :value="__('Date de dépôt')" />
                        <x-datetime-input id="date_heure" name="date_heure" required />
                        <x-input-error :messages="$errors->get('date_heure')" class="mt-2" />
                    </div>

                    <!-- Dénomination -->
                    <div>
                        <x-input-label for="soumissionnaire" :value="__('Soumissionnaire')" />
                        <x-text-input id="soumissionnaire" name="soumissionnaire" type="text" class="mt-1" required />
                        <x-input-error :messages="$errors->get('soumissionnaire')" class="mt-2" />
                    </div>

                    <!-- Numéro IFU -->
                    <div>
                        <x-input-label for="numero_envelop" :value="__('Numéro Enveloppe')" />
                        <x-text-input id="numero_envelop" name="numero_envelop" type="text" class="mt-1" required />
                        <x-input-error :messages="$errors->get('numero_envelop')" class="mt-2" />
                    </div>

                    <!-- Numéro RCCM -->
                    <div>
                        <x-input-label for="tel" :value="__('Téléphone')" />
                        <x-text-input id="tel" name="tel" type="text" class="mt-1 block" required />
                        <x-input-error :messages="$errors->get('tel')" class="mt-2" />
                    </div>

                    <!-- Nature de l'activité -->
                    <div>
                        <x-input-label for="domain_id" :value="__('Domaine')" />
                        <select
                            name="domain_id"
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-gray-300 rounded pl-3 pr-8 py-4 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer">
                            <option value=""> </option>
                            @foreach ($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('domain_id')" class="mt-2" />
                    </div>
                    <!-- Informations de contact -->
                    <div>
                        <x-input-label for="observation_id" :value="__('Observation')" />
                        <select
                            name="observation_id"
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-gray-300 rounded pl-3 pr-8 py-4 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer">
                            <option value=""> </option>
                            @foreach ($observations as $observation)
                                <option value="{{ $observation->id }}">{{ $observation->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('observation_id')" class="mt-2" />
                    </div>

                </div>

                <!-- Boutons -->
                <div class="flex gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                    <div class="flex-1 mr-4">
                        <a href="{{ route('first_registers.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
