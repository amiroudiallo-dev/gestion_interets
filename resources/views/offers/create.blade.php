<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Créer une Offre') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('offers.store') }}" class="space-y-6">
                @csrf

                <!-- Dénomination -->
                <div>
                    <x-input-label for="denomination" :value="__('Dénomination')" />
                    <x-text-input id="denomination" name="denomination" type="text" class="mt-1" required />
                    <x-input-error :messages="$errors->get('denomination')" class="mt-2" />
                </div>

                <!-- Numéro IFU -->
                <div>
                    <x-input-label for="ifu_number" :value="__('Numéro IFU')" />
                    <x-text-input id="ifu_number" name="ifu_number" type="text" class="mt-1" required />
                    <x-input-error :messages="$errors->get('ifu_number')" class="mt-2" />
                </div>

                <!-- Numéro RCCM -->
                <div>
                    <x-input-label for="rccm_number" :value="__('Numéro RCCM')" />
                    <x-text-input id="rccm_number" name="rccm_number" type="text" class="mt-1 block" required />
                    <x-input-error :messages="$errors->get('rccm_number')" class="mt-2" />
                </div>

                <!-- Nature de l'activité -->
                <div>
                    <x-input-label for="nature_of_activity" :value="__('Nature activité')" />
                    <x-text-input id="nature_of_activity" name="nature_of_activity" type="text" class="mt-1 block" required />
                    <x-input-error :messages="$errors->get('nature_of_activity')" class="mt-2" />
                </div>

                <!-- Informations de contact -->
                <div>
                    <x-input-label for="contact_info" :value="__('Informations de contact')" />
                    <x-text-input id="contact_info" name="contact_info" type="text" class="mt-1 block" required />
                    <x-input-error :messages="$errors->get('contact_info')" class="mt-2" />
                </div>

                <!-- Date de dépôt -->
                <div>
                    <x-input-label for="deposit_date" :value="__('Date de dépôt')" />
                    <x-text-input id="deposit_date" name="deposit_date" type="date" class="mt-1 block" required />
                    <x-input-error :messages="$errors->get('deposit_date')" class="mt-2" />
                </div>

                <!-- Numéro d'enveloppe -->
                <div>
                    <x-input-label for="envelope_number" :value="__('Numéro enveloppe')" />
                    <x-text-input id="envelope_number" name="envelope_number" type="number" class="mt-1 block" required />
                    <x-input-error :messages="$errors->get('envelope_number')" class="mt-2" />
                </div>

                <!-- Boutons -->
                <div class="flex justify-between">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

                    <a href="{{ route('offers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">
                        {{ __('Annuler') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
