<?php

namespace Database\Factories;

use App\Models\RakModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=RakModel::class;
    public function definition()
    {
        // $faker = faker::create();
        return [
            'name'=>$this->faker->word(),
            'code'=>$this->faker->regexify('[A-Z]{5}[0-9]{3}')
        ];
    }
}
