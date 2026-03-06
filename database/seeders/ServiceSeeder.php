<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electrician',
                'sub_services' => [
                    ['name' => 'Fan Installation', 'price' => 200, 'description' => 'Fast and secure fan installation.'],
                    ['name' => 'Switchboard Repair', 'price' => 150, 'description' => 'Fixing loose connections or broken switches.'],
                    ['name' => 'AC Cleaning', 'price' => 500, 'description' => 'Professional AC cleaning service.'],
                ]
            ],
            [
                'name' => 'Plumber',
                'sub_services' => [
                    ['name' => 'Tap Repair', 'price' => 100, 'description' => 'Fixing leaking or broken taps.'],
                    ['name' => 'Pipe Leakage', 'price' => 300, 'description' => 'Detecting and repairing pipe leaks.'],
                    ['name' => 'Toilet Cleaning', 'price' => 400, 'description' => 'Complete toilet sanitation and cleaning.'],
                ]
            ],
            [
                'name' => 'Carpenter',
                'sub_services' => [
                    ['name' => 'Furniture Repair', 'price' => 500, 'description' => 'Repairing old or broken wooden furniture.'],
                    ['name' => 'Door Fixing', 'price' => 250, 'description' => 'Fixing jammed or noisy doors.'],
                    ['name' => 'Cabinet Installation', 'price' => 1500, 'description' => 'Installing new kitchen or room cabinets.'],
                ]
            ],
        ];

        foreach ($categories as $catData) {
            $category = \App\Models\Category::create(['name' => $catData['name']]);
            foreach ($catData['sub_services'] as $subService) {
                $category->subServices()->create($subService);
            }
        }

        // Creating an Admin User
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'is_approved' => true,
        ]);
    }
}
