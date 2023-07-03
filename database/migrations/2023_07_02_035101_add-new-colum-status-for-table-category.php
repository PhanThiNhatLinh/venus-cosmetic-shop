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
        Schema::table('Category', function (Blueprint $table) {
            $table->string('status')->default('active')->after('thumb');
            $table->string('display')->default('no')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Category', function (Blueprint $table) {
            //
        });
    }
};
