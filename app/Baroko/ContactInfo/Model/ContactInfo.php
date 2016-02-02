<?php

namespace App\Baroko\ContactInfo\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactInfo
 * @package App\Baroko\ContactInfo\Model
 */
class ContactInfo extends Model
{
    use ContactInfoUuidTrait;

    /**
     * @var string
     */
    protected $table = 'contact_info';

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'name', 'email', 'phone'];

    /**
     * ContactInfoMessage relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages() {
        return $this->hasMany('App\Baroko\ContactInfoMessage\Model\ContactInfoMessage');
    }
}