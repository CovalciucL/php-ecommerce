@extends('layouts.app')
@section('title')
    Categories
    @if(isset($category) && $showBreadCrumbs) - {{ $category->name }} @endif
    @if(isset($subcategory)) - {{ $subcategory->name }} @endif
@endsection
@section('data-page-id', 'categories')
@section('content')
    <div class="home">
        <section class="display-products mt-3" data-token="{{ $token }}" data-urlParams="{{ $urlParams }}" id="root">
            @if(isset($category) && $showBreadCrumbs)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                    </li>
                    @if(isset($subcategory))
                    <li class="breadcrumb-item">
                            {{ $subcategory->name }}
                    </li>
                    @endif
                </ol>
            </nav>
            @else
            <h2>Categories</h2>
            @endif
            <div class="d-flex flex-wrap justify-content-center">
                <div class="block" v-cloak v-for="product in products">
                    <div class="card p-3 d-flex flex-column align-items-center">
                        <img :src="'/' + product.image_path" width="100%" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">@{{stringLimit(product.name, 18)}}</h5>
                            <div class="d-flex flex-column">
                                <a class="btn btn-outline-success mb-2" :href="'/product/' + product.id">
                                See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="btn btn-danger">
                                    $@{{product.price}} - Add to cart
                                </button>
                                <button v-else disabled class="btn btn-danger">
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 v-if="products.length === 0">No products in this category.</h2>
            </div>
            <div class="position-fixed top-50 start-50">
                <div v-show='loading' class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </section>
    </div>
@stop