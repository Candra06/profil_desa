<?php

namespace Database\Factories;

use App\Models\Dusun;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DusunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dusun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dusun' => $this->faker->text(255),
            'kepala_dusun' => $this->faker->text(255),
            'deskripsi' => $this->faker->text,
        ];
    }
}
