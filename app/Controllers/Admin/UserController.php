<?php
namespace App\Controllers\Admin;

use App\Classes\Redirect;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    private $table_name = 'users';

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }

    public function show()
    {
        $total = User::all()->count();
        list($users, $links) = paginate(7, $total, $this->table_name, new User);
        return view('admin/details/users', compact('users', 'links'));
    }
}
