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
        Schema::create('posts_resources', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('type')->default('photo');
            $table->foreignId('post_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('file');
        });

        Schema::dropIfExists('posts_resources');
    }
};
