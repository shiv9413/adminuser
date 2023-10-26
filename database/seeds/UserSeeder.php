<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'gagandeep@yopmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Gagan Deep";
            $user->email = "gagandeep@yopmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
