<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.sqlite.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Admin::factory(10)->create();

    }
}
