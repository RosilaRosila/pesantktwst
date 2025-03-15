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
            $table->unsignedBigInteger('pesantiketid')->after('metodeid')->required();
            $table->foreign('pesantiketid')->references('id')->on('pesantikets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            //
            $table->dropColumn('pesantiketid');
        });
    }
};
