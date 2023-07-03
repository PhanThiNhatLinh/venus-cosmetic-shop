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
        Schema::create('Product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('stock');
            $table->bigInteger('code')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumb');
            $table->date('expiry_date');
            $table->integer('id_country');
            $table->integer('id_brand');
            $table->integer('id_category');
            $table->string('status')->default('active');
            $table->string('display')->default('no');
            $table->string('created_by');
            $table->string('modified_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};
