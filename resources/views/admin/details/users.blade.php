@extends('admin.layout.base')
@section('title', 'Users')
@section('data-page-id', 'users')

@section('content')
    <div class="category admin_shared">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Users</h2> <hr />
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(count($users))
                    <table class="hover unstriped">
                        <thead>
                        <tr><th>User</th><th>Name</th><th>Email</th><th>Role</th></tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['fullname'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['role'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $links !!}
                @else
                    <h2>There are no users.</h2>
                @endif
            </div>
        </div>
    </div>


@endsection