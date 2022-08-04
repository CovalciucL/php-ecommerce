@extends('layouts.app')
@section('title', 'You Shopping Cart')
@section('data-page-id', 'cart')
@section('stripe-checkout')
<script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
@section('paypal-checkout')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection
@section('content')
    <div class="shopping_cart" id="shopping_cart">
        <div class="position-fixed top-50 start-50">
            <div v-show='loading' class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <section class="h-100 items" v-cloak v-if="loading == false">
            <h2 v-if="fail" v-text="message"></h2>
            <div v-else class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                  <div class="card rounded">
                    <div class="card-body p-0">
                      <div class="row g-0">
                        <div class="col-lg-8">
                          <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                              <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                            </div>
                            <hr class="my-4">
                            <div v-for="item in items">
                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <a :href="'/product/' + item.id">
                                    <img :src="'/' + item.image" height="60px" width="60px" alt="item.name">
                                </a>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h5><a :href="'/product/' + item.id">@{{ item.name }}</a></h5>
                                Status:
                                <span v-if="item.stock > 1" style="color: #00AA00;">In Stock</span>
                                <span v-else style="color: #ff0000;">Out of Stock</span>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  <button v-if="item.quantity > 1" @click="updateQuantity(item.id, '-')"
                                      style="cursor: pointer; color: #ff8000;">
                                      <i class="fas fa-minus" aria-hidden="true"></i>
                                    </button>
                                    @{{ item.quantity }}
                                    <button v-if="item.stock > item.quantity" @click="updateQuantity(item.id, '+')"
                                            style="cursor: pointer; color: #00AA00;">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                    </button>
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">$@{{ item.price }}</h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <button @click="removeItem(item.index)">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                              </div>
                            </div>
                            <hr class="my-4">
                            </div>
                            <div class="pt-5">
                              <h6 class="mb-0"><a href="/" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i>Continue Shopping</a></h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 bg-grey">
                          <div class="p-5">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                            <hr class="my-4">
          
                            <div class="d-flex justify-content-between mb-4">
                              <h5 class="text-uppercase">Subtotal</h5>
                              <h5>$@{{ cartTotal }}</h5>
                            </div>
          
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase mb-3">Tax</h5>
                                <h5>$0.00</h5>
                            </div>
                            <div class="mb-4">
                              <div class="form-outline d-flex">
                                <input type="text" id="form3Examplea2" placeholder="Coupon code" class="form-control form-control-lg" />
                                <button class="btn btn-primary coupon-btn">Apply</button>
                              </div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase mb-3">Discount Amount</h5>
                                <h5>$0.00</h5>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between mb-5">
                              <h5 class="text-uppercase">Total price</h5>
                              <h5>$@{{ cartTotal }}</h5>
                            </div>
                            <div class="text-right">
                                <button @click="emptyCart()" class="btn btn-secondary mt-3 mb-3">
                                    Empty Cart
                                </button>
                                <a href="/" class="btn btn-secondary mt-3 mb-3">
                                    Continue Shopping &nbsp; <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                @if(isAuthenticated())
                                <button @click.prevent="checkout()" class="btn btn-success mt-3 mb-3">
                                    Pay With Card &nbsp; <i class="fa-solid fa-credit-card"></i>
                                </button>
                                <span id="paypalBtn"></span>
                                <span id="paypalInfo" data-app-env="{{getenv('APP_ENV')}}" data-app-baseurl="{{getenv('APP_URL')}}"></span>
                                @else
                                <span >
                                    <a href="/login" class="btn btn-success mt-3 mb-3">
                                        Checkout &nbsp; <i class="fa-solid fa-credit-card"></i>
                                    </a>
                                </span>
                                @endif
                                <span id="properties" class="hide" data-customer-email="{{user()->email}}" data-stripe-key="{{\App\Classes\Session::get('publisher_key')}}">
                                </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
@stop