<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    public function testCreateUser()
    {
        $user = \App\User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456)
        ]);

        $this->seeInDatabase('users', ['name' => 'Admin User','email' => 'admin@admin.com']);
    }

    public function testUserRegister(){
        $this->visit("/")
            ->see("Register")
            ->click("Register")
            ->type('Admin User', 'name')
            ->type('admin@admin.com', 'email')
            ->type('12345678', 'password')
            ->type('12345678', 'password_confirmation')
            ->press("Register");

        $this->seePageIs('/dashboard');

        $this->seeInDatabase('users', ['name' => 'Admin User']);
    }

}
