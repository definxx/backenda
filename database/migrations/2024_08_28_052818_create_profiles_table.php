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
        Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->string('profile_user_id');
                $table->string('profile_user_pic');
                $table->string('profile_user_state');
                $table->string('profile_user_town');
                $table->string('profile_user_postal_code');
                $table->string('profile_user_country');
                $table->string('profile_user_date_of_birth');
                $table->string('profile_user_address');
                $table->string('profile_user_bio');
                $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
