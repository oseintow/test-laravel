<?php

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
        $user = \App\User::where("email","oseintow@gmail.com")->first();
        if(! $user) {
            \App\User::create([
                'email'    => "oseintow@gmail.com",
                'password' => "1234"
            ]);
        }
    }
}
