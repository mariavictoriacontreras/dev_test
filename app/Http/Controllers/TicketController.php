<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\StatusTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
public function index()
    {
        $user = Auth::user();
        
        if ($user->role_id == 1) { 
            
            $tickets = Ticket::with(['user', 'status'])
                ->latest() 
                ->get();
            
            $viewTitle = 'Tickets';

        } else { 
            
            $tickets = $user->tickets()->with('status')
                ->latest()
                ->get();
            
            $viewTitle = 'My Tickets';
        }

        return view('tickets.index', compact('tickets', 'viewTitle'));
    }

    public function create()
    {
        $statuses = StatusTicket::all();
                
        return view('tickets.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tickettype' => 'required|integer', 
            'transport' => 'nullable|string',
            'import' => 'boolean',
            'export' => 'boolean',
            'country' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $ticket = Ticket::create(array_merge($validatedData, [
            'user_id' => auth()->id(), // Asigna el ticket al usuario autenticado
            'status_id' => 1,          // Asigna el estado inicial por defecto 
        ]));

        return redirect()->route('tickets.index')->with('success', 'Ticket created succesfully');
    }
    
    public function edit(Ticket $ticket)
    {
        $statuses = StatusTicket::all();
        
        $ticket->load('user'); 

        return view('tickets.edit', compact('ticket', 'statuses'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status_id' => 'required|exists:status_ticket,id',
            'comment' => 'nullable|string',
        ]);

        $ticket->update([
            'status_id' => $request->status_id,
            'comment' => $validatedData['comment']
        ]);
        
        if ($request->status_id == 3) { 
        }

        return redirect()->route('tickets.index')->with('success', 'Ticket #' . $ticket->idticket . ' actualizado y estado modificado.');
    }

    /**
     * Display the specified ticket details.
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();

        if ($user->role_id != 1 && $ticket->user_id !== $user->id) {
            abort(403, 'Acceso Denegado. No tienes permisos para ver este ticket.');
        }

        $ticket->load(['user', 'status']); 
        
        return view('tickets.show', compact('ticket', 'user'));
    }
}