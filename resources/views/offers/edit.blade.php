<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Offre') }}
        </h2>
    </x-slot>


    <div class="container mx-auto py-4">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('offers.update', $offer->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="denomination" :value="__('Dénomination')" />
                        <x-text-input class="mt-1"
                            id="denomination"
                            name="denomination"
                            type="text"
                            value="{{ old('denomination', $offer->denomination) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('denomination')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="denomination" :value="__('Numéro IFU')" />
                        <x-text-input class="mt-1"
                            id="ifu_number"
                            name="ifu_number"
                            type="text"
                            value="{{ old('ifu_number', $offer->ifu_number) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('ifu_number')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="rccm_number" :value="__('Numéro RCCM')" />
                        <x-text-input class="mt-1"
                            id="rccm_number"
                            name="rccm_number"
                            type="text"
                            value="{{ old('rccm_number', $offer->rccm_number) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('rccm_number')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nature_of_activity" :value="__('Domaine')" />
                        <x-text-input class="mt-1"
                            id="nature_of_activity"
                            name="nature_of_activity"
                            type="text"
                            value="{{ old('nature_of_activity', $offer->nature_of_activity) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('nature_of_activity')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="contact_info" :value="__('Nº Tel')" />
                        <x-text-input class="mt-1"
                            id="contact_info"
                            name="contact_info"
                            type="text"
                            value="{{ old('contact_info', $offer->contact_info) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('contact_info')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="deposit_date" :value="__('Date de dépôt')" />
                        <x-text-input class="mt-1"
                            id="deposit_date"
                            name="deposit_date"
                            type="date"
                            value="{{ old('deposit_date', $offer->deposit_date ? $offer->deposit_date->format('Y-m-d') : '') }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('deposit_date')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="envelope_number" :value="__('Numéro enveloppe')" />
                        <x-text-input class="mt-1"
                            id="envelope_number"
                            name="envelope_number"
                            type="number"
                            value="{{ old('envelope_number', $offer->envelope_number) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('envelope_number')" class="mt-2" />
                    </div>
                </div>

                <div class="flex gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                    <div class="flex-1 mr-4">
                        <a href="{{ route('offers.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
