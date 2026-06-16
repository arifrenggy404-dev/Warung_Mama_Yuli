<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Seed admin & (opsional) user dibuat oleh UserSeeder agar tidak duplikat
        $this->call([
            UserSeeder::class,
        ]);

    }
}
