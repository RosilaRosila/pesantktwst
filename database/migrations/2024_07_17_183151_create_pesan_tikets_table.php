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
        Schema::create('pesan_tikets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->text('name');
            $table->text('country');
            $table->text('address');
            $table->string('qty');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_tikets');

        // $table->dropForeign(['id_datawisata']);

    }
};
