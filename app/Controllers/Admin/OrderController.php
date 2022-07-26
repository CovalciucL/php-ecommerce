<?php
namespace App\Controllers\Admin;

use App\Classes\Redirect;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Models\Order;

class OrderController extends BaseController
{
    private $table_name = 'orders';

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }
    public function show()
    {
        $total = Order::all()->count();
        list($orders, $links) = paginate(10, $total, $this->table_name, new Order);
        return view('admin/details/orders', compact('orders', 'links'));
    }
}