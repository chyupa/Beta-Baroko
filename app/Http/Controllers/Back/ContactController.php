<?php

namespace App\Baroko\Http\Controllers\Back;

use App\Baroko\ContactInfo\Repository\ContactInfoRepository;
use App\Baroko\ContactInfoMessages\Repository\ContactInfoMessagesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;

/**
 * Class ContactController
 * @package App\Baroko\Http\Controllers\Back
 */
class ContactController extends Controller
{
    /**
     * @var ContactInfoRepository
     */
    protected $contactInfoRepo;
    /**
     * @var ContactInfoMessagesRepository
     */
    protected $contactInfoMessagesRepo;

    /**
     * ContactController constructor.
     * @param ContactInfoRepository $contactInfoRepository
     * @param ContactInfoMessagesRepository $contactInfoMessagesRepository
     */
    public function __construct(
      ContactInfoRepository $contactInfoRepository,
      ContactInfoMessagesRepository $contactInfoMessagesRepository
    ) {
        $this->contactInfoRepo = $contactInfoRepository;
        $this->contactInfoMessagesRepo = $contactInfoMessagesRepository;
    }

    /**
     * Save contact form data
     *
     * @param Request $request
     */
    public function saveContact(Request $request) {
        dd($request);
    }
}