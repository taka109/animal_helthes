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
        Schema::create('pets_helth', function (Blueprint $table) {
            $table->id();
            $table->int('users_id');
            $table->int('pets_id');
            $table->text('body');
            $table->date('date');
            $table->tinyint('eat');
            $table->tinyint('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_helth');
    }
};
