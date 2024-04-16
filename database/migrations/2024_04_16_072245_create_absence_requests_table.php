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
        Schema::create('absence_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personId');
            $table->string('absencePatternCd');
            $table->string('absenceStatusCd');
            $table->bigInteger('absenceTypeId');
            $table->string('createdBy');
            $table->timestamp('creationDate');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_requests');
    }
};
