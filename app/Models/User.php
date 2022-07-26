<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $fillable = ['username', 'fullname', 'email', 'password', 'address', 'role'];
    protected $dates = ['deleted_at'];

    public function transform(array $data)
    {
        $users = [];
        foreach ($data as $item){
            array_push($users, [
                'id' => $item->id,
                'username' => $item->username,
                'fullname' => $item->fullname,
                'email' => $item->email,
                'role' => $item->role
            ]);
        }
        return $users;
    }
}