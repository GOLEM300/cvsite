<?php

namespace Database\Seeders;

use App\Models\Cv;
use Illuminate\Database\Seeder;

class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cv::factory()
            ->count(10)
            ->create();
    }
}
