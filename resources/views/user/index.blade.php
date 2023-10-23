@extends('layouts.app')

    @section('body')
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0">List of Users</h1>
            <a href="{{ route('user.create')}}" class="btn btn-primary">add new User</a>
        </div>
    
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>email</th>
                <th>name</th>
                <th>phoneNumber</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if($user->count() > 0)
            @foreach($user as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->email }}</td>
                    <td class="align-middle">{{ $rs->name }}</td>
                    <td class="align-middle">{{ $rs->phoneNumber }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('user.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
                <tr>
                    <td class="text-center" colspan="5">User not found</td>
                </tr>
        @endif
        </tbody>
    </table>
    @endsection