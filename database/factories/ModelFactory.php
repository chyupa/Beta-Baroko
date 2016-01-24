<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->email,
      'password' => bcrypt(str_random(10)),
      'remember_token' => str_random(10),
    ];
});

$factory->define(App\Baroko\Product\Model\Product::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'url' => $faker->slug,
      'type' => $faker->randomElement(['produse', 'produse_de']),
      'public' => $faker->boolean(50)
    ];
});

$factory->define(App\Baroko\ProductInfo\Model\ProductInfo::class, function (Faker\Generator $faker) {
    return [
      'product_id' => $faker->unique()->numberBetween(1, 100),
      'description' => $faker->text(200),
      'code' => $faker->randomNumber(6),
      'extension' => $faker->randomElement(['metru', 'bucata'])
    ];
});

$factory->define(App\Baroko\ProductOutlet\Model\ProductOutlet::class, function (Faker\Generator $faker) {
    return [
      'product_id' => $faker->unique()->numberBetween(1, 100),
      'outlet_stock' => $faker->numberBetween(0, 50)
    ];
});

$factory->define(App\Baroko\ProductPrices\Model\ProductPrices::class, function (Faker\Generator $faker) {
    return [
      'product_id' => $faker->unique()->numberBetween(1, 100),
      'old_price' => $faker->randomFloat(2, 0, 1000),
      'price' => $faker->randomFloat(2, 0, 800),
      'discount' => $faker->numberBetween(0, 30)
    ];
});

$factory->define(App\Baroko\ProductSettings\Model\ProductSettings::class, function (Faker\Generator $faker) {
    return [
      'product_id' => $faker->unique()->numberBetween(1, 100),
      'featured' => $faker->boolean(70),
      'promotion' => $faker->boolean(20),
      'stock' => $faker->boolean(20),
      'outlet' => $faker->boolean(5),
      'designer_edition' => $faker->boolean(5)
    ];
});

$factory->define(App\Baroko\Category\Model\Category::class, function (Faker\Generator $faker) {
   return [
       'name' => $faker->name
   ];
});

$factory->define(App\Baroko\Subcategory\Model\Subcategory::class, function (Faker\Generator $faker) {
   return [
       'name' => $faker->name
   ];
});


