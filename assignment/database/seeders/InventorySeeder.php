<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Laptop Computer',
                'description' => 'High-performance laptop for students with 16GB RAM and 512GB SSD',
                'product_code' => 'LC-001',
                'price' => 899.99
            ],
            [
                'name' => 'Scientific Calculator',
                'description' => 'Advanced calculator with graphing capabilities for science and engineering students',
                'product_code' => 'SC-102',
                'price' => 69.99
            ],
            [
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling headphones with 30-hour battery life',
                'product_code' => 'WH-250',
                'price' => 129.99
            ],
            [
                'name' => 'Textbook Bundle',
                'description' => 'Essential textbooks for first-year computer science students',
                'product_code' => 'TB-456',
                'price' => 249.50
            ],
        ];

        foreach ($items as $item) {
            Inventory::create($item);
        }
    }
}