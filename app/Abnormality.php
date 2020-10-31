<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Abnormality extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'title', 'description', 'location', 'pic_name', 'user_id', 'status_id', 'operator', 'worked_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'worked_at'
    ];

    protected $appends = array('label');

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
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

    public function getLabelAttribute($value)
    {
        if ($this->status_id != 1 && $this->status_id != 5) {
            return 'Outstanding';
        } else if ($this->status_id == 5) {
            return 'Closed';
        }
    }

    public function getWorkedAtAttribute($value)
    {
        if($value !== null) return Carbon::parse($value)->format('d M Y');
    }

    public function getStatusBeforeAttribute($value)
    {
        if (\auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($this->status_id == 2) {
                return 'draft';
            } else if ($this->status_id == 3) {
                return 'open';
            } else if ($this->status_id == 4) {
                return 'approved';
            } else if ($this->status_id == 5) {
                return 'on_progress';
            }
        } else {
            if ($this->status_id == 2) {
                return 'draft';
            } else if ($this->status_id == 3) {
                return null;
            } else if ($this->status_id == 4) {
                return null;
            } else if ($this->status_id == 5) {
                return null;
            }
        }
    }

    public function getBeforeLabelAttribute($value)
    {
        if ($this->status_id == 2) {
            return 'Draft';
        } else if ($this->status_id == 3) {
            return 'Open';
        } else if ($this->status_id == 4) {
            return 'Approved';
        } else if ($this->status_id == 5) {
            return 'On Progress';
        }
    }

    public function getStatusAfterAttribute($value)
    {
        if (auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($this->status_id == 1) {
                return 'open';
            } else if ($this->status_id == 2) {
                return 'approved';
            } else if ($this->status_id == 3) {
                return 'on_progress';
            } else if ($this->status_id == 4) {
                return 'closed';
            }
        }
    }

    public function getAfterLabelAttribute($value)
    {
        if (auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($this->status_id == 1) {
                return 'Open';
            } else if ($this->status_id == 2) {
                return 'Approved';
            } else if ($this->status_id == 3) {
                return 'On Progress';
            } else if ($this->status_id == 4) {
                return 'Closed';
            }
        } else {
            if ($this->status_id == 1) {
                return 'Open';
            } else if ($this->status_id == 2) {
                return null;
            } else if ($this->status_id == 3) {
                return null;
            } else if ($this->status_id == 4) {
                return null;
            }
        }
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable')->orderBy('created_at', 'desc');
    }
}
