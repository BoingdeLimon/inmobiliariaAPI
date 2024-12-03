<?php

use App\Models\RealEstate;
use App\Models\User;
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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_real_estate')->constrained('real_estate')->onDelete('cascade');
            $table->date('rent_start');
            $table->date('rent_end')->nullable();
            $table->text('reason_end')->nullable();
            $table->timestampTz('created_at')->useCurrent();
        });
    }
  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
