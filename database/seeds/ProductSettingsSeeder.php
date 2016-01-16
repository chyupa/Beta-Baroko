ProductInfo.php<?php

use Illuminate\Database\Seeder;

class ProductSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Baroko\ProductSettings\Model\ProductSettings::class, 100)->create();
    }
}