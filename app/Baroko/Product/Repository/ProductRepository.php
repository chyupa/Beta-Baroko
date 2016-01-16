<?php

namespace App\Baroko\Product\Repository;

use App\Baroko\Product\Model\Product;

/**
 * Class ProductRepository
 * @package App\Baroko\Product\Repository
 */
class ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product) {
        $this->model = $product;
    }

    /**
     * Get all public products with all
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPublicProductsWithAll() {
        return $this->model
          ->with('info')
          ->with('prices')
          ->with('settings')
          ->where('public', true)
          ->get();
    }

    public function findByUrl($url) {
        return $this->model
          ->with('info')
          ->with('prices')
          ->where('url', $url)
          ->firstOrFail();
    }
}