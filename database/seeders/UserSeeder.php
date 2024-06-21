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
                'username'=>'Admin',
                'email'=>'adminpmb@gmail.com',
                'password'=>Hash::make('adminpmb'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
