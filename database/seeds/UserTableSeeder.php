<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory("App\User", 5)->create();
        User::create(
            [
                "name" => "Andres",
                "email" => "alvarezskinner@gmail.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "email_verified_at" => now()
            ]
        );
        User::create(
            [
                "name" => "Sean",
                "email" => "seanpoyntersmith@gmail.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "email_verified_at" => now()
            ]
        );
    }
}
