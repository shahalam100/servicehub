<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\SubService;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DataMigrationSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks to truncate and re-insert with specific IDs
        DB::statement('SET CONSTRAINTS ALL DEFERRED');
        
        // Clear existing data to avoid duplicates, but keep it safe
        // On Render/Postgres, we might just want to insert if not exists or truncate
        DB::table('bookings')->truncate();
        DB::table('provider_sub_service')->truncate();
        DB::table('sub_services')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();

        // 1. Users
        $users = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_approved' => true,
            ],
            [
                'id' => 2,
                'name' => 'Shah',
                'email' => 'shah889@yopmail.com',
                'password' => Hash::make('shah889@100'),
                'role' => 'customer',
                'phone' => '79865432125',
                'is_approved' => true,
                'address' => '8B Mohali',
            ],
            [
                'id' => 3,
                'name' => 'Codex',
                'email' => 'codex@gmail.com',
                'password' => Hash::make('codex@100'),
                'role' => 'provider',
                'phone' => '6547981325',
                'is_approved' => true,
                'address' => '8B Mohali',
            ],
            [
                'id' => 4,
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'provider',
                'phone' => '6549782315',
                'is_approved' => true,
                'address' => '8B Mohali',
            ],
            [
                'id' => 5,
                'name' => 'jack Albuny',
                'email' => 'jack@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'phone' => '1326458795',
                'is_approved' => true,
                'address' => 'Test4',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // 2. Categories
        $categories = [
            ['id' => 1, 'name' => 'Electrician'],
            ['id' => 2, 'name' => 'Plumber'],
            ['id' => 3, 'name' => 'Carpenter'],
            ['id' => 4, 'name' => 'Painter'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 3. Sub Services
        $subServices = [
            ['id' => 1, 'category_id' => 1, 'name' => 'Fan Installation', 'description' => 'Fast and secure fan installation.', 'price' => 200.00],
            ['id' => 2, 'category_id' => 1, 'name' => 'Switchboard Repair', 'description' => 'Fixing loose connections or broken switches.', 'price' => 150.00],
            ['id' => 3, 'category_id' => 1, 'name' => 'AC Cleaning', 'description' => 'Professional AC cleaning service.', 'price' => 500.00],
            ['id' => 4, 'category_id' => 2, 'name' => 'Tap Repair', 'description' => 'Fixing leaking or broken taps.', 'price' => 100.00],
            ['id' => 5, 'category_id' => 2, 'name' => 'Pipe Leakage', 'description' => 'Detecting and repairing pipe leaks.', 'price' => 300.00],
            ['id' => 6, 'category_id' => 2, 'name' => 'Toilet Cleaning', 'description' => 'Complete toilet sanitation and cleaning.', 'price' => 400.00],
            ['id' => 7, 'category_id' => 3, 'name' => 'Furniture Repair', 'description' => 'Repairing old or broken wooden furniture.', 'price' => 500.00],
            ['id' => 8, 'category_id' => 3, 'name' => 'Door Fixing', 'description' => 'Fixing jammed or noisy doors.', 'price' => 250.00],
            ['id' => 9, 'category_id' => 3, 'name' => 'Cabinet Installation', 'description' => 'Installing new kitchen or room cabinets.', 'price' => 1500.00],
            ['id' => 10, 'category_id' => 4, 'name' => 'Portrait Painters', 'description' => 'Focus on human subjects and faces.', 'price' => 1000.00],
            ['id' => 11, 'category_id' => 4, 'name' => 'Restoration Painters', 'description' => 'Specialize in restoring old paintings', 'price' => 800.00],
        ];

        foreach ($subServices as $ss) {
            SubService::create($ss);
        }

        // 4. Provider Sub Services (Pivot Table)
        $providerServices = [
            ['user_id' => 3, 'sub_service_id' => 1],
            ['user_id' => 3, 'sub_service_id' => 2],
            ['user_id' => 3, 'sub_service_id' => 3],
            ['user_id' => 3, 'sub_service_id' => 10],
            ['user_id' => 3, 'sub_service_id' => 11],
            ['user_id' => 4, 'sub_service_id' => 6],
            ['user_id' => 4, 'sub_service_id' => 9],
        ];

        foreach ($providerServices as $ps) {
            DB::table('provider_sub_service')->insert($ps);
        }

        // 5. Bookings
        $bookings = [
            [
                'id' => 1,
                'customer_id' => 2,
                'provider_id' => 3,
                'sub_service_id' => 1,
                'address' => '8B Mohali',
                'booking_date' => '2026-03-06',
                'booking_time' => '14:20:00',
                'status' => 'completed',
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'provider_id' => null,
                'sub_service_id' => 11,
                'address' => '8B Mohali',
                'booking_date' => '2026-03-05',
                'booking_time' => '17:00:00',
                'status' => 'rejected',
            ],
            [
                'id' => 3,
                'customer_id' => 2,
                'provider_id' => 3,
                'sub_service_id' => 10,
                'address' => '8B Mohali',
                'booking_date' => '2026-03-05',
                'booking_time' => '18:46:00',
                'status' => 'completed',
            ],
            [
                'id' => 4,
                'customer_id' => 5,
                'provider_id' => 4,
                'sub_service_id' => 6,
                'address' => 'Test4',
                'booking_date' => '2026-03-06',
                'booking_time' => '16:07:00',
                'status' => 'completed',
            ],
            [
                'id' => 5,
                'customer_id' => 5,
                'provider_id' => 4,
                'sub_service_id' => 9,
                'address' => 'Mohali',
                'booking_date' => '2026-03-20',
                'booking_time' => '16:00:00',
                'status' => 'accepted',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
