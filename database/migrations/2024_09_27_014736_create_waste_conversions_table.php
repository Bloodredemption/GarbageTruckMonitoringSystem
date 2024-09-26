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
        Schema::create('waste_conversions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('waste_comp_id');
            $table->string('conversion_method');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('isDeleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_conversions');
    }
};
