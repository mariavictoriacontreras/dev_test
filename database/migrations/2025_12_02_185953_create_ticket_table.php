<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('ticket', function (Blueprint $table) {
        $table->id('idticket');
        
        // Campos 
        $table->string('name');
        $table->integer('tickettype'); 
        $table->string('transport')->nullable();
        
        $table->boolean('import')->default(false); 
        $table->boolean('export')->default(false);
        
        $table->string('country');
        $table->text('comment')->nullable();
        
        
        // Relación con status_ticket
        $table->foreignId('status_id')
              ->constrained('status_ticket', 'idStatusTicket') 
              ->onDelete('restrict'); 

        // Relación con users 
        $table->foreignId('user_id') 
              ->constrained('users') 
              ->onDelete('cascade'); 
              
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
