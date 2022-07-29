@extends('admin.layout.base')
@section('title','Manage Products')
@section('data-page-id', 'adminProduct')
    
@section('content')
    <div class="products">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Manage Inventory Items</h2>
                <hr>
            </div>
        </div>
        @include('includes.message')
       <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                <a href="/admin/product/create" class="button float-right">
                <i class="fa-solid fa-plus"></i>   
            </a>
            </div>
       </div>
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(count($products))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Date Created</th>
                                <th width="50">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><img src="/{{$product['image_path']}}" alt="{{$product['name']}}" height="40" width="40"></td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['price']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['category_name']}}</td>
                                    <td>{{$product['sub_category_name']}}</td>
                                    <td>{{$product['added']}}</td>
                                    <td width="50" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Product">
                                            <a href="/admin/product/{{$product['id']}}/edit"> <i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$links!!}
                @else
                    <h2>You have not created any products</h2>
                @endif
            </div>
        </div>
    </div>
@endsection