<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AyudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the SQL file
        $sqlFile = database_path('seeders/ayuda.sql');

        // Check if the file exists
        if (File::exists($sqlFile)) {
            // Read the file contents
            $sql = File::get($sqlFile);

            // Execute the SQL
            DB::unprepared($sql);

            $this->command->info('Ayuda table seeded!');
        } else {
            $this->command->error('Ayuda SQL file not found.');
        }
    }
}
