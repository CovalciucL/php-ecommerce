<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'order_no'];
    protected $dates = ['deleted_at'];
    
    private function orderDetails($order_no)
    {
        return OrderDetail::where('order_no', $order_no)->get();
    }

    public function transform(array $data)
    {
        $response = [];
        foreach ($data as $order){
            $when = new Carbon($order->created_at);
            foreach ($this->orderDetails($order->order_no) as $detail){
                $response[$detail->order_no][] = [
                  'product' => Product::find($detail->product_id),
                   'quantity' => $detail->quantity,
                   'status' => $detail->status,
                   'unit_price' => $detail->unit_price,
                   'total' => $detail->total,
                ];
                $response[$detail->order_no]['customer'] = User::find($detail->user_id);
                $amount = Payment::where('order_no', $detail->order_no)->first()->amount / 100;
                $response[$detail->order_no]['total'] = $amount;
                $response[$detail->order_no]['when'] = $when->toFormattedDateString();
            }
        }
        return $response;
    }
}