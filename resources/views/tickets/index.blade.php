<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tickets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('tickets.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            New Ticket
                        </a>
                    </div>
                    
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Tickets</h3>

                    @forelse ($tickets as $ticket)
                    <div class="p-4 border-b border-gray-200 hover:bg-gray-50">
                        <div class="flex justify-between items-center mb-1">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-gray-500">#{{ $ticket->idticket }} - {{ $ticket->created_at->format('d/m/Y') }}</span>
                
                                <span class="px-2 py-1 text-xs font-semibold rounded 
                                    @if($ticket->status->idStatusTicket == 1) bg-yellow-100 text-yellow-800
                                    @elseif($ticket->status->idStatusTicket == 2) bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800
                                    @endif
                                    ">
                                    {{ $ticket->status->description }}
                                </span>
                            </div>
                            @auth
                            @if (auth()->user()->role_id == 1)
                            <a href="{{ route('tickets.edit', $ticket) }}" 
                                class="inline-flex items-center px-3 py-1 border border-transparent text-xs     font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500    transition ease-in-out duration-150">
                            Edit
                            </a>
                            @endif
                            @endauth

                            <a href="{{ route('tickets.show', $ticket) }}" 
                                class="inline-flex items-center px-3 py-1 border border-gray-300 text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                                Details
                            </a>
                        </div>
    
                        <a href="{{ route('tickets.show', $ticket) }}" class="text-lg font-bold text-indigo-600 hover:text-indigo-800">
                            {{ $ticket->name }}
                        </a>
                        {{-- Admin --}}
                        @if (auth()->user()->role_id == 1 && $ticket->user)
                        <p class="text-xs text-gray-500 mt-1">User: {{ $ticket->user->name }}</p>
                        @endif
        
                        <p class="text-sm text-gray-600 mt-1">Country: {{ $ticket->country }} | Type: {{ $ticket->tickettype }}</p>
                    </div>
                    @empty
                    <p class="text-gray-500">-</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>