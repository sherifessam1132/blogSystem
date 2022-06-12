<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Post::factory(50)->create();
        Reply::factory(50)->create();
    }
}
