@extends('admin.layout.base')
@section('title','Create Product')
@section('data-page-id', 'adminProduct')
    
@section('content')
    <div class="add-product">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Add Inventory Item</h2>
                <hr>
            </div>
        </div>
        @include('includes.message')
        <form action="/admin/product/create" method="POST" enctype="multipart/form-data">
            <div class="small-12 medium-11">
                <div class="grid-x grid-padding-x">
                    <div class="small-12 medium-6 cell">
                        <label>Product name:</label>
                            <input type="text" name="name" placeholder="Product name" value="{{\App\Classes\Request::old('post','name')}}">
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product price:</label>
                            <input type="text" name="price" placeholder="Product price" value="{{\App\Classes\Request::old('post','price')}}">
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Category:</label>
                            <select name="category" id="product-category">
                                @foreach ($categories as $category)
                                <option {{\App\Classes\Request::old('post','category') == $category->id ? 'selected':''}} 
                                    value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Subcategory:</label>
                            <select name="subcategory" id="product-subcategory">
                                <select name="subcategory" id="product-subcategory">
                                </select>
                            </select>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Quantity:</label>
                            <select name="quantity">
                                <option value="{{\App\Classes\Request::old('post','quantity')?:""}}">
                                    {{\App\Classes\Request::old('post','quantity')?:"Select Quantity"}}
                                </option>
                                @for($i = 1; $i <= 15; $i++)
                                    <option value="{{$i}}">
                                        {{$i}}
                                    </option>
                                @endfor
                            </select>
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
                        <label for="descriptyion">Description:</label>
                            <textarea name="description" class="mb-5" placeholder="Description">{{\App\Classes\Request::old('post', 'description')}}</textarea>
                        <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}">
                        <button class="button alert" type="reset">
                            Reset
                        </button>
                        <input class="button success float-right" type="submit" value="Save Product">
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('includes.delete-modal')
@endsection