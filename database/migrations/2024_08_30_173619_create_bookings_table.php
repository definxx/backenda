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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('sharespace_id')->constrained()->onDelete('cascade');
            $table->string('booker_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('number_of_guests');
            $table->text('special_requests')->nullable();
            $table->string('status')->default('processing'); // Default status is processing
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
