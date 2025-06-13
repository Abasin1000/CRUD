<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
            ['name' => 'Kleding'],
            ['name' => 'Schoenen'],
            ['name' => 'Accessoires'],
        ]);
    }
}
