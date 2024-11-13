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
        Schema::create('residents_concerns', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_type');
            $table->string('fullname');
            $table->string('contact_num');
            $table->string('brgy_location');
            $table->string('complaint_details');
            $table->string('dateOfIncident');
            $table->json('attachments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents_concerns');
    }
};
