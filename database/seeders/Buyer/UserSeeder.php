<?php

namespace Database\Seeders\Buyer;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        User::create([
            'username'=>'seller1',
            'email'=>'seller1@gmail.com',
            'password'=>'seller11',
            'phoneNo'=>'71889632',
            'role'=>'seller'

        ]);
        User::create([
            'username'=>'seller2',
            'email'=>'seller2@gmail.com',
            'password'=>'seller22',
            'phoneNo'=>'03695211',
            'role'=>'seller'

        ]);User::create([
            'username'=>'buyer1',
            'email'=>'buyer1@gmail.com',
            'password'=>'buyer11',
            'phoneNo'=>'70113698',
            'role'=>'buyer'
        ]);

        User::create([
            'username'=>'seller4',
            'email'=>'seller4@gmail.com',
            'password'=>'seller4444',
            'phoneNo'=>'71889632',
            'role'=>'seller'

        ]);


        
        User::create([
            'username'=>'seller5',
            'email'=>'seller5@gmail.com',
            'password'=>'seller5555',
            'phoneNo'=>'71889632',
            'role'=>'seller'

        ]);

     
    }
}
