<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','yousef@gmail.com')->first()) {
            $user = User::create([
                'name' => 'Yousef Admin',
                'email' => 'yousef@gmail.com',
                'mobile' => '777777777',
                'image' => '../dashboard/images/loge2.png',
                'password' => Hash::make("123456As"),
                'status' => 1, 
            ]);

            $user1 = User::create([
                'name' => 'khaled',
                'email' => 'khaled@gmail.com',
                'mobile' => '88888',
                'image' => '../dashboard/images/loge2.png',
                'password' => Hash::make("123456As"),
                'status' => 1,
            ]);

            $user->assignRole('Admin');
            $user1->assignRole('Rented');

        }
    }
}
