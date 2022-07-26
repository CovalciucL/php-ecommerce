<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends BaseController
{   
    public function __construct() 
    {
        if(!Role::middleware('admin')){
            Redirect::to('/public/');
        }
    }
    public function store()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];

            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 5, 'string' => true],
                    'category_id' => ['required' => true]
                ];
                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                $dublicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();

                if ($dublicate_subcategory) {
                    $extra_errors['name'] = array('Subcategory already exist.');
                }
                
                $category = Category::where('id', $request->category_id)->exists();
                
                if (!$category) {
                    $extra_errors['name'] = array('Invalid Category.');
                }
                
                if ($validate->hasError() || $dublicate_subcategory || !$category) {
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors,$extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }

                SubCategory::create([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'slug' => slug($request->name),
                ]);

                echo json_encode(['success' => 'Subcategory create successfully']);
                exit;
            } else {
                throw new \Exception('Token mismatch');
            }
        }   
    }

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];
            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 5, 'string' => true],
                    'category_id' => ['required' => true]
                ];
                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                $dublicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();

                if ($dublicate_subcategory) {
                    $extra_errors['name'] = array('Subcategory already exist.');
                }
                
                $category = Category::where('id', $request->category_id)->exists();
                if (!$category) {
                    $extra_errors['name'] = array('Invalid Category.');
                }
                
                if ($validate->hasError() || $dublicate_subcategory || !$category) {
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors,$extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }
                SubCategory::where('id',$id)->update(['name' => $request->name, 'slug' => slug($request->name),'category_id' => $request->category_id]);
                echo json_encode(['success' => 'Subcategory Updated Successfully']);
                exit;
            } else {
                throw new \Exception('Token mismatch');
            }
        }   
    }

    public function delete($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                SubCategory::destroy($id);
                
                Session::add('success', 'Subcategory Deleted');

                Redirect::to('/public/admin/product/categories');

                exit;
            } else {
                throw new \Exception('Token mismatch');
            }
        }   
    }
}