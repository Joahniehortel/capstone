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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('ice_fullname')->nullable();
            $table->string('ice_address')->nullable();
            $table->string('ice_relationship')->nullable();
            $table->string('ice_contactNumber')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->date('birthDate')->nullable();
            $table->integer('age')->nullable();
            $table->string('birthPlace')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('purokNumber')->nullable();
            $table->integer('totalHousehold')->nullable();
            $table->string('voter')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('pwd')->nullable();
            $table->string('indigenous')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('MonthlyIncome', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
