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
        Schema::create('waste_compositions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('brgy_id');
            $table->String('waste_type');
            $table->string('collection_date');
            $table->String('metrics');
            $table->integer('isDeleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_compositions');
    }
};
