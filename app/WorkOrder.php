<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'location', 'pic_name', 'user_id', 'status_id', 'category_id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = array('label');

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->hasOne(StatusAbnormality::class, 'id', 'status_id');
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable')->orderBy('created_at', 'desc');
    }

    public function getLabelAttribute($value)
    {
        if ($this->status_id > 1 && $this->status_id < 5) {
            return 'Outstanding';
        } else if ($this->status_id == 5) {
            return 'Closed';
        }
    }
}
