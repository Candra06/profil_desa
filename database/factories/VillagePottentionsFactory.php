<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\VillagePottentions;
use Illuminate\Database\Eloquent\Factories\Factory;

class VillagePottentionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VillagePottentions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_potensi' => $this->faker->text(255),
            'gambar' => $this->faker->text(255),
        ];
    }
}
