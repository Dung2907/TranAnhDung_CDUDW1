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
        Schema::create('tad_banner', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000);
            $table->integer('sort_order')->default(1);
            $table->text('position');
            $table->text('description')->nullable();
            $table->dateTime('created_at');
            $table->unsignedInteger('created_by');
            $table->dateTime('updated_at')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
             $table->unsignedTinyInteger('status')->default(2);
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
