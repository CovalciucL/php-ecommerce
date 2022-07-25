@extends('layouts.base')

@section('body')
    @include('includes.nav')
    <div class="site_wrapper">
        @yield('content')
        <div class="notify text-center">
            
        </div>
    </div>
    @yield('footer')
@stop