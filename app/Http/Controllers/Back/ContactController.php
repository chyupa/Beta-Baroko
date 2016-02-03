<?php

namespace App\Http\Controllers\Back;

use App\Baroko\ContactInfo\Repository\ContactInfoRepository;
use App\Baroko\ContactInfoMessage\Repository\ContactInfoMessageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * @var ContactInfoMessageRepository
     */
    protected $contactInfoMessageRepo;

    /**
     * @var NotificationsController
     */
    protected $notifications;

    /**
     * ContactController constructor.
     * @param ContactInfoRepository $contactInfoRepository
     * @param ContactInfoMessageRepository $contactInfoMessagesRepository
     * @param NotificationsController $notificationsController
     */
    public function __construct(
      ContactInfoRepository $contactInfoRepository,
      ContactInfoMessageRepository $contactInfoMessagesRepository,
      NotificationsController $notificationsController
    ) {
        $this->contactInfoRepo = $contactInfoRepository;
        $this->contactInfoMessageRepo = $contactInfoMessagesRepository;
        $this->notifications = $notificationsController;
    }

    /**
     * Save contact form data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveContact(Request $request) {
        $contactInfoData = $request->except('message');

        $contactInfo = $this->contactInfoRepo->create($contactInfoData);

        $contactInfoMessagesData = [
            'message' => $request->get('message'),
            'initiator' => ContactInfoMessageRepository::CLIENT
        ];

        $contactInfoMessages = $contactInfo->messages()->create($contactInfoMessagesData);

        $this->notifications->sendContactInfoToUser($contactInfo);

        return response()->json(['success' => 'Message sent!']);
    }

    /**
     * Get conversation by UUID
     *
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConversation($uuid) {
        $conversation = $this->contactInfoRepo->getConversationByUuid($uuid);
        if (!$conversation) {
            return response()->json(['error' => 'Could not find conversation']);
        }

        return response()->json(['success' => $conversation]);
    }
}