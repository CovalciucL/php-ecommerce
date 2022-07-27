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
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(isset($orders) && count($orders))
                    @foreach($orders as $order_no => $details)
                        <h4>Order Number: {{ $order_no }}</h4>
                        <table class="hover">
                            <tr><td><strong>Customer Name:</strong> &nbsp; {{ $details['customer']['fullname'] }}</td></tr>
                            <tr><td><strong>Address:</strong> &nbsp; {{ $details['customer']['address'] }}</td></tr>
                            <tr><td><strong>Order Date:</strong> &nbsp; {{ $details['when'] }}</td></tr>
                            <tr><td><strong>Total:</strong> &nbsp; ${{ $details['total'] }}</td></tr>
                            <tr>
                                <td>
                                    <h4>Items</h4>
                                    <table>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Product Name</th>
                                            <th width="5%">Qty</th>
                                            <th width="10%">Unit Price</th>
                                            <th width="10%">Total</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                        @each('admin.details.items', $details, 'detail')
                                    </table>
                                </td>
                            </tr>

                        </table>
                    @endforeach
                    {!! $links !!}
                @else
                    <h2>You have not made any sales.</h2>
                @endif
            </div>
        </div>
    </div>
@endsection