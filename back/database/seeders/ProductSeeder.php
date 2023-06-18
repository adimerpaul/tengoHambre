<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ["name"=>"Pollo a la broaster","price"=>12],
            ["name"=>"Pollo al spiedo","price"=>12],
            ["name"=>"Chuleta","price"=>15],
            ["name"=>"Lomo ","price"=>12],
            ["name"=>"Pique ","price"=>15],
            ["name"=>"Silpancho ","price"=>12],
            ["name"=>"Salchipapa ","price"=>10],
            ["name"=>"Pipoca de pollo ","price"=>16],
            ["name"=>"Mini","price"=> 2],
            ["name"=>"Cocacola Popular","price"=> 5],
            ["name"=>"Cocacola 2 litros ","price"=>10],
            ["name"=>"Cocacola 3 litros ","price"=>12],
            ["name"=>"Porción de arroz","price"=> 5],
            ["name"=>"Porción de papa","price"=> 2],
        ]);
    }
}
