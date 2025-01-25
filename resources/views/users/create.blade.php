<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Utilisateurs') }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('users.store') }}" class="space-y-6" onsubmit="console.log('Form submitted!');">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Adresse Mail')" />
                        <x-text-input id="email" name="email" type="text" class="mt-1" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="passwd" :value="__('Mot de Passe')" />
                        <x-text-input id="passwd" name="passwd" type="password" class="mt-1" required />
                        <x-input-error :messages="$errors->get('passwd')" class="mt-2" />
                    </div>

                    <div class="w-full max-w-sm">
                        <x-input-label for="roles" :value="__('Rôles')" />
                        <div class="relative mt-1">
                            <select
                                name="roles"
                                id="roles"
                                class="block w-full appearance-none bg-white border border-gray-300 rounded-md py-2 px-3 pr-10 text-sm text-gray-900 shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                    </div>
                </div>
                <div class="flex gap-4">
                    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                    <div class="flex-1 mr-4">
                        <a href="{{ route('users.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
