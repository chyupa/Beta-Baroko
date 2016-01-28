<?php

namespace App\Http\ViewComposers;

use App\Baroko\Category\Repository\CategoryRepository;
use Illuminate\Contracts\View\View;

class CategoryComposer
{
    protected $categoryRepo;
    
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepo = $categoryRepository;
    }
    
    public function compose(View $view) {
        $categories = $this->categoryRepo->getCategoriesWithSubcategories();

        return $view->with('categories', $categories);
    }
}