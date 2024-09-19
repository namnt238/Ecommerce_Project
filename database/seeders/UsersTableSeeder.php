<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            array(
                'name' => 'Namdev23',
                'email' => 'namdev@mail.com',
                'password' => Hash::make('Namdev'),
                'role' => 'admin',
                'status' => 'active'
            ),
            array(
                'name' => 'Customer 1',
                'email' => 'customer1@mail.com',
                'password' => Hash::make('customer'),
                'role' => 'user',
                'status' => 'active'
            ),
        );

        foreach ($data as $user) {
            // Kiểm tra xem email đã tồn tại chưa
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
}
}
