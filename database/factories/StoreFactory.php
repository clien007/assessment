<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        $brand = Brand::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        return [
            'brand_id' => $brand->id,
            'user_id' => $user->id,
            'store_number' => 'STORE-' . strtoupper($brand->name[0]) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'address' => $this->faker->address
        ];
    }
}

