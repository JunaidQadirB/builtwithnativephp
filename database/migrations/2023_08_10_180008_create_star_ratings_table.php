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
        Schema::create('star_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ratable_id');
            $table->string('ratable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('star_ratings');
    }
};
