<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@asensopinoyph.online',
            'password' => Hash::make('password'),
            'image_path' => 'storage/images/users/2.jpg',
        ]);

        $this->call([
            MunicitiesSeeder::class,
            BarangayTudelaSeeder::class,
            AyudaSeeder::class,
            MemberSeeder::class,
            AyudaMemberSeeder::class,
        ]);
    }
}
