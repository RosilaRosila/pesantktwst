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
        Schema::table('pembayarans', function (Blueprint $table) {
            //
            $table->text('name')->after('kode_transaksi');
            $table->text('wisatawan')->after('name');
            $table->text('tujuanwisata')->after('wisatawan');
            $table->string('qty');
            $table->date('tanggal');
            $table->enum('status', ['Unpaid', 'Paid'])->after('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('wisatawan');
            $table->dropColumn('tujuanwisata');
            $table->dropColumn('qty');
            $table->dropColumn('tanggal');
            $table->dropColumn('status');
        });
    }
};
