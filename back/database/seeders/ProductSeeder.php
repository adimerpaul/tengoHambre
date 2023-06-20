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
            ["name"=>"Pollo a la broaster","price"=>12,'imagen'=>"FB_IMG_1560613698117.jpg"],
            ["name"=>"Pollo al spiedo","price"=>12,'imagen'=>"ZKaMCqGgMCt4iwVMebZ9SwzJqLYx2qMQcKoJV8xa.jpg"],
            ["name"=>"Chuleta","price"=>15,'imagen'=>"chuletas-de-cerdo.jpg"],
            ["name"=>"Lomo ","price"=>12,'imagen'=>"lomo.jpg"],
            ["name"=>"Pique ","price"=>15,'imagen'=>"pique-macho-1_1944758934_760x520.jpg"],
            ["name"=>"Silpancho ","price"=>12,'imagen'=>"Silpancho_cochalo.jpg"],
            ["name"=>"Salchipapa ","price"=>10,'imagen'=>"hqdefault.jpg"],
            ["name"=>"Pipoca de pollo","price"=>16,'imagen'=>"pipoks.png"],
            ["name"=>"Mini","price"=> 2,'imagen'=>"6COCA-COLA-Mini-190.jpg"],
            ["name"=>"Cocacola Popular","price"=> 5,'imagen'=>"6COCA-COLA-Popular-600ml.jpg"],
            ["name"=>"Cocacola 2 litros ","price"=>10,'imagen'=>"01658-01.jpg"],
            ["name"=>"Cocacola 3 litros ","price"=>12,'imagen'=>"2803939.jpg"],
            ["name"=>"Porción de arroz","price"=> 5,'imagen'=>"porcion-de-arroz.jpg"],
            ["name"=>"Porción de papa","price"=> 2,'imagen'=>"la-porcion-saludable-de-papas-fritas-5042-mainImage-0.jpg"],
        ]);
    }
}
