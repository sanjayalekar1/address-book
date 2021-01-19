<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'profile_pic',
        'email',
        'phone',
        'street',
        'zip_code',
        'city',
    ];

    public function city(){
        return $this->belongsTo('App\Models\City','id');
    }
}
