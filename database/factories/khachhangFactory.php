<?php

namespace Database\Factories;

use App\Models\khachhang;
use Illuminate\Database\Eloquent\Factories\Factory;

class khachhangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = khachhang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotenkh'=> $this->faker->firstName,
            'diachikh'=>$this->faker->state,
            'email'=>$this->faker->freeEmail,
            'dienthoai'=>$this->faker->e164PhoneNumber,
            //'ngaylamkh'=>$this->dateTime(),
            'tendonvi'=>$this->faker->city,
            'masothuekh'=>$this->faker->randomNumber(5),
            'sotaikhoankh'=>$this->faker->randomNumber(9)
        ];
    }
}
