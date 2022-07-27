@extends('admin.layout.base')
@section('title', 'Payments')
@section('data-page-id', 'adminPayments')

@section('content')
    <div class="category">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Payments</h2> <hr />
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(count($payments))
                    <table class="hover unstriped">
                        <thead>
                        <tr><th>Customer</th><th>Amount</th><th>Order No</th><th>Item Count</th><th width="70">Status</th><th>Date Created</th></tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment['customer']['fullname'] }}</td>
                                <td>{{ $payment['amount'] }}</td>
                                <td>{{ $payment['order_no'] }}</td>
                                <td>{{ $payment['item_count'] }}</td>
                                <td>{{ $payment['status'] }}</td>
                                <td>{{ $payment['added'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $links !!}
                @else
                    <h2>You have not sold any product.</h2>
                @endif
            </div>
        </div>
    </div>


@endsection