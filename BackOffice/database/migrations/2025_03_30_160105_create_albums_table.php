<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /**
         * Run the migrations.
         */
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->string('artist');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        /**
         * Reverse the migrations.
         */
        Schema::dropIfExists('albums');
    }
};
