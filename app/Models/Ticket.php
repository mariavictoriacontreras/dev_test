<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'idticket';

    protected $fillable = [
        'name', 
        'tickettype', 
        'transport', 
        'import', 
        'export', 
        'country', 
        'status_id', 
        'user_id', 
        'comment'
    ]; 
    
    protected $casts = [
        'import' => 'boolean',
        'export' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusTicket::class, 'status_id', 'idStatusTicket');
    }
}