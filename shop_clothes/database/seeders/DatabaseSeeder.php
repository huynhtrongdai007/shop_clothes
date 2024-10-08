<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            ['id' => 1,
            'name' => 'CodeLean',
//            'first_name' => 'Code',
//            'last_name' => 'Lean',
            'email' => 'CodeLean@gmail.com',
            'password' => Hash::make('123456'),
            'avatar' => null,
            'level' => 2,
            'description' => null,
                'company_name' => 'CodeGym',
            'country' => 'Viet Nam',
            'street_address' => 'Mon City, Mỹ Đình 2, Nam Từ Liêm',
            'postcode_zip' => '10000',
            'town_city' => 'Ha Noi',
            'phone' => '82462538829',

                ],
        ]);



        DB::table('users')->insert([

            [
                'id' => 2,
                'name' => 'admin',
//                'first_name' => 'admin',
//                'last_name' => ' ',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Shane Lynch',
//                'first_name' => 'Shane',
//                'last_name' => 'Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 1,
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo'
            ],
            [
                'id' => 4,
                'name' => 'Brandon Kelley',
//                'first_name' => 'Brandon',
//                'last_name' => 'Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 5,
                'name' => 'Roy Banks',
//                'first_name' => 'Roy',
//                'last_name' => 'Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => null,
            ],
        ]);
//
        DB::table('blogs')->insert([
            [
                'id' => 1,
                'user_id' => 10,
                'title' => 'The Personality Trait That Makes People Happier',
                'subtitle' => 'abc',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'id' => 2,
                'user_id' => 11,
                'title' => 'This was one of our first days in Hawaii last week.',
                'subtitle' => 'abc',
                'image' => 'blog-2.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'id' => 3,
                'user_id' => 12,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'subtitle' => 'abc',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'id' => 4,
                'user_id' => 13,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'subtitle' => 'abc',
                'image' => 'blog-4.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'id' => 5,
                'user_id' => 14,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'subtitle' => 'abc',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'id' => 6,
                'user_id' => 15,
                'title' => 'Writing has always been kind of therapeutic for me',
                'subtitle' => 'abc',
                'image' => 'blog-6.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                //'user_id' => 1,
                'name' => 'CK_1',
            ],
            [
                //'user_id' => 2,
                'name' => 'Diesel_2',
            ],
            [
                //'user_id' => 3,
                'name' => 'Polo_3',
            ],
            [   //'user_id' => 4,
                'name' => 'Tommy Hilfiger_4',
            ],
        ]);

        DB::table('categories')->insert([
            [
                //'user_id' => 1,
                'name' => 'Men',
            ],
            [
                //'user_id' => 2,
                'name' => 'Women',
            ],
            [
                //'user_id' => 3,
                'name' => 'Kids',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'category_id' => 2,
//                'user_id' => 1,
                'name' => 'Pure Pineapple',
                'description' => '<div class="row"> <div class="col-lg-7"> <h5>Introduction</h5> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p> <h5>Features</h5> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p> </div> <div class="col-lg-5"> <img src="front/img/product-single/tab-desc.jpg" alt=""> </div> </div> ',
                'content' => '',
                'price' => 629.99,
                'qty' => 20,
                'discount' => 495,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'category_id' => 2,
//                'user_id' => 2,
                'name' => 'Guangzhou sweater',
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 13,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'category_id' => 2,
//                'user_id' => 3,
                'name' => 'Guangzhou sweater',
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 34,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 4,
                'category_id' => 1,
//                'user_id' => 4,
                'name' => 'Microfiber Wool Scarf',
                'description' => null,
                'content' => null,
                'price' => 64,
                'qty' => 20,
                'discount' => 35,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Trousers',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'category_id' => 3,
//                'user_id' => 5,
                'name' => "Men's Painted Hat",
                'description' => null,
                'content' => null,
                'price' => 44,
                'qty' => 20,
                'discount' => 35,
                'weight' => null,
                'sku' => null,
                'featured' => false,
                'tag' => 'Hat',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'category_id' => 2,
//                'user_id' => 6,
                'name' => 'Converse Shoes',
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 34,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => '2 Layer Windbreaker',
                'description' => null,
                'content' => null,
                'price' => 45,
                'qty' => 50,
                'discount' => 38,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'HandBag',
                'description' => null,
                'content' => null,
                'price' => 200,
                'qty' => 10,
                'discount' => 190,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Backpack',
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'Blue-Coat',
                'description' => null,
                'content' => null,
                'price' => 100,
                'qty' => 10,
                'discount' => 93,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Coat',
            ],
            [
                'id' => 10,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'Green-Coat',
                'description' => null,
                'content' => null,
                'price' => 95,
                'qty' => 10,
                'discount' => 90,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Coat',
            ],
            [
                'id' => 11,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'The Backpack',
                'description' => null,
                'content' => null,
                'price' => 180,
                'qty' => 10,
                'discount' => 170,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Backpack',
            ],
            [
                'id' => 12,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'Sport Shoes',
                'description' => null,
                'content' => null,
                'price' => 125,
                'qty' => 10,
                'discount' => 119,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Shoes',
            ],

        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11.jpg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'blue',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'blue',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'color' => 'blue',
                'size' => 'XS',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'color' => 'yellow',
                'size' => 'S',
                'qty' => 2,
            ],
            [
                'product_id' => 6,
                'color' => 'violet',
                'size' => 'S',
                'qty' => 2,
            ],
            [
                'product_id' => 7,
                'color' => 'black',
                'size' => 'M',
                'qty' => 20,
            ],
            [
                'product_id' => 8,
                'color' => 'yellow',
                'size' => 'S',
                'qty' => 10,
            ],
            [
                'product_id' => 9,
                'color' => 'Blue',
                'size' => 'S',
                'qty' => 10,
            ],
            [
                'product_id' => 10,
                'color' => 'yellow',
                'size' => 'L',
                'qty' => 10,
            ],
            [
                'product_id' => 11,
                'color' => 'red',
                'size' => 'XS',
                'qty' => 10,
            ],
            [
                'product_id' => 12,
                'color' => 'yellow',
                'size' => 'S',
                'qty' => 10,
            ],

        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Brandon Kelley',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}

