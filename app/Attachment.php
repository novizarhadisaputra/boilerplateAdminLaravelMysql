<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'ext', 'original' ,'path', 'status_type'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
