<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BarangayTudelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the SQL file
        $sqlFile = database_path('seeders/barangay_tudela.sql');

        // Check if the file exists
        if (File::exists($sqlFile)) {
            // Read the file contents
            $sql = File::get($sqlFile);

            // Execute the SQL
            DB::unprepared($sql);

            $this->command->info('Barangay Tudela table seeded!');
        } else {
            $this->command->error('Barangay Tudela SQL file not found.');
        }
    }
}
