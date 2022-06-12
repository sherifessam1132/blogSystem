<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $post=Post::factory(20);
        $response = $this->get('/posts');

        $response->assertSee($post->body);

        $response=$this->get('/posts/' . $post->id);
        $response->assertSee($post->title);
    }
}
