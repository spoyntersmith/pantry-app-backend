<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createUser()
    {
        $user = factory(User::class)->create();
        $name = $user->name;

        $user->save();

        $storedUser = User::where('email', $user->email)->first();

        $this->assertEquals($user->email, $storedUser->email);
        print 'user can be created';
    
    }
}
