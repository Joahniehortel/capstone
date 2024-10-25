<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Complaint;
use App\Models\User;
use App\Models\Document;
use App\Models\Official;
use App\Models\Resident;
use App\Models\DocumentRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Complaint::factory(50)->create();
        Resident::factory(50)->create();
        DocumentRequest::factory()->count(50)->create();
        Document::factory(10)->create();
        User::factory(1)->create();
    }
}
