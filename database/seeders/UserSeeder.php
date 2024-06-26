<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => 'admin',
                'username'=>'Admin',
                'email'=>'adminpmb@gmail.com',
                'password'=>Hash::make('adminpmb'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'role' => 'user',
                'username'=>'Missyolin',
                'email'=>'missyolin36@gmail.com',
                'password'=>Hash::make('olin'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
