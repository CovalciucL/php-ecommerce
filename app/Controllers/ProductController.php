<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Models\Product;

class ProductController extends BaseController
{
    public function show($id)
    {   
        $token = CSRFToken::token();
        $product = Product::where('id', $id)->first();
        return view('product',compact('token','product'));
    }
    public function get($id)
    {
        $product = Product::where('id', $id)->with(['category','subCategory'])->first();
        
        if($product){
            $similar_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->inRandomOrder()->limit(8)->get();
            echo json_encode([
                'product' => $product,
                'category' => $product->category,
                'subCategory' => $product->subCategory,
                'similarProducts' => $similar_products
            ]);
            exit; 
        }
        header('HTTP/1.1 422 Uprocessable Entity', true, 422);
        echo 'Product not found';
        exit;
    }
    public function showAll()
    {
        $token = CSRFToken::token();
        return view('products', compact('token'));
    }
};