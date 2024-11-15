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
            $table->string('waste_type');
            $table->string('conversion_method');
            $table->string('metrics');
            $table->string('total_converted');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('status')->default('Pending');
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
