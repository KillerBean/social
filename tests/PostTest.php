<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostCreate()
    {
        $post = \App\Post::create([
            'body' => 'Testing the post creation.'
        ]);

        $this->seeInDatabase('posts',['body' => 'Testing the post creation.']);
    }

    public function testCreateAndDelete(){
        $post = \App\Post::create([
            'body' => 'Testing the post creation.'
        ]);

        $this->visit('/post-delete/' . $post->id);
        $this->notSeeInDatabase('posts',['body' => 'Testing the post creation.']);
    }
}
