@extends('layouts.mainuser')

@section('container')
    @if(auth()->user() && auth()->user()->role === 'admin')
        <div class="container">
            <div class="text-center">
                <h1 style="color: darkcyan;">Accounts</h1>
            </div>

            @if($accounts->isEmpty())
                <p>No accounts available.</p>
            @else
                <div class="row">
                    @foreach($accounts as $account)
                        <div class="col-md-15 mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="card-title">{{ $account->username }}</h5>
                                            <p class="card-text">{{ $account->email }}</p>
                                            <p class="card-text" style="color: orange;">{{ $account->role }}</p>
                                        </div>
                                        <div>
                                            <div class="d-grid gap-3">
                                            <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary " style="width: 100px; height:60px">Update</a>
                                            <form action="{{ route('accounts.delete', $account->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger " style="width: 100px; height:60px">Delete</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <p>You don't have permission to access this page.</p>
    @endif
@endsection
