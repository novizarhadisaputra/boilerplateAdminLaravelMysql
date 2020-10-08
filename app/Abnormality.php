<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abnormality extends Model
{
    protected $fillable = ['title', 'description', 'location', 'pic_name', 'user_id', 'status_id'];
    use SoftDeletes;

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable');
    }

    public function status()
    {
        return $this->hasOne(StatusAbnormality::class, 'id', 'status_id');
    }
}
