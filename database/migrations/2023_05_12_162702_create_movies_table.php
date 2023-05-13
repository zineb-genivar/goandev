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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_title');
            $table->text('overview');
            $table->string('original_language');
            $table->boolean('adult');
            $table->string('backdrop_path');
            $table->string('poster_path');
            $table->decimal('popularity');
            $table->date('release_date');
            $table->boolean('video');
            $table->decimal('vote_average');
            $table->integer('vote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
