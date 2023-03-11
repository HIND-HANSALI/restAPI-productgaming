<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "titreProduit" => fake()->name(),
            "description" => fake()->name(),
            "contenu" => fake()->name(),
            "prix"=> fake()->numberBetween(1, 3),
            "categorie_id" => fake()->numberBetween(1, 3),
            
            "user_id" => fake()->numberBetween(1, 3),
        ];
    }
}
