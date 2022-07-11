<?php

namespace Database\Seeders;

use App\Models\GaleriDusun;
use Illuminate\Database\Seeder;

class GaleriDusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GaleriDusun::factory()
            ->count(5)
            ->create();
    }
}
