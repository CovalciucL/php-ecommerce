<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'order_no', 'amount', 'status'];
    protected $dates = ['deleted_at'];

    public function transform(array $data)
    {
        $payments = [];
        foreach ($data as $item){
            $added = new Carbon($item->created_at);
            array_push($payments, [
                'id' => $item->id,
                'customer' => User::find($item->user_id),
                'amount' => $item->amount / 100,
                'order_no' => $item->order_no,
                'item_count' => OrderDetail::where('order_no', $item->order_no)->count() ?? 0,
                'status' => $item->status,
                'added' => $added->toFormattedDateString()
            ]);
        }
        return $payments;
    }
}