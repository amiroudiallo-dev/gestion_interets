<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Domaine') }}
        </h2>
    </x-slot>


    <div class="container mx-auto py-4">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('domains.update', $domain->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="libelle" :value="__('Libellé')" />
                        <x-text-input class="mt-1"
                            id="libelle"
                            name="name"
                            type="text"
                            value="{{ old('name', $domain->name) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea-input class="mt-1"
                            id="description"
                            name="desc"
                            type="text"
                            value="{{ old('desc', $domain->desc) }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                    </div>
                </div>

                <div class="flex gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                    <div class="flex-1 mr-4">
                        <a href="{{ route('domains.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
