<?php

namespace Database\Factories;

use App\Models\Raod;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class RaodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Raod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => $this->faker->randomDigit,
          'serial' => $this->faker->numberBetween($min = 1000, $max = 9000),
          'office' => $this->faker->randomElement($array = array ('Planning','Finance','ORED','Legal'), $count = 1),
          'allotclass' => $this->faker->randomElement($array = array ('MOOE','PS','CO'), $count = 1),
          'pap' => $this->faker->randomElement($array = array ('General Management and Supervision','Data Management Including Systems','Legal Services','Human Resource Development','Forest Development, Rehabilitation', 'Administration of Personnel Benefits'), $count = 1),
          'activity' => $this->faker->randomElement($array = array ('Fixed','Cashier','Property'), $count = 1),
          'uacscode' => $this->faker->randomElement($array = array ('50100000-00','50101000-00','50101010-00', '50101010-01'), $count = 1),
          'name' => $this->faker->name,
          'particular' => $this->faker->sentence,
          'obligation' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 20000),
          'disbursement' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 20000),
          'date' => $this->faker->dateTimeBetween('now', '+1 year')
        ];
    }
}
