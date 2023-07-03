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
        Schema::table('Brand', function (Blueprint $table) {
            $table->string('status')->default('active')->after('description');
            $table->string('display')->default('no')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Brand', function (Blueprint $table) {
            //
        });
    }
};
