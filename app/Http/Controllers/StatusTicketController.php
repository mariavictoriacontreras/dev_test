<?php

namespace App\Http\Controllers;

use App\Models\StatusTicket; // Importa tu Modelo
use Illuminate\Http\Request;

class StatusTicketController extends Controller
{
    public function index()
    {
        $statusTickets = StatusTicket::all();
        return view('statusTickets.index', compact('statusTickets'));
    }

    public function create()
    {
        return view('statusTickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|unique:status_ticket,description|max:255', 
        ]);

        StatusTicket::create($request->all());

        return redirect()->route('status-tickets.index')->with('success', 'Estado de Ticket creado.');
    }

    public function edit(StatusTicket $statusTicket)
    {
        return view('statusTickets.edit', compact('statusTicket'));
    }

    public function update(Request $request, StatusTicket $statusTicket)
    {
        $request->validate([
            'description' => 'required|string|unique:statusTickets,description,' . $statusTicket->id . '|max:255',
        ]);

        $statusTicket->update($request->all());

        return redirect()->route('statusTickets.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy(StatusTicket $statusTicket)
    {
        $statusTicket->delete();

        return redirect()->route('statusTickets.index')->with('success', 'Rol eliminado.');
    }
}