<?php

namespace App\Baroko\ContactInfo\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\ContactInfo\Model\ContactInfo;

/**
 * Class ContactInfoRepository
 * @package App\Baroko\ContactInfo\Repository
 */
class ContactInfoRepository extends BarokoRepository
{
    /**
     * @var ContactInfo
     */
    protected $model;

    /**
     * ContactInfoRepository constructor.
     * @param ContactInfo $contactInfo
     */
    public function __construct(ContactInfo $contactInfo) {
        $this->model = $contactInfo;
    }
}