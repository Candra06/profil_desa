<?php

namespace Database\Factories;

use App\Models\Pelayanan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PelayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul_pelayanan' => $this->faker->text(255),
            'link_pelayanan' => $this->faker->text(255),
        ];
    }
}
