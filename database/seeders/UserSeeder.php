<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'مجد محمد',
            'email' => 'Admin@gmail.com',
            'birth_date' => '1977-10-07',
            'phone_number' => '0789456123',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'مجد محمد',
            'email' => 'OfficeAdmin@gmail.com',
            'birth_date' => '1977-10-07',
            'phone_number' => '0789456123',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'مجد محمد',
            'email' => 'Worker@gmail.com',
            'birth_date' => '1977-10-07',
            'phone_number' => '0789456123',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'مجد محمد',
            'email' => 'User@gmail.com',
            'birth_date' => '1977-10-07',
            'phone_number' => '0789456123',
            'password' => Hash::make('123456789'),
        ]);


        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'user_type'=>'App\\Models\\User',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'user_type'=>'App\\Models\\User',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
            'user_type'=>'App\\Models\\User',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 4,
            'user_type'=>'App\\Models\\User',
        ]);
    }
}
