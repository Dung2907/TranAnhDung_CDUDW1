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
        Schema::create('tad_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('oder_id');
            $table->unsignedInteger('product_id');
            $table->float('price');
            $table->unsignedInteger('qty');
            $table->float('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
