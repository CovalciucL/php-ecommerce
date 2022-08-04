@extends('admin.layout.base')
@section('title', 'Product Orders')
@section('data-page-id', 'adminOrders')

@section('content')
    <div class="category ">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Product Orders</h2> <hr />
            </div>
        </div>
        <section class="h-100">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    @if(isset($orders) && count($orders))
                    @foreach($orders as $order_no => $details)
                  <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-3">
                      <h5 class="text-muted mb-0">Customer Name: <span>{{ $details['customer']['fullname'] }}</span></h5>
                    </div>
                    <div class="card-body p-4">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="small text-muted mb-0">Order Number : {{ $order_no }}</p>
                      </div>
                      <h2>Items</h2>
                      <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    Image
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Name
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Quantity
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Subtotal
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Status
                                </div>
                            </div>
                          <div class="row">
                            @each('admin.details.items', $details, 'detail')
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between pt-2">
                        <p class="fw-bold mb-0">Order Details</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> ${{ $details['total'] }}</p>
                      </div>
                      <div class="d-flex justify-content-between pt-2">
                        <p class="text-muted mb-0">Address : {{ $details['customer']['address'] }}</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Order Date : {{ $details['when'] }}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  {!! $links !!}
                  @else
                      <h2>You have not made any sales.</h2>
                  @endif
                </div>
              </div>
            </div>
          </section>
    </div>
@endsection