<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket #{{ $ticket->idticket }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <h3 class="text-xl font-bold mb-4">Ticket: {{ $ticket->name }}</h3>
                <p class="mb-4">Created by: {{ $ticket->user->name }} on {{ $ticket->created_at->format('d/m/Y H:i') }}</p>

                <form method="POST" action="{{ route('tickets.update', $ticket) }}">
                    @csrf
                    @method('PUT') 

                    <div class="mt-4">
                        <x-input-label for="status_id" :value="__('Change status')" />
                        <select id="status_id" name="status_id" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->idStatusTicket }}" {{ $ticket->status_id == $status->idStatusTicket ? 'selected' : '' }}>
                                    {{ $status->description }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status_id')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="comment" :value="__('Comments')" />
                        <textarea id="comment" name="comment" rows="5" 
                        class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        {{ old('comment', $ticket->comment) }} 
                        </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                    </div>
                    
                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>