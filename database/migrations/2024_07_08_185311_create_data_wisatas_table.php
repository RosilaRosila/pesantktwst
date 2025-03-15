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
        Schema::create('data_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('deskripsi');
            $table->text('readmore');
            $table->text('fasilitas')->nullable();
            $table->text('imgheader');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_wisatas');
    }
};
