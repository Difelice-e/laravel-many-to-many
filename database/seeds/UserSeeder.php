<?php

use Illuminate\Database\Seeder;
use App\User;
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
        // admin user 
        User::create([
            'name' => 'emanuele',
            'email' => 'difelice.emanuele@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
