<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            'name'=> Str::random(20),
            'thumb'=> Str::random(5).'jpg',
            'code'=> random_int(1000, 10000),
            'price'=> random_int(100000, 900000),
            'discount'=> random_int(0, 10),
            'stock'=> random_int(0, 100),
            'description'=> Str::random(1000),
            'expiry_date'=> date('2023-08-11'),
            'id_country'=> 2,
            'id_brand'=> 2,
            'status'=> 'active',
            'display'=> 'yes',
            'price_shock'=> 'no',
            'id_category'=> 6,
            'featured'=> 'no',
            'created_by'=> 'minh',
            'modified_by'=> 'trinh'
        ]);
    }
}
