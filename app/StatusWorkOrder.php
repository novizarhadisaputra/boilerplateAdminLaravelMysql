<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusWorkOrder extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
}
