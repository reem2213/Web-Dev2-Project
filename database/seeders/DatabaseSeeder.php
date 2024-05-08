<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Buyer\CategorySeeder;
use Database\Seeders\Buyer\ProductSeeder;
use Database\Seeders\Buyer\StoreSeeder;
use Database\Seeders\Buyer\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

        //    UserSeeder::class,
        //    StoreSeeder::class,
        //    CategorySeeder::class,
        ProductSeeder::class


        ]);
    }
}
