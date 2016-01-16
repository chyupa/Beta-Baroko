<?php

use Illuminate\Database\Seeder;

class ProductInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Baroko\ProductInfo\Model\ProductInfo::class, 100)->create();
    }
}