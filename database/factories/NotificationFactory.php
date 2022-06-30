<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'=>'App\Notifications\PostWasUpdated',
            'notifiable_type'=>'App\Models\User',
            'notifiable_id'=>auth()->user()?auth()->id():User::first(),
            'data'=>['foo'=>'bar'],
            'id'=>\Ramsey\Uuid\Nonstandard\Uuid::uuid4()->toString()
        ];
    }
}
