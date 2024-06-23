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
        $revenue = $this->faker->numberBetween(1000, 10000); 
        $food_cost = $this->faker->numberBetween(200, 400);  
        $labor_cost = $this->faker->numberBetween(200, 400); 
        $profit = $revenue - ($food_cost + $labor_cost);   

        return [
            'store_id' => Store::factory(),
            'date' => $this->faker->dateTimeThisYear(),
            'revenue' => $revenue,
            'food_cost' => $food_cost,
            'labor_cost' => $labor_cost,
            'profit' => $profit,
        ];
    }
}
