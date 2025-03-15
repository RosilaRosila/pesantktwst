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
        Schema::table('pengunjung_auths', function (Blueprint $table) {
            //
            $table->text('phone')->nullable()->after('password');
            $table->text('country')->nullable()->after('phone');
            $table->text('address')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengunjung_auths', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('country');
            $table->dropColumn('address');
        });
    }
};
