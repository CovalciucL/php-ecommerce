<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;

trait PayableTrait
{
    public function logPaymentAndMailClient($vendor, $data)
    {   $result['product'] = array();
        $result['order_no'] = array();
        $result['total'] = array();

        $vendor == 'paypal' ? $order_id = $data['transactions'][0]['custom'] : $order_id = uniqid();
        $vendor == 'paypal' ? $amount = convertMoneyToCents($data['transactions'][0]['amount']['total']) : $amount = $data->amount;
        $vendor == 'paypal' ? $status = $data['state'] : $status = $data->status;
        foreach ($_SESSION['user_cart'] as $cart_items){
            $productId = $cart_items['product_id'];
            $quantity = $cart_items['quantity'];
            $item = Product::where('id', $productId)->first();
    
            if(!$item) { continue; }
    
            $totalPrice = $item->price * $quantity;
            $totalPrice = number_format($totalPrice, 2);
            
            OrderDetail::create([
                'user_id' => user()->id,
                'product_id' => $productId,
                'unit_price' => $item->price,
                'status' => 'Pending',
                'quantity' => $quantity,
                'total' => $totalPrice,
                'order_no' => $order_id

            ]);
            $item->quantity = $item->quantity -$quantity;
            $item->save();

            array_push($result['product'], [
                'name' => $item->name,
                'price' => $item->price,
                'total' => $totalPrice,
                'quantity' => $quantity,
            ]);
        }
        Order::create([
            'user_id' => user()->id,
            'order_no' => $order_id

        ]);
        Payment::create([
            'user_id' => user()->id,
            'amount' => $amount,
            'status' => $status,
            'order_no' => $order_id

        ]);
        $result['order_no'] = $order_id;
        $result['total'] = Session::get('cartTotal');

        $data = [
            'to' => user()->email,
            'subject' => 'Order Confirmation',
            'view' => 'purchase',
            'name' => user()->fullname,
            'body' => $result
        ];
        (new Mail())->send($data);
    }
}