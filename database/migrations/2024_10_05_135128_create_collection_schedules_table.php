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
        Schema::create('collection_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('brgy_id');
            $table->integer('dumptruck_id');
            $table->string('scheduled_date');
            $table->string('scheduled_time');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_schedules');
    }
};
