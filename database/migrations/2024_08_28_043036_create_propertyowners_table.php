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
        Schema::create('propertyowners', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('propertyowner_user_id'); // Foreign key to users
            $table->string('propertyowner_user_nin_no'); 
            $table->string('propertyowner_user_state'); 
            $table->string('propertyowner_user_address'); 
            $table->string('propertyowner_user_lga'); 
            $table->string('propertyowner_user_status')->default('processing'); // Default status is processing
            $table->string('propertyowner_user_nin_image');
            $table->string('propertyowner_user_profile_picture');
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertyowners');
    }
};
