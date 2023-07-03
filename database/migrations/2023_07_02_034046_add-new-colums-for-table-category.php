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
            $table->string('name');
            $table->string('thumb');
            $table->string('created_by');
            $table->string('modified_by');
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
