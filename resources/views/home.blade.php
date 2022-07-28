@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')
    <div class="home">
        <section class="hero">
            <div class="hero-slider">
                <img src="/images/sliders/slide_1.jpg" alt="Slide">
                <img src="/images/sliders/slide_2.jpg" alt="Slide">
                <img src="/images/sliders/slide_3.jpg" alt="Slide">       
            </div>
        </section>
        <section class="display-products" data-token="{{$token}}" id="root">
            <h2>Featured Products</h2>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="small-12 cell" v-cloak v-for="feature in featured">
                    <a :href="'/product/' + feature.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                              <img :src="'/' + feature.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    @{{stringLimit(feature.name, 18)}}
                                </p>
                                <a :href="'/product/' + feature.id" class="button more expanded">
                                    See More
                                </a>
                                <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)" class="button cart expanded">
                                    $@{{feature.price}} - Add to cart
                                </button>
                                <button v-else class="button cart expanded"disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2>All Products</h2>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="small-12 cell" v-cloak v-for="product in products">
                    <a :href="'/product/' + product.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                              <img :src="'/' + product.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    @{{stringLimit(product.name, 18)}}
                                </p>
                                <a :href="'/product/' + product.id" class="button more expanded">
                                    See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart expanded">
                                    $@{{product.price}} - Add to cart
                                </button>
                                <button v-else class="button cart expanded"disabled>
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