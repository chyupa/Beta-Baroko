<?php

use Illuminate\Database\Seeder;

class ProductPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Baroko\ProductPrices\Model\ProductPrices::class, 100)->create();
    }
}