<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('cover');
            $table->string('short_description', 100);
            $table->string('description', 3000);
            $table->string('slug')->unique();
            $table->unsignedBigInteger('publisher_id');
            $table->double('price')->default(0.00);
            $table->boolean('in_app_purchases')->default(false);
            $table->string('rating')->nullable();
            $table->string('status')->default('Draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }
};
