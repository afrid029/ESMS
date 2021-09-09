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
            'name' => 'Pavithra',//Str::random(10),
            'email' => 'pavithra@gmail.com',//Str::random(10).'@gmail.com',
            'gender' => 'F',
            'address' => 'Badulla',
            'mobile' => '0779255222',
            'role' => 'admin',
            'password' => Hash::make('Pavithra@123'),
            'remember_token' => Str::random(10),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
