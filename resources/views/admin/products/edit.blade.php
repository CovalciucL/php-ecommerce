@extends('admin.layout.base')
@section('title','Edit Product')
@section('data-page-id', 'adminProduct')
    
@section('content')
    <div class="add-product">
        <div class="grid-x">
            <div class="cell medium-11">
                <h2>Edit {{$product->name}}</h2>
                <hr>
            </div>
        </div>
        @include('includes.message')
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11">
                <table data-form="deleteForm">
                    <tr >
                        <td style="border:1px solid white;">
                            <form action="/admin/product/{{$product->id}}/delete" method="POST" class="delete-item">
                                <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}"/>
                                <button type="submit" class="button alert">Delete Product</button>
                             </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <form action="/admin/product/edit" method="POST" enctype="multipart/form-data">
            <div class="small-12 medium-11">
                <div class="grid-x grid-padding-x">
                    <div class="small-12 medium-6 cell">
                        <label>Product name:
                            <input type="text" name="name" value="{{\App\Classes\Request::old('post','name')?:$product->name}}">
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product price:
                            <input type="text" name="price" value="{{\App\Classes\Request::old('post','price')?:$product->price}}">
                        </label>
                    </div>
                    
                    <div class="small-12 medium-6 cell">
                        <label>Product Category:
                            <select name="category" id="product-category">
                                @foreach ($categories as $category)
                                    <option {{\App\Classes\Request::old('post','category') == $category->id || $category->id == $product->category->id ?'selected':''}} 
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Subcategory:
                            <select name="subcategory" id="product-subcategory">
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Quantity:
                            <select name="quantity">
                                <option value="{{\App\Classes\Request::old('post','quantity')?:$product->quantity}}">
                                    {{\App\Classes\Request::old('post','quantity')?:$product->quantity}}
                                </option>
                                @for($i = 1; $i <= 15; $i++)
                                    <option value="{{$i}}">
                                        {{$i}}
                                    </option>
                                @endfor
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <br>
                        <div class="input-group">
                            <span class="input-group-label">
                                Product Image:
                            </span>
                            <input type="file" name="productImage" class="input-group-field">
                        </div>
                    </div>
                    <div class="small-12 cell">
                        <label for="descriptyion">Description:
                            <textarea name="description" placeholder="Description">{{\App\Classes\Request::old('post','description')?:$product->description}}</textarea>
                        </label>
                        <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}">
                        <input type="hidden" name="product_id" value="{{$product_id?:$product->id}}">
                        <input class="button warning float-right" type="submit" value="Update Product">
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('includes.delete-modal')
@endsection