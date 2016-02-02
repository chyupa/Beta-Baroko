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
     */
    public function saveContact(Request $request) {
        $contactInfoData = $request->except('message');

        $contactInfo = $this->contactInfoRepo->create($contactInfoData);

        $contactInfoMessagesData = [
//            'contact_info_id' => $contactInfo->id,
            'message' => $request->get('message'),
            'initiator' => ContactInfoMessageRepository::USER
        ];

        $contactInfoMessages = $contactInfo->message()->create($contactInfoMessagesData);

        $this->notifications->sendContactInfoToUser($contactInfo);
    }
}