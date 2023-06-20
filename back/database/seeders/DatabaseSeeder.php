<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
             ProductSeeder::class,
            // CategorySeeder::class,
            // OrderSeeder::class,
            // OrderProductSeeder::class,
        ]);
        $sql = storage_path('sql/clients_202306200624.sql');
        DB::unprepared(file_get_contents($sql));
        Client::factory(5)->create();
    }
}
