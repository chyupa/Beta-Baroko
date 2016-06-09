<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\Baroko\Category\Model\Category::class, 50)->create()->each(function($category) {
            $category->products()->saveMany(factory(App\Baroko\Product\Model\Product::class, 100)->create()->each(function($product) use ($category) {
                $product->info()->save(factory(App\Baroko\ProductInfo\Model\ProductInfo::class)->make());
                $product->settings()->save(factory(App\Baroko\ProductSettings\Model\ProductSettings::class)->make());
                $product->outlet()->save(factory(App\Baroko\ProductOutlet\Model\ProductOutlet::class)->make());
                $product->prices()->save(factory(App\Baroko\ProductPrices\Model\ProductPrices::class)->make());
            }));
        });
    }
}
