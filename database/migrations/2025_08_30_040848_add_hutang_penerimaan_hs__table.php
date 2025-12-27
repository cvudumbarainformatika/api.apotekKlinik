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
        Schema::table('penerimaan_hs', function (Blueprint $table) {
            $table->string('hutang')->default('')->after('flag');
            $table->date('tgl_jatuh_tempo')->nullable()->after('hutang');
            $table->decimal('diskon', 20)->default(0)->after('tgl_jatuh_tempo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('penerimaan_hs', 'hutang')) {
            Schema::table('penerimaan_hs', function (Blueprint $table) {
                $table->dropColumn('hutang');
            });
        }
        if (Schema::hasColumn('penerimaan_hs', 'tgl_jatuh_tempo')) {
            Schema::table('penerimaan_hs', function (Blueprint $table) {
                $table->dropColumn('tgl_jatuh_tempo');
            });
        }
        if (Schema::hasColumn('penerimaan_hs', 'diskon')) {
            Schema::table('penerimaan_hs', function (Blueprint $table) {
                $table->dropColumn('diskon');
            });
        }
    }
};
