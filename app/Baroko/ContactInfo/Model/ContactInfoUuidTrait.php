<?php

namespace App\Baroko\ContactInfo\Model;

use Webpatser\Uuid\Uuid;

/**
 * Trait ContactInfoUuidTrait
 * @package App\Baroko\ContactInfo\Model
 */
trait ContactInfoUuidTrait
{
    /**
     * Boot function
     */
    public static function bootContactInfoUuidTrait() {
        static::creating(function ($model) {
           $model->uuid = Uuid::generate();
        });
    }
}