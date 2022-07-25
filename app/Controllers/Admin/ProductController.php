<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends BaseController
{   
    public $table_name = 'products';
    public $categories;
    public $products;
    public $subcategories;
    public $subcategories_links;

    public $links;

    public function __construct()
    {   
        if(!Role::middleware('admin')){
            Redirect::to('/public/');
        }
        $this->categories = Category::all();

        $total = Product::all()->count();
        
        list($this->products, $this->links) = paginate(5, $total, $this->table_name, new Product());
        // list($this->subcategories, $this->subcategories_links) = paginate(5, $subTotal,'sub_categories', new SubCategory);

    }
    
    public function show()
    {   
        $product = Product::where('id',1)->with(['category','subCategory'])->first();
        $products = $this->products;
        $links = $this->links;
        return view('admin/products/inventory', compact('products','links'));
    }
    
    public function showProductForm()
    {   
        $categories = $this->categories;
        return view('admin/products/create', compact('categories'));
    }

    public function store()
    {
        if (Request::has('post')) {
            
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'maxLength' => 60, 'string' => true, 'unique' => $this->table_name],
                    'price' => ['required' => true, 'minLength' => 2, 'number' => true],
                    'quantity' => ['required' => true],
                    'category' => ['required' => true],
                    'description' => ['required' => true, 'mixed' => true, 'minLength' => 3, 'maxLength' => 500,]

                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                $file = Request::get('file');
                isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';

                if (empty($filename)) {
                    $file_error['productImage'] = ['Product Image is required'];
                } elseif (!UploadFile::isImage($filename)){
                    $file_error['productImage'] = ['Image is invalid, please try again'];
                }

                if ($validate->hasError()) {
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/create',[
                        'categories' => $this->categories, 'errors' => $errors,
                    ]);
                }

                $ds = DIRECTORY_SEPARATOR;
                $temp_file = $file->productImage->tmp_name;
                $image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}products", $filename)->path();
                
                Product::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'category_id' => $request->category,
                    'sub_category_id' => $request->subcategory,
                    'image_path' => $image_path,
                    'quantity' => $request->quantity,
                ]);

                Request::refresh();
              
                return view('admin/products/create',[
                    'categories' => $this->categories, 'success' => 'Record Created',
                ]);
            } else {
                throw new \Exception('Token mismatch');
            }
        }   
    }

    public function showEditProductForm($id)
    {
        $categories = $this->categories;
        $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();
        return view('admin/products/edit', compact('product', 'categories'));
    }
    
    public function edit()
    {
        if (Request::has('post')) {
            
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'maxLength' => 60, 'string' => true],
                    'price' => ['required' => true, 'minLength' => 2, 'number' => true],
                    'quantity' => ['required' => true],
                    'category' => ['required' => true],
                    'description' => ['required' => true, 'mixed' => true, 'minLength' => 3, 'maxLength' => 500,]
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                $file = Request::get('file');
                isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';

                if (isset($file->productImage->name) && !UploadFile::isImage($filename)){
                    $file_error['productImage'] = ['Image is invalid, please try again'];
                }

                if ($validate->hasError()) {
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/create',[
                        'categories' => $this->categories, 'errors' => $errors,
                    ]);
                }

                $product = Product::findOrFail($request->product_id);
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->sub_category_id = $request->subcategory;
                $product->quantity = $request->quantity;

                if ($filename) {
                    $ds = DIRECTORY_SEPARATOR;
                    $old_image_path = BASE_PATH."{$ds}public{$ds}$product->image_path";
                    $temp_file = $file->productImage->tmp_name;
                    $image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}products", $filename)->path();
                    unlink($old_image_path);
                    $product->image_path = $image_path;
                }
                
                $product->save();
                Session::add('success', 'Record Update');
                Redirect::to('/public/admin/products');
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
                Product::destroy($id);

                Session::add('success', 'Product Deleted');

                Redirect::to('/public/admin/products');

                exit;
            } else {
                throw new \Exception('Token mismatch');
            }
        }   
    }
    public function getSubcategories($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        echo json_encode($subcategories);
        exit;
    }
}