<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name','last_name', 'email', 'phone', 'gender','dob','marriage_anniversary','anniversary_reminder','birthday_reminder','organization','organization_location','organization_gst_number'
    ];
    public function sold_packages()
    {
        return $this->hasOne('App\SoldPackage', 'customer_id');
    }
}
