@extends('layout.app')

@section('title', 'Users list')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>@yield('title')</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <a href="{{ route('new-user') }}" class="btn btn-primary">Create User</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['firstName'] ?></td>
                                <td><?= $user['lastName'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <a href="{{ route('user-detail', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('delete-user', $user['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
