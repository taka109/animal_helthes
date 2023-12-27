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
        Schema::create('publices', function (Blueprint $table) {
            $table->id();
            $table->int('users_id');
            $table->varchar('title');
            $table->mediumblob('image');
            $table->text('body');
            $table->varchar('name');
            $table->int('animals_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->tinyint('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publices');
    }
};
