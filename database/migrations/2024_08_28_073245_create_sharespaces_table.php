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
        Schema::create('sharespaces', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing unsigned big integer id column
            $table->foreignId('sharespace_user_id')->constrained('users')->onDelete('cascade');
            $table->string('sharespace_user_title');
            $table->string('sharespace_user_price');
            $table->string('sharespace_user_address');
            $table->string('sharespace_user_location');
            $table->text('sharespace_user_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sharespaces');
    }
};
