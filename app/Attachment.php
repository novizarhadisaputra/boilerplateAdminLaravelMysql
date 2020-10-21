<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'ext', 'original' ,'path'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
