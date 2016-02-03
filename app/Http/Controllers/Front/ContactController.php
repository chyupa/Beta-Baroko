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

    /**
     * Get conversation by UUID
     *
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConversation($uuid) {
        $conversation = $this->contactRepo->getConversationByUuid($uuid);
        if (!$conversation) {
            return response()->json(['error' => 'Could not find conversation']);
        }

        return response()->json(['success' => $conversation]);
    }
}