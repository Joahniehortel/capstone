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
        Schema::create('blotters', function(Blueprint $table){
            $table->id('bloter_id'); 
            $table->string('incidentLocation');
            $table->string('incidentDate');
            $table->string('incidentType');
            $table->string('otherIncident')->nullable();
            $table->string('subjectOfComplaint');
            $table->string('description');
            $table->foreignId('user_id')
                  ->constrained('users') 
                  ->onDelete('cascade'); 
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotters');
    }
};
