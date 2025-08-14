<?php

namespace Database\Factories;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'sobrenome' => $this->faker->lastName,
            'data_de_nascimento' => $this->faker->date,
            'salario' => $this->faker->numerify,
            'cargo_id' => Cargo::factory()->create()
        ];
    }
}
