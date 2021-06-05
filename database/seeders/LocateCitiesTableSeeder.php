<?php

namespace Database\Seeders;

use App\Models\LocateCities;
use Illuminate\Database\Seeder;

class LocateCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LocateCities::factory()
        ->count(10)
        ->create();
    }
}
