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
            $table->id('id_real_estate'); 
            $table->integer('id_user');
            $table->string('title', 100);
            $table->string('description', 254)->nullable();
            $table->float('size');
            $table->smallInteger('rooms');
            $table->smallInteger('bathrooms');
            $table->string('type', 100);
            $table->boolean('has_garage');
            $table->boolean('has_garden');
            $table->boolean('has_patio');
            //$table->foreign('id_address')->references('id')->on('address')->onUpdate('cascade')->onDelete('cascade');
            $table->string('price');
            $table->boolean('is_occupied');
            $table->string('pdf');   
            $table->timestamps();
            
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); 
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
