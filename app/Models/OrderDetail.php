<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
   
    public $timestamps = true;
    protected $fillable = ['user_id', 'order_no', 'product_id', 'quantity','unit_price', 'status', 'total'];
    protected $dates = ['deleted_at'];
    
}