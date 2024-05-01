<?php

namespace Database\Seeders\Buyer;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([

            'name' => 'skin care',
            'store_id' => 1
        ]);
        Category::create([

            'name' => 'face makeup',
            'store_id' => 1
        ]);
        Category::create([

            'name' => 'eye makeup',
            'store_id' => 1
        ]);

        Category::create([

            'name' => 'Accessories',
            'store_id' => 1
        ]);
        Category::create([

            'name' => 'nails products',
            'store_id' => 1
        ]);
        Category::create([

            'name' => 'lip makeup',
            'store_id' => 1
        ]);


        Category::create([

            'name' => 'Chocolate',
            'store_id' => 2
        ]);
        Category::create([

            'name' => 'Chips',
            'store_id' => 2
        ]);
        Category::create([

            'name' => 'Drinks',
            'store_id' => 2
        ]);


        Category::create([

            'name' => 'Shoe Accessories',
            'store_id' => 3
        ]);
        Category::create([

            'name' => 'Athletic Shoes',
            'store_id' => 3
        ]);
        Category::create([

            'name' => 'Mens Shoes',
            'store_id' => 3
        ]);
        Category::create([

            'name' => 'womens Shoes',
            'store_id' => 3
        ]);

        
    }
}
