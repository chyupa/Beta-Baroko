<?php

namespace App\Http\Controllers\Front;

use App\Baroko\ContactInfo\Repository\ContactInfoRepository;
use App\Http\Controllers\Controller;

/**
 * Class ContactController
 * @package App\Http\Controllers\Front
 */
class ContactController extends Controller
{
    /**
     * @var ContactInfoRepository
     */
    protected $contactRepo;

    /**
     * ContactController constructor.
     * @param ContactInfoRepository $contactInfoRepository
     */
    public function __construct(ContactInfoRepository $contactInfoRepository) {
        $this->contactRepo = $contactInfoRepository;
    }
}