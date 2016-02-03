<?php

namespace App\Http\Controllers\Front;

use App\Baroko\Category\Repository\CategoryRepository;
use App\Baroko\ContactInfo\Repository\ContactInfoRepository;
use App\Baroko\Subcategory\Repository\SubcategoryRepository;
use App\Http\Controllers\Controller;

/**
 * Class FrontController
 * @package App\Http\Controllers\Front
 */
class FrontController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepo;

    /**
     * @var ContactInfoRepository
     */
    protected $contactInfoRepo;

    /**
     * FrontController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ContactInfoRepository $contactInfoRepository) {
        $this->categoryRepo = $categoryRepository;
        $this->contactInfoRepo = $contactInfoRepository;
    }

    /**
     * Get Home Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHome()
    {
        return view('front.homepage');
    }

    /**
     * Get Cart Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCartPage() {
        return view('front.cart');
    }

    /**
     * Get Checkout page
     * TODO: restrict access to this page to users with session carts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout() {
        return view('front.checkout');
    }

    /**
     * Thank you page
     * TODO: restrict access to this page to users who ??? WHO WHAT
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getThankYou() {
        return view('front.thank-you');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategories() {
        return view('front.categories');
    }

    /**
     * Single category page
     *
     * @param $categorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory($categorySlug) {
        $category = $this->categoryRepo->getCategoryBySlug($categorySlug);
        if (!$category) {
            abort(404);
        }

        return view('front.category');
    }

    /**
     * Single subcategory page
     * TODO: change this because I deleted the subcategories
     * @param $subcategorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSubcategory($subcategorySlug) {
        $subcategory = $this->categoryRepo->getSubcategoryBySlug($subcategorySlug);
        if (!$subcategory) {
            abort(404);
        }

        return view('front.subcategory');
    }

    /**
     * Display contact view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact() {
        return view('front.contact');
    }

    /**
     * Display conversation view
     *
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getConversation($uuid) {
        $contactinfo = $this->contactInfoRepo->getConversationByUuid($uuid);
        if (!$contactinfo) {
            abort(404);
        }

        return view('front.conversation');
    }
}