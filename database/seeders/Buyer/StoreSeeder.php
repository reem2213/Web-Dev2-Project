<?php

namespace Database\Seeders\Buyer;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
        'image'=>'storage/images/makeup.jpeg',
        'name'=>'makeup',
        'address'=>'hadath',
        'description'=>'our store provide many products',
        'phoneNo'=>'01775622',
        'user_id'=>1


    ]);
    Store::create([
        'image'=>'storage/images/food.png',
        'name'=>'food',
        'address'=>'baabda',
        'description'=>'our store provide many food items',
        'phoneNo'=>'70449860',
        'user_id'=>2


    ]);

    Store::create([
        'image'=>'storage/images/shoes.png',
        'name'=>'Shoes',
        'address'=>'beirut',
        'description'=>'our store provide many shoes items',
        'phoneNo'=>'71996500',
        'user_id'=>2


    ]);
    
    Store::create([
        'image'=>'storage/images/books.jpg',
        'name'=>'Book stores',
        'address'=>'hadath',
        'description'=>'our store provide many books',
        'phoneNo'=>'01775622',
        'user_id'=>5


    ]);
    Store::create([
        'image'=>'storage/images/toys.jpg',
        'name'=>'Toy store',
        'address'=>'baabda',
        'description'=>'our store provide many type of toys ',
        'phoneNo'=>'70449860',
        'user_id'=>5


    ]);

    Store::create([
        'image'=>'storage/images/image1.jpg',
        'name'=>'Pet store',
        'address'=>'beirut',
        'description'=>'our store provide many type of pets',
        'phoneNo'=>'71996500',
        'user_id'=>1


    ]);

    Store::create([
        'image'=>'storage/images/image1.jpg',
        'name'=>'Electronics ',
        'address'=>'beirut',
        'description'=>'our store provide many Electronics  items',
        'phoneNo'=>'71996500',
        'user_id'=>4


    ]);
    }
}
