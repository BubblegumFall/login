<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\SiswaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void 
    {
        $this->call([ SiswaSeeder::class, ]);
    }
}