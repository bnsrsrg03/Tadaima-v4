<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Japanese Kare Ramen',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
                'bestseller' => true,
            ],
            [
                'name' => 'Chicken Katsu Dry Ramen',
                'price' => 28000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Japanese Tori Paitan Ramen',
                'price' => 32000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Kare Dry Ramen',
                'price' => 30000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Black Pepper Beef Rice Bowl',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Karage Dry Ramen',
                'price' => 30000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Doriyaki Rice',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Kampung Style Fried Rice',
                'price' => 35000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Seafood Fried Rice',
                'price' => 35000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Fresh Orange Juice',
                'price' => 18000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Manggo Milkshake',
                'price' => 23000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Peach Blossom',
                'price' => 24000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => true,
            ],
            [
                'name' => 'Affogato',
                'price' => 18000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Hot Ocha Tea',
                'price' => 12000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Iced Lychee Tea',
                'price' => 20000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => true,
            ],
            [
                'name' => 'Air mineral',
                'price' => 5000,
                'kategori_id' => 2,
                'image' => null,
                'bestseller' => false,
            ],
                             
                // Cemilan //
            [
                'name' => 'Fried Banana Choco Rice',
                'price' => 22000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => true,
            ],
            [
                'name' => 'Manggo Milkshake',
                'price' => 16000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Chicken Karage',
                'price' => 22000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Fried Mantao',
                'price' => 18000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Grill Banana Cheese',
                'price' => 20000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Broccoli Tempura',
                'price' => 16000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Onion Ring',
                'price' => 18000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Chicken Katsu',
                'price' => 24000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],
            [
                'name' => 'Chicken Nugget',
                'price' => 18000,
                'kategori_id' => 3,
                'image' => null,
                'bestseller' => false,
            ],

        
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
