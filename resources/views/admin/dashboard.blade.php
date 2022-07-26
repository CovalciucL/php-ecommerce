@extends('admin.layout.base')
@section('title','Dashboard')
@section('data-page-id', 'adminDashboard')
    
@section('content')
{{-- TO DO Products Page, Categories Page, Dashboard Pages, Breadcrumbs, Users  --}}
    <div class="dashboard">
        <div class="grid-x" data-equilizer data-equilizer-on="medium">
            {{-- Order --}}
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="small-9 cell">
                            <p>Total Orders</p>
                            <h4>{{$orders}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/public/admin/orders">Order Details</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Stock --}}
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-temperature-empty"></i>
                        </div>
                        <div class="small-9 cell ">
                            <p>Stock</p><h4>{{$products}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/public/admin/products">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Revenue --}}
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="small-9 cell ">
                            <p>Revenue</p>
                            <h4>${{number_format($payments,2)}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/public/admin/payments">Payment Details</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Signup --}}
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="small-9 cell">
                            <p>Users</p>
                            <h4>{{$users}}</h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/public/admin/users">Registred Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-x cell">
            <div class="small-12 medium-6 cell monthly-sales">
                <div class="card">
                    <div class="card-section">
                        <h4>Monthly Orders</h4>
                        <canvas id="order"></canvas>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-6 cell monthly-sales">
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