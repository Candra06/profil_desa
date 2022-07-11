<?php

namespace Database\Factories;

use App\Models\GaleriDusun;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriDusunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GaleriDusun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_foto' => $this->faker->text(255),
            'foto' => $this->faker->text(255),
            'dusun_id' => \App\Models\Dusun::factory(),
        ];
    }
}
