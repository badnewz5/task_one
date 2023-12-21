@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br><br><br>
            <h1>View User</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Regions</th>
                    <th scope="col">Districts</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Language</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->date_birth }}</td>
                    <td>{{ $user->regions }}</td>
                    <td>{{ $user->districts }}</td>
                    <td>{{ $user->gender}}</td>
                    <td>{{ $user->language}}</td>
                    <td><a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}" role="button">Edit</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
   
   
        
   
</div>
@endsection
