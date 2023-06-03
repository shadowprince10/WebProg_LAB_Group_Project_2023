@extends('layouts.mainuser')

@section('container')
    <div class="container">
        <div class="text-center">
            <h1 style="color: darkcyan;">Update Account Form</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $account->username }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $account->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="20" placeholder="Input your password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="customer" {{ $account->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="admin" {{ $account->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="text-center">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-block">Update Account</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
