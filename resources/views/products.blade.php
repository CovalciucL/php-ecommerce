@extends('layouts.app')
@section('title', 'Products')
@section('data-page-id', 'products')

@section('content')
    <div class="home">
        <section class="display-products" data-token="{{ $token }}" id="root">
            <h2>Products</h2>
            <div class="d-flex flex-wrap justify-content-between">
                <div class="block" v-cloak v-for="product in products">
                    <div class="card p-3 d-flex flex-column align-items-center">
                        <img :src="'/' + product.image_path" width="100%" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">@{{stringLimit(product.name, 18)}}</h5>
                            <div class="d-flex flex-column">
                                <a class="btn btn-outline-success mb-2" :href="'/product/' + product.id" class="">
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
            </div>
            <div class="position-fixed top-50 start-50">
                <div v-show='loading' class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </section>
    </div>
@stop