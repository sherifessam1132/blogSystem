<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    protected $model=Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence;
        return [
            'user_id'=>User::factory(),
            'channel_id'=>Channel::factory(),
            'title'=>$title,
            'body'=>$this->faker->paragraph,
            'slug'=>Str::slug($title)
        ];
    }
}
