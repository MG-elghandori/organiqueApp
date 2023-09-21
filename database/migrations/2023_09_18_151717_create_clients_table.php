<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('phone', 256);
            $table->string('produit', 256);
            $table->enum('typeDecompte', ['1mois', '3mois', '6mois', '1ans']);
            $table->float('prix');
            $table->enum("methodPay", ["CIH", "ORANGE", "TIJARI", "Autres"]);
            $table->date('date_fin')->default(Carbon::now()->addMonth());
       
            $table->timestamps();
        });
    }
    
    
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
