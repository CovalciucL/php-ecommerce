@extends('admin.layout.base')
@section('title','Dashboard')
@section('data-page-id', 'adminDashboard')
    
@section('content')
{{-- TO DO Products Page, Categories Page, Dashboard Pages, Breadcrumbs  --}}
    <div class="dashboard">
        <div class="row expanded collapse" data-equilizer data-equilizer-on="medium">
            {{-- Order --}}
            <div class="small-12 medium-3 column summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 column">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="small-9 column">
                            <p>Total Orders</p>
                            <h4>{{$orders}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="#">Order Details</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Stock --}}
            <div class="small-12 medium-3 column summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 column">
                            <i class="fa-solid fa-temperature-empty"></i>
                        </div>
                        <div class="small-9 column ">
                            <p>Stock</p><h4>{{$products}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="/public/admin/products">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Revenue --}}
            <div class="small-12 medium-3 column summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 column">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="small-9 column ">
                            <p>Revenue</p>
                            <h4>${{number_format($payments,2)}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="#">Payment Details</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Signup --}}
            <div class="small-12 medium-3 column summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 column">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="small-9 column">
                            <p>Users</p>
                            <h4>{{$users}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="#">Registred Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row column expanded graph">
            <div class="small-12 medium-6 column monthly-sales">
                <div class="card">
                    <div class="card-section">
                        <h4>Monthly Orders</h4>
                        <canvas id="order"></canvas>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-6 column monthly-sales">
                <div class="card">
                    <div class="card-section">
                        <h4>Monthly Revenue</h4>
                        <canvas id="revenue"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection