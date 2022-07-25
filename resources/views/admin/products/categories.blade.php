@extends('admin.layout.base')
@section('title','Product Category')
@section('data-page-id', 'adminCategories')
    
@section('content')
    <div class="category">
        <div class="row expanded">
            <div class="column medium-11">
                <h2>Product Categories</h2>
                <hr>
            </div>
        </div>
        @include('includes.message')
        <div class="row expanded">
            <div class="small-12 medium-6 column">
                <form action="/public/admin/product/categories" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="small-12 medium-5 end column">
                <form action="/public/admin/product/categories" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name">
                        <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}"/>
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row expanded">
            <div class="small-12 medium-11 column">
                @if(count($categories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th width="50">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['slug']}}</td>
                                    <td>{{$category['added']}}</td>
                                    <td width="50" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Add Subcategory">
                                            <a data-open="add-subcategory-{{$category['id']}}"><i class="fa-solid fa-plus"></i></a>
                                        </span>
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Category">
                                            <a data-open="item-{{$category['id']}}"><i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                        <span style="display: inline-flex" data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Delete Category">
                                            <form action="/public/admin/product/categories/{{$category['id']}}/delete" method="POST" class="delete-item">
                                               <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}"/>
                                               <button type="submit"><i class="fa-solid fa-xmark delete"></i></button>
                                            </form>
                                        </span>
                                        {{-- Edit category --}}
                                        <div class="reveal" id="item-{{$category['id']}}" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="item-name-{{$category['id']}}" type="text" value="{{$category['name']}}" name="name">
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button update-category" 
                                                        name="token" 
                                                        data-token="{{\App\Classes\CSRFToken::token()}}" 
                                                        id="{{$category['id']}}" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        {{-- Add subcategory --}}
                                        <div class="reveal" id="add-subcategory-{{$category['id']}}" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="subcategory-name-{{$category['id']}}" type="text">
                                                    <input type="hidden"/>
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button add-subcategory" 
                                                        name="token" 
                                                        data-token="{{\App\Classes\CSRFToken::token()}}" 
                                                        id="{{$category['id']}}" value="Create">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$links!!}
                @else
                    <h2>You have not created any category</h2>
                @endif
            </div>
        </div>
    </div>
    <div class="subcategory">
        <div class="row expanded">
           <div class="column medium-11">
                <h2>Subcategories</h2>
                <hr>
           </div>
        </div>
        <div class="row expanded">
            <div class="small11-12 medium-11 column">
                @if(count(\App\Models\SubCategory::all()))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th width="70">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$subcategory['name']}}</td>
                                    <td>{{$subcategory['slug']}}</td>
                                    <td>{{$subcategory['added']}}</td>
                                    <td width="70" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Subcategory">
                                            <a data-open="item-subcategory-{{$subcategory['id']}}"><i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                        <span style="display: inline-flex" data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Delete Subcategory">
                                            <form action="/public/admin/product/subcategory/{{$subcategory['id']}}/delete" method="POST" class="delete-item">
                                               <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}"/>
                                               <button type="submit"><i class="fa-solid fa-xmark delete"></i></button>
                                            </form>
                                        </span>
                                        {{-- Edit Subcategory --}}
                                        <div class="reveal" id="item-subcategory-{{$subcategory['id']}}" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Edit Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="item-subcategory-name-{{$subcategory['id']}}" type="text" value="{{$subcategory['name']}}">
                                                    <label> 
                                                        Change Category
                                                        <select id="item-category-{{$subcategory['category_id']}}">
                                                            @foreach(\App\Models\Category::all() as $category)
                                                                @if($category->id == $subcategory['category_id'])
                                                                    <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                                                @endif
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button update-subcategory" 
                                                        data-category-id="{{$subcategory['category_id']}}" 
                                                        data-token="{{\App\Classes\CSRFToken::token()}}" 
                                                        id="{{$subcategory['id']}}" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$subcategories_links!!}
                @else
                    <h2>You have not created any subcategory</h2>
                @endif
            </div>
        </div>
    </div>
    @include('includes.delete-modal')
@endsection