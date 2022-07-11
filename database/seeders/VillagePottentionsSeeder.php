<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillagePottentions;

class VillagePottentionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VillagePottentions::factory()
            ->count(5)
            ->create();
    }
}
