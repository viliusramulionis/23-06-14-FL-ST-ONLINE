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
        Schema::table('songs', function (Blueprint $table) {
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null')
                    ->onUpdate('set null');

            $table->foreignId('playlist_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null')
                    ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropForeign('songs_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('songs_playlist_id_foreign');
            $table->dropColumn('playlist_id');
        });
    }
};
