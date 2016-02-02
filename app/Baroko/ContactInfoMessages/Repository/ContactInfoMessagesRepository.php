<?php

namespace App\Baroko\ContactInfoMessages\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\ContactInfoMessages\Model\ContactInfoMessages;

/**
 * Class ContactInfoMessagesRepository
 * @package App\Baroko\ContactInfoMessages\Repository
 */
class ContactInfoMessagesRepository extends BarokoRepository
{
    /**
     * @var ContactInfoMessages
     */
    protected $model;

    /**
     * ContactInfoMessagesRepository constructor.
     * @param ContactInfoMessages $contactInfoMessages
     */
    public function __construct(ContactInfoMessages $contactInfoMessages) {
        $this->model = $contactInfoMessages;
    }
}