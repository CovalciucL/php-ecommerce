<?php

use App\Classes\Request;
use App\Classes\Session;
use App\Models\User;
use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

function view($path,array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new Blade($view,$cache);
    
    echo $blade->view()->make($path, $data)->render();

};

function make($filename, $data)
{
    extract($data);

    ob_start();

    include(__DIR__ . '/../../resources/views/emails/' . $filename . '.php');

    $content = ob_get_contents();

    ob_end_clean();

    return $content;
}

function slug($value)
{
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u','',mb_strtolower($value));

    $value = preg_replace('!['.preg_quote('_').'\s]+!u', '-', $value);

    return trim($value, '-');
}

function paginate($num_of_records, $total_record, $table_name, $object, $instance = 'p')
{   
    $pages = new Paginator($num_of_records, $instance);
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC" . $pages->get_limit());
    
    $data = $object->transform($data); 
    $query = $_GET;
    if(isset($query[$instance])){
        unset($query[$instance]);
    }
    return [$data, $pages->page_links('?'.http_build_query($query).'&')];
}

function isAuthenticated()
{
    return Session::has('SESSION_USER_NAME') ? true : false;
}

function user()
{
    if(isAuthenticated()){
        return User::findOrFail(Session::get('SESSION_USER_ID'));
    }
    return false;
}

function convertMoneyToCents($value)
{
    $value = preg_replace("/\,/i", "", $value);
    $value =preg_replace("/([^0-9\.\-])/i", "", $value);

    if(!is_numeric($value)){
        return 0.00;
    }

    $value = (float) $value;
    return round($value, 2) * 100;
}