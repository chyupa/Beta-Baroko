<?php

namespace App\Baroko\Product\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\Product\Model\Product;

/**
 * Class ProductRepository
 * @package App\Baroko\Product\Repository
 */
class ProductRepository extends BarokoRepository
{
    /**
     * @var Product
     */
    protected $model;

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
          ->limit(15)
          ->get();
    }

    public function findByUrl($url) {
        return $this->model
          ->with('info')
          ->with('prices')
          ->with('settings')
          ->where('url', $url)
          ->firstOrFail();
    }
}