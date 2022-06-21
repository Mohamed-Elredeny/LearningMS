<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'admin',
                'email'=>'admin@yoursite.com',
                'role_id'=>'1',
                'password'=> bcrypt('87654321'),
            ],
            [
                'name'=>'student',
                'email'=>'user@yoursite.com',
                'role_id'=>'0',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'teacher',
                'email'=>'guest@yoursite.com',
                'role_id'=>'2',
                'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
