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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Tikrinimas ar lentelė egzistuoja
        if(!Schema::hasTable('users'))
            return;

        Schema::table('users', function (Blueprint $table) {
            //Tikrinas ar egzistuoja stulpelis
            if(Schema::hasColumn('users', 'is_admin')) {
                //Stulpelio ištrynimas
                $table->dropColumn('is_admin');
            }
        });
    }
};
