<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    /** @test */
    public function createUser()
    {
        
        $data = [
            "name" => $this->faker->name,
            "email" => $this->faker->safeEmail,
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "email_verified_at" => now()
        ];
                
        $user = User::create($data);

        $storedUser = User::where('email', $data["email"])->first();

        $this->assertEquals($data["name"], $storedUser->name);
        
        $this->assertDatabaseHas('users', ['email' => $storedUser->email]);
        
        $this->assertEquals($data["email"], $storedUser->email);
        $this->assertEquals($data["password"], $storedUser->password);
        // TODO: check email_verified_at
        print 'user can be created';
    
    }
}
