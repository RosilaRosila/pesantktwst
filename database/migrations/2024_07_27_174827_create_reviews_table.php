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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengunjungid');
            $table->text('email');
            $table->text('review');
            $table->unsignedTinyInteger('rating'); // Rating antara 1 dan 5
            $table->string('status');
            $table->timestamps();

            // Foreign keys
            $table->foreign('pengunjungid')->references('id')->on('pengunjungs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
