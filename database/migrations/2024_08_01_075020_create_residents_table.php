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
            $table->string('ice_fullname');
            $table->string('ice_address');
            $table->string('ice_relationship');
            $table->string('ice_contactNumber');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->date('birthDate');
            $table->integer('age');
            $table->string('birthPlace');
            $table->string('gender');
            $table->string('address');
            $table->string('purokNumber');
            $table->integer('totalHousehold');
            $table->string('voter');
            $table->string('maritalStatus');
            $table->string('nationality');
            $table->string('religion')->nullable();
            $table->string('pwd');
            $table->string('ethnicity')->nullable();
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
