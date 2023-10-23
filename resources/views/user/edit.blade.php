@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit User</h1>
    <hr />
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">email</label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number" value="{{ $user->phoneNumber }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection