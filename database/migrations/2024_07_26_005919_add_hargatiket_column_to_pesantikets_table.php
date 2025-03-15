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
        Schema::table('pesantikets', function (Blueprint $table) {
            // 
            $table->string('hargatiket')->after('datatiketid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesantikets', function (Blueprint $table) {
            //
            $table->dropColumn('hargatiket');
        });
    }
};
