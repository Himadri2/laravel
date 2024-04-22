<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb=2 ,$asText=true );
        $slug = Str::slug($product_name);
        $image_name = $this->faker->unique()->numberBetween(1,19).'.png';
        return [
            'name' => Str::title($product_name),
            'slug' =>$slug,
            "short_description" => $this->faker->text(200),
            "description" => $this->faker->text(500),
            "regular_price" => $this->faker->numberBetween(1,22),
            "SKU" => 'SMD'.$this->faker->numberBetween(100,500),
            "quantity" => $this->faker->numberBetween(100,200),
            'best_seller' => $this->faker->numberBetween(0,1),
            'featured' => $this->faker->numberBetween(0,1),
            'stock_status' =>$this->faker->randomElement(['instock', 'outofstock']),
            'image' =>$image_name,
            'images' =>$image_name,
            "category_id" => $this->faker->numberBetween(1,6),
            "brand_id" => $this->faker->numberBetween(1,6),
        ];
    }
}
