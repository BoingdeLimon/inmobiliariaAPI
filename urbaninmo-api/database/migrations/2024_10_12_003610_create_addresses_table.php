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
        if (!Schema::hasTable('address')) {

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('address', 254);
            $table->string('zipcode', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100);
            $table->decimal('x', 12, 8); // 10 dígitos en total, 8 después del punto decimal
            $table->decimal('y', 12, 8);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
