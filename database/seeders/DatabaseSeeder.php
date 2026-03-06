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
        // User::factory(10)->create();

        // User::factory()->create([ // Commented out this block as per instruction
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ServiceSeeder::class); // Added this line as per instruction
    }
}
