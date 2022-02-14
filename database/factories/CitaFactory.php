<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-1 week', '+2 week'),
            'hora' => $this->faker->numberBetween(9,20),
            'observaciones' => $this->faker->text(150),
            'user_id' => $this->faker->numberBetween(1,3),
            'servicio_id' => $this->faker->numberBetween(1,8)
        ];
    }
}
