<?php

namespace App\Baroko\ContactInfoMessages\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactInfoMessages
 * @package App\Baroko\ContactInfoMessages\Model
 */
class ContactInfoMessages extends Model
{
    /**
     * @var string
     */
    protected $table = 'contact_info_messages';

    /**
     * @var array
     */
    protected $fillable = ['contact_info_id', 'message', 'initiator'];

    /**
     * ContactInfo relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactInfo() {
        return $this->belongsTo('App\Baroko\ContactInfo\Model\ContactInfo');
    }
}