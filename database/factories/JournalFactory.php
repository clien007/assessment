<?php

namespace Database\Factories;

use App\Models\Journal;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    protected $model = Journal::class;

    public function definition()
    {
        $store = Store::inRandomOrder()->first();
        $revenue = $this->faker->numberBetween(1000, 10000); // Example revenue

        // Calculate costs and profit based on revenue
        $food_cost = $revenue * $this->faker->randomFloat(2, 0.1, 0.5);
        $labor_cost = $revenue * $this->faker->randomFloat(2, 0.2, 0.6);
        $profit = $revenue - $food_cost - $labor_cost;

        return [
            'store_id' => $store->id,
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'revenue' => $revenue,
            'food_cost' => $food_cost,
            'labor_cost' => $labor_cost,
            'profit' => $profit,
        ];
    }
}
