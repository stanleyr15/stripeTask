<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /***** While running seeder will insert dummy OR pre-define data for NAME,PRICE & DESCRIPITIONS. ****************/

        DB::table('products')->insert(
            [
                [
                    'name' => 'Poco Mobile',
                    'price' => 11000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Oppo Mobile',
                    'price' => 12000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Sony Mobile',
                    'price' => 10000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'MI Mobile',
                    'price' => 11000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Apple Mobile',
                    'price' => 21000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Mi Mobile',
                    'price' => 31000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Xiomi Mobile',
                    'price' => 21000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'OnePlus Mobile',
                    'price' => 19000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Realme Mobile',
                    'price' => 18000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Samsung Mobile',
                    'price' => 10000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],
                [
                    'name' => 'Moto Mobile',
                    'price' => 13000,
                    'description' => '“But this is going to take a long time,” product descriptions from your distributors or manufacturers. And you’re right.',
                ],

            ]);
    }
}

