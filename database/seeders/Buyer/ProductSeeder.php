<?php

namespace Database\Seeders\Buyer;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'twix',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of twix',
            'category_id' => 7,
            'store_id' => 2,
          

        ]);

        Product::create([
            'name' => 'kinder',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 7.5,
            'description' => 'description of kinder',
            'category_id' => 7,
            'store_id' => 2,
            
        ]);
        Product::create([
            'name' => 'Ferrero rocher',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 16.5,
            'description' => 'description of Ferrero rocher',
            'category_id' => 7,
            'store_id' => 2
        ]);
        Product::create([
            'name' => 'merci',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 30,
            'price' => 12.5,
            'description' => 'description of merci',
            'category_id' => 7,
            'store_id' => 2
        ]);

        Product::create([
            'name' => 'lindt',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 15.0,
            'description' => 'description of lindt',
            'category_id' => 7,
            'store_id' => 2
        ]);




        //chips


        Product::create([
            'name' => 'Layz',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of layz',
            'category_id' => 8,
            'store_id' => 2
        ]);

        Product::create([
            'name' => 'sitos',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 9.5,
            'description' => 'description of sitos',
            'category_id' => 8,
            'store_id' => 2
        ]);
        Product::create([
            'name' => 'Master',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 11.0,
            'description' => 'description of master',
            'category_id' => 8,
            'store_id' => 2
        ]);





        //drinks

        Product::create([
            'name' => 'laziza',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of laziza',
            'category_id' => 9,
            'store_id' => 2
        ]);

        Product::create([
            'name' => 'Red Bull',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Red Bull',
            'category_id' => 9,
            'store_id' => 2
        ]);
        Product::create([
            'name' => 'CoCa Cola',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of CoCa Cola',
            'category_id' => 9,
            'store_id' => 2
        ]);



        Product::create([
            'name' => 'Fanta',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of fanta',
            'category_id' => 9,
            'store_id' => 2
        ]);
        Product::create([
            'name' => '7UP',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of 7UP',
            'category_id' => 9,
            'store_id' => 2
        ]);





        //skin care


        Product::create([
            'name' => 'Makeup removers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Makeup removers',
            'category_id' => 1,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Cleansers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Cleansers',
            'category_id' => 1,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Toners',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Toners',
            'category_id' => 1,
            'store_id' => 1
        ]);



        Product::create([
            'name' => 'Moisturizers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Moisturizers',
            'category_id' => 1,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Serums',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of Serums',
            'category_id' => 1,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Masks',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 25.5,
            'description' => 'description of Masks',
            'category_id' => 1,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Sunscreen',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 12.0,
            'description' => 'description of Sunscreen',
            'category_id' => 1,
            'store_id' => 1
        ]);

        //face makeup

        Product::create([
            'name' => 'Foundation',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Foundation',
            'category_id' => 2,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Concealer',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Concealer',
            'category_id' => 2,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Powder',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Powder',
            'category_id' => 2,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Blush',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Blush',
            'category_id' => 2,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Bronzer',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of Bronzer',
            'category_id' => 2,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Highlighter',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 25.5,
            'description' => 'description of Highlighter',
            'category_id' => 2,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Primer',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 12.0,
            'description' => 'description of Primer',
            'category_id' => 2,
            'store_id' => 1
        ]);


        //eye makeup
        Product::create([
            'name' => 'Eyeshadow',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Eyeshadow',
            'category_id' => 3,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Eyeliner',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Eyeliner',
            'category_id' => 3,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Mascara',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Mascara',
            'category_id' => 3,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'False eyelashes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of False eyelashes',
            'category_id' => 3,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Eye primer',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of Eye primer',
            'category_id' => 3,
            'store_id' => 1
        ]);



        //Accessories

        Product::create([
            'name' => 'Makeup brushes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Makeup brushes',
            'category_id' => 4,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Eyelash curlers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Eyelash curlers',
            'category_id' => 4,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Makeup sponges and blenders',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Makeup sponges and blenders',
            'category_id' => 4,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Makeup organizers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Makeup organizers',
            'category_id' => 4,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Mirrors',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of Mirrors',
            'category_id' => 4,
            'store_id' => 1
        ]);


        //nails products

        Product::create([
            'name' => 'Nail polish',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Nail polish',
            'category_id' => 5,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Nail care',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Nail care (base coats, top coats)',
            'category_id' => 5,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Nail art accessories',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Nail art accessories (stickers, decals)',
            'category_id' => 5,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Nail tools ',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Nail tools ',
            'category_id' => 5,
            'store_id' => 1
        ]);




        // lip makeup


        Product::create([
            'name' => 'Lipstick',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Lipstick',
            'category_id' => 6,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Lip gloss',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Lip gloss',
            'category_id' => 6,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Lip liner',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Lip liner',
            'category_id' => 6,
            'store_id' => 1
        ]);

        Product::create([
            'name' => 'Lip balm',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Lip balm',
            'category_id' => 6,
            'store_id' => 1
        ]);
        Product::create([
            'name' => 'Lip stain',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 25,
            'price' => 2.0,
            'description' => 'description of Lip stain',
            'category_id' => 6,
            'store_id' => 1
        ]);












        //shoes store


        // shoes accessories

        Product::create([
            'name' => 'Shoe care products',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Shoe care products (cleaning kits, polish, shoe trees)',
            'category_id' => 7,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'Insoles and inserts',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 15,
            'price' => 5.5,
            'description' => 'description of Insoles and inserts (for comfort and support)',
            'category_id' => 10,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'Shoe laces and accessories',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 5,
            'price' => 3.0,
            'description' => 'description of Shoe laces and accessories (laces, buckles)',
            'category_id' => 10,
            'store_id' => 3
        ]);


        //athletic shoes



        Product::create([
            'name' => 'Hiking shoes and boots',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Hiking shoes and boots',
            'category_id' => 11,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'Running shoes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Running shoes',
            'category_id' => 11,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'Training shoes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Training shoes',
            'category_id' => 11,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'Basketball shoes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Basketball shoes',
            'category_id' => 11,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'Soccer cleats',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Soccer cleats',
            'category_id' => 11,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'Tennis shoes',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Tennis shoes',
            'category_id' => 11,
            'store_id' => 3
        ]);



        //Mens shoes



        Product::create([
            'name' => 'sneakers',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of sneakers',
            'category_id' => 12,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'Sandals',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Sandals',
            'category_id' => 12,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'work boots',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of  work boots',
            'category_id' => 12,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'brogues',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of brogues',
            'category_id' => 12,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'chelsea boots',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of  work boots',
            'category_id' => 12,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'derbies',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of derbies',
            'category_id' => 12,
            'store_id' => 3
        ]);



        //Womens shoes

        Product::create([
            'name' => 'ballet flats',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of ballet flats',
            'category_id' => 13,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'stilettos',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of stilettos',
            'category_id' => 13,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'knee-high boots',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of knee-high boots',
            'category_id' => 13,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'ankle boots',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of ankle boots',
            'category_id' => 13,
            'store_id' => 3
        ]);

        Product::create([
            'name' => 'strappy sandals',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of  strappy sandals',
            'category_id' => 13,
            'store_id' => 3
        ]);
        Product::create([
            'name' => 'Sandals wedges',
            'image' => 'storage/myImages/image1.jpg',
            'quantity' => 10,
            'price' => 4.5,
            'description' => 'description of Sandals wedges',
            'category_id' => 13,
            'store_id' => 3,
        ]);
    }
}
