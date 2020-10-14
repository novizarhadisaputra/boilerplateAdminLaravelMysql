<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{

    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['name'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
