<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
