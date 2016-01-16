<?php

use Illuminate\Database\Seeder;

class ProductOutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Baroko\ProductOutlet\Model\ProductOutlet::class, 100)->create();
    }
}