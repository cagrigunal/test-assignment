<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Field::factory(10)->create();
         \App\Models\Subscriber::factory(10)->create();
         \App\Models\FieldValue::factory(10)->create();

    }
}
