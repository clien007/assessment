<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $brands = [
            'Taco Bell' => [
                'primary' => '#702082',
                'secondary' => '#A77BCA',
                'text' => '#ffffff',
                'logo' => 'tb.png'
            ],
            'Kentucky Fried Chicken' => [
                'primary' => '#a6192e',
                'secondary' => '#000000',
                'text' => '#ffffff',
                'logo' => 'kfc.png'
            ],
            'Pizza Hut' => [
                'primary' => '#b42323',
                'secondary' => '#f1d0a2',
                'text' => '#ffffff',
                'logo' => 'ph.png'
            ],
        ];

        $brandName = $this->faker->unique()->randomElement(array_keys($brands));

        $color = implode(',', [
            $brands[$brandName]['primary'],
            $brands[$brandName]['secondary'],
            $brands[$brandName]['text'],
        ]);

        return [
            'name' => $brandName,
            'brand_number' => strtoupper($this->faker->bothify('##??')),
            'color' => $color,
            'logo' => $brands[$brandName]['logo'],
        ];
    }
}
