<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => substr($this->faker->name(), 0, 50), // corta para 50 caracteres
            "telefone" => $this->faker->numerify('###########'), // 11 números
            "email" => substr($this->faker->unique()->safeEmail(), 0, 50), // corta para 50 caracteres
            "motivo_contato" => $this->faker->numberBetween(1, 5),
            "mensagem" => substr($this->faker->text(200), 0, 100), // até 100 caracteres
        ];
    }
}
