<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Abnormality extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'location', 'pic_name', 'user_id', 'status_id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable')->orderBy('created_at', 'desc');
    }

    public function status()
    {
        return $this->hasOne(StatusAbnormality::class, 'id', 'status_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y H:i:s');
    }
}
