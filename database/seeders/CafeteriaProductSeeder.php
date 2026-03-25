<?php

namespace Database\Seeders;

use App\Models\CafeteriaProduct;
use Illuminate\Database\Seeder;

class CafeteriaProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Agua 500ml',         'category' => 'Bebidas',      'sale_price' => 75.00,   'cost_price' => 30.00,  'stock' => 100, 'min_stock' => 20],
            ['name' => 'Proteína Whey 1lb',  'category' => 'Suplementos',  'sale_price' => 1800.00, 'cost_price' => 1100.00,'stock' => 30,  'min_stock' => 5],
            ['name' => 'Creatina 300g',      'category' => 'Suplementos',  'sale_price' => 1400.00, 'cost_price' => 850.00, 'stock' => 20,  'min_stock' => 5],
            ['name' => 'Bebida Energética',  'category' => 'Bebidas',      'sale_price' => 180.00,  'cost_price' => 90.00,  'stock' => 50,  'min_stock' => 10],
            ['name' => 'Barra de Proteína',  'category' => 'Snacks',       'sale_price' => 200.00,  'cost_price' => 100.00, 'stock' => 40,  'min_stock' => 10],
            ['name' => 'BCAA 250g',          'category' => 'Suplementos',  'sale_price' => 1100.00, 'cost_price' => 650.00, 'stock' => 15,  'min_stock' => 3],
        ];

        foreach ($products as $product) {
            CafeteriaProduct::firstOrCreate(
                ['name' => $product['name']],
                array_merge($product, ['is_active' => true])
            );
        }
    }
}
