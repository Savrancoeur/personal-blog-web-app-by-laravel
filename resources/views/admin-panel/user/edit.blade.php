@extends('admin-panel.master')
@section('title','Edit Users')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit User</div>
                </div>

                <form action="{{url('admin/users/'.$user->id.'/update')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group my-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{$user->name?? old('name')}}" placeholder="Enter user name...">
                            @error('name')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{$user->email?? old('email')}}" placeholder="Enter user email...">
                            @error('email')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="role">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">Select Status</option>

                                <option value="admin" @if ($user->status == 'admin')
                                    selected @endif>
                                    Admin
                                </option>

                                <option value="user" @if ($user->status == 'user')
                                    selected @endif>
                                    User
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer"><button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection