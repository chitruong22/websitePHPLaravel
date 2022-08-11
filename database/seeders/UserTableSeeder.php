<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    public function run()
    {
       DB::table('users')->insert([
        'first_name'=>'chi',
        'last_name'=>'truong',
        'name'=>'hanzo',
        'phone'=>'02135856',
        'address'=>'hanoi',
        'avatar'=>'avatar.png',
        'username'=>'chitruong',
        'email'=>'admin3@gmail.com',
        'password'=>Hash::make('123456'),
        'role'=>1

       ]);
    }
}
