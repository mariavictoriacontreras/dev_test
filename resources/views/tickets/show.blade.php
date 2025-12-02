<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket #{{ $ticket->idticket }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-xl sm:rounded-lg">
                
                <h3 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-2">{{ $ticket->name }}</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Created by:</p>
                        <p class="mt-1 text-lg text-gray-900">{{ $ticket->user->name }}</p>

                        <p class="text-sm font-medium text-gray-500 mt-4">Creation Date:</p>
                        <p class="mt-1 text-gray-900">{{ $ticket->created_at->format('d/m/Y H:i') }}</p>

                        <p class="text-sm font-medium text-gray-500 mt-4">Updated:</p>
                        <p class="mt-1 text-gray-900">{{ $ticket->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Type:</p>
                        <p class="mt-1 text-lg text-gray-900">{{ $ticket->tickettype == 1 ? '1' : ($ticket->tickettype == 2 ? '2' : '3') }}</p>

                        <p class="text-sm font-medium text-gray-500 mt-4">Country:</p>
                        <p class="mt-1 text-gray-900">{{ $ticket->country }}</p>

                        <p class="text-sm font-medium text-gray-500 mt-4">To:</p>
                        <p class="mt-1 text-gray-900">{{ ($ticket->import ? 'Import' : '') . ($ticket->import && $ticket->export ? ' y ' : '') . ($ticket->export ? 'Export' : '') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Current Status:</p>
                        <span class="px-3 py-1 text-md font-semibold rounded-full 
                            @if($ticket->status->idStatusTicket == 1) bg-yellow-100 text-yellow-800
                            @elseif($ticket->status->idStatusTicket == 2) bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800
                            @endif
                        ">
                            {{ $ticket->status->description }}
                        </span>

                        <p class="text-sm font-medium text-gray-500 mt-4">Transport:</p>
                        <p class="mt-1 text-gray-900">{{ $ticket->transport ?? '-' }}</p>
                    </div>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-lg font-bold text-gray-700">Comments:</p>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg whitespace-pre-wrap text-gray-800 border border-gray-200 shadow-inner">
                        {{ $ticket->comment ?? '-' }}
                    </div>
                </div>


                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('tickets.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">← Back</a>
                    
                    @if ($user->role_id == 1)
                        <a href="{{ route('tickets.edit', $ticket) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>