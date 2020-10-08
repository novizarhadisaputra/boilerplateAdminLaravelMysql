<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'location', 'pic_name', 'user_id', 'status_id'];

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

    public function status()
    {
        return $this->hasOne(StatusWorkOrder::class, 'status_id', 'id');
    }
}
