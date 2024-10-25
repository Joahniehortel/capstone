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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_title');
            $table->string('complaint_image')->nullable(); 
            $table->string('date_occured'); 
            $table->string('hour_occured')->nullable();
            $table->string('complaint_address');
            $table->string('complaint_detail');
            $table->string('complaint_additional_message')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('complaint_status')->default('Pending');
            $table->timestamps();
        });
        
    }  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
