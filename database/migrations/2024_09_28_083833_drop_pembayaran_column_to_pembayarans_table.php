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
            $table->dropForeign(['metodeid']); // Drop the foreign key
            $table->dropColumn('metodeid');    // Drop the column
            $table->dropForeign(['pesantiketid']);
            $table->dropColumn('pesantiketid');
            $table->dropColumn('imagepembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            //
        });
    }
};
