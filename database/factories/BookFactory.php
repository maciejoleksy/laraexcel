<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->sentence,
            'Category' => $this->faker->name,
            'Writer' => rand(1,20),
            'pages' => rand(50,1000),
            'hard_cover' => rand(0,1),
            'price' => rand(50,250),
        ];
    }
}
