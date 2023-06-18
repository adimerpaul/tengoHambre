<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'admin@test.com',
                'nickname' => 'admin',
                'sucursal' => 'admin',
                'password' => bcrypt('admin123Admin')
            ],
            [
                'name' => 'Sucursal 1',
                'email' => 'sucursal1@gmail.com',
                'nickname' => 'sucursal1',
                'sucursal' => 'sucursal1',
                'password' => bcrypt('sucursal123Sucursal')
            ],
            [
                'name' => 'Sucursal 2',
                'email' => 'sucursal2@gmail.com',
                'nickname' => 'sucursal2',
                'sucursal' => 'sucursal2',
                'password' => bcrypt('sucursal123Sucursal')
            ],
        ]);
    }
}
