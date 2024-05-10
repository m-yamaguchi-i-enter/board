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
            //$table->string('summary');  //カラム追加
            $table->string('user_id', 32)->unique();
            $table->string('user_name', 32);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropColumn('summary');  //カラムの削除
            $table->dropColumn(['user_id', 'user_name']);
        });
    }
};
