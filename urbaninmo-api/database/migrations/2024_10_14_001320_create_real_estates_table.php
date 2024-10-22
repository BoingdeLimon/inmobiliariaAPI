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
        Schema::create('real_estate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('size'); // Metros cuadrados
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('type'); // Casa, depa, bodega
            $table->boolean('has_garage')->default(false);
            $table->boolean('has_garden')->default(false);
            $table->boolean('has_patio')->default(false);
            $table->foreignId('id_address')->constrained('address')->onDelete('cascade');
            $table->decimal('price', 10, 2); // Mensualidad de la renta
            $table->boolean('is_occupied')->default(false); // Ocupada: 1, No: 0
            $table->string('pdf')->nullable();
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_estate', function (Blueprint $table) {
            $table->dropForeign(['id_user']); 
        });
        
        Schema::dropIfExists('real_estate');
    }
};
