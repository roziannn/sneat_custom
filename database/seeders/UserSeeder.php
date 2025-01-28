<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Superadmin',
                'email' => 'superadmin@dankosfarma.com',
                'role_id' => '1',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Administrator',
                'email' => 'administrator@dankosfarma.com',
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
