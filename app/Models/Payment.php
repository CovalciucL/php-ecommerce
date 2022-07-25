<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'order_no', 'amount', 'status'];
    protected $dates = ['deleted_at'];
}