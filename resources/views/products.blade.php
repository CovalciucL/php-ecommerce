@extends('layouts.app')
@section('title', 'Products')
@section('data-page-id', 'products')

@section('content')
    <div class="home">
        <section class="display-products" data-token="{{ $token }}" id="root">
            <h2>Products</h2>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="small-12 cell" v-cloak v-for="product in products">
                    <a :href="'/product/' + product.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                                <img :src="'/' + product.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    @{{ stringLimit(product.name, 18) }}
                                </p>
                                <a :href="'/product/' + product.id" class="button more expanded">
                                    See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart expanded">
                                    $@{{ product.price }} - Add to cart
                                </button>
                                <button v-else class="button cart expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="text-center">
                <i v-show='loading' class="fa-solid fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top: 60%; bottom:20%; color: #0a2b12;"></i>
            </div>
        </section>
    </div>
@stop