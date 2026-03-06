<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ServiceSeeder; // Added this line
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents; // Commented out or removed as per instruction/code edit

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DataMigrationSeeder::class);
    }
}
