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
        schema::create("videos", function (Blueprint $table) {
            $table->id(); // Equivalent to $table->increments('id');
            $table->string('title', 70);
            $table->string('description', 1000);
            $table->string('file_path', 250);
            $table->boolean('is_movie');
            $table->timestamp('upload_date')->useCurrent();
            $table->date('release_date');
            $table->integer('views')->default(0);
            $table->string('duration', 10);
            $table->integer('season')->default(0);
            $table->integer('episode')->default(0);
            $table->integer('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("videos");
    }
};
