<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'start_time' => fake()->time(),
        //     'end_time' => fake()->time(),
        //     'day_id' => rand(1 , 7),
        //     'doctor_id' => rand(1 , 5),
        // ];
    }
}
