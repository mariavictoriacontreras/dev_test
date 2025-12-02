<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Ticket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('tickets.store') }}">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Ticket Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tickettype" :value="__('Type')" />
                        <select id="tickettype" name="tickettype" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="">Select</option>
                            <option value="1" {{ old('tickettype') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('tickettype') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('tickettype') == 3 ? 'selected' : '' }}>3</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('tickettype')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="transport" :value="__('Mode of transport (air, land, sea)')" />
                        <x-text-input id="transport" name="transport" type="text" class="mt-1 block w-full" :value="old('transport')" />
                        <x-input-error class="mt-2" :messages="$errors->get('transport')" />
                    </div>

                    <div class="mt-4 flex space-x-6">
                        <label for="import" class="flex items-center">
                            <input id="import" name="import" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('import') ? 'checked' : '' }}>
                            <span class="ms-2 text-sm text-gray-600">{{ __('Import') }}</span>
                        </label>
                        
                        <label for="export" class="flex items-center">
                            <input id="export" name="export" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('export') ? 'checked' : '' }}>
                            <span class="ms-2 text-sm text-gray-600">{{ __('Export') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="country" :value="__('Country of origin/destination')" />
                        <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="comment" :value="__('Comentarios / Descripción del Requerimiento')" />
                        <textarea id="comment" name="comment" rows="4" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('comment') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Send Ticket') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>