@extends('layout.app')

@section('title', 'User detail')

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
                                <a href="<?= route('user-list') ?>" class="btn btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($success))
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>
                    </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $user['firstName'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last name:</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $user['lastName'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-select" name="role" id="role">
                                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Modify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
