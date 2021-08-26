<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'abcd',//Str::random(10),
            'email' => 'abc@gmail.com',//Str::random(10).'@gmail.com',
            'gender' => 'M',
            'address' => 'test',
            'mobile' => '123',
            'role' => 'admin',
            'password' => Hash::make('test123'),
            'remember_token' => Str::random(10),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
