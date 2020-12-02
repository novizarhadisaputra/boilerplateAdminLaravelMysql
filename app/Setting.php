<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = ['admin_email_notification'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
