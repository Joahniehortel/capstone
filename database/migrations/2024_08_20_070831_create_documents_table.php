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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_details');
            $table->timestamps();
        });

        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_file_name')->nullable();
            $table->string('number_copies');
            $table->string('preferred_date')->nullable();
            $table->string('date_requested')->nullable();
            $table->string('request_purpose');
            $table->string('contact_no');
            $table->string('additional_message')->nullable();
            $table->string('request_status')->default('Pending');
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users', indexName: 'id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
        Schema::dropIfExists('document_requests');
    }
};
