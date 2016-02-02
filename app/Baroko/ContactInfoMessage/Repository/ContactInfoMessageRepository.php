<?php

namespace App\Baroko\ContactInfoMessage\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\ContactInfoMessage\Model\ContactInfoMessage;

/**
 * Class ContactInfoMessagesRepository
 * @package App\Baroko\ContactInfoMessage\Repository
 */
class ContactInfoMessageRepository extends BarokoRepository
{
    /**
     * constant for admin initiator
     */
    const ADMIN = 'admin';

    /**
     * constant for user initiator
     */
    const USER = 'user';

    /**
     * @var ContactInfoMessage
     */
    protected $model;

    /**
     * ContactInfoMessagesRepository constructor.
     * @param ContactInfoMessage $contactInfoMessages
     */
    public function __construct(ContactInfoMessage $contactInfoMessages) {
        $this->model = $contactInfoMessages;
    }
}