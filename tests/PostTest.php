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
        $post_body = 'Testing the post creation.';
        $user = factory(App\User::class)->create();
        $post = new \App\Post();
        $post->body = $post_body;
        $post->has_image = false;
        $user->posts()->save($post);

        $this->seeInDatabase('posts',['body' => $post_body]);
    }

    /** @test */
    public function testCreateAndDelete(){
        $post_body = 'Testing the post creation.';
        $user = factory(App\User::class)->create();
        $post = new \App\Post();
        $post->body = $post_body;
        $post->has_image = false;
        $user->posts()->save($post);

        //$this->seeInDatabase('posts',['body' => $post_body]);
        $post_url = '/post-delete/' . $post->id;
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login');
        $this->visit($post_url);
        $this->notSeeInDatabase('posts',['body' => $post_body]);
    }
}
