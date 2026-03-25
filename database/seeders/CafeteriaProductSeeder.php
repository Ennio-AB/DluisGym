<?php

namespace Database\Seeders;

use App\Models\CafeteriaProduct;
use Illuminate\Database\Seeder;

class CafeteriaProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Agua 500ml', 'category' => 'Bebidas', 'sale_price' => 1.50, 'cost_price' => 0.50, 'stock' => 100, 'min_stock' => 20],
            ['name' => 'Proteína Whey 1lb', 'category' => 'Suplementos', 'sale_price' => 35.00, 'cost_price' => 22.00, 'stock' => 30, 'min_stock' => 5],
            ['name' => 'Creatina 300g', 'category' => 'Suplementos', 'sale_price' => 28.00, 'cost_price' => 17.00, 'stock' => 20, 'min_stock' => 5],
            ['name' => 'Bebida Energética', 'category' => 'Bebidas', 'sale_price' => 3.50, 'cost_price' => 1.80, 'stock' => 50, 'min_stock' => 10],
            ['name' => 'Barra de Proteína', 'category' => 'Snacks', 'sale_price' => 4.00, 'cost_price' => 2.00, 'stock' => 40, 'min_stock' => 10],
            ['name' => 'BCAA 250g', 'category' => 'Suplementos', 'sale_price' => 22.00, 'cost_price' => 13.00, 'stock' => 15, 'min_stock' => 3],
        ];

        foreach ($products as $product) {
            CafeteriaProduct::firstOrCreate(
                ['name' => $product['name']],
                array_merge($product, ['is_active' => true])
            );
        }
    }
}
