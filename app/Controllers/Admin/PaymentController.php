<?php
namespace App\Controllers\Admin;

use App\Classes\Redirect;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Models\Payment;

class PaymentController extends BaseController
{   
    private $table_name = 'payments';

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }
    
    public function show()
    {
        $total = Payment::all()->count();
        list($payments, $links) = paginate(7, $total, $this->table_name, new Payment);
        return view('admin/details/payments', compact('payments', 'links'));
    }
}