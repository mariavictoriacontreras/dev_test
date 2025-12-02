<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 text-center">
                    <a href="{{ route('tickets.index') }}" 
                       class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-lg shadow-lg text-white bg-indigo-600 hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out uppercase">
                        TICKETS
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>