@extends('admin-panel.master')
@section('title','User Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header">
                    <div class="card-title">User</div>
                </div>

                @if(Session('successMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('successMsg')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id;}}</td>
                                <td>{{$user->name;}}</td>
                                <td>{{$user->email;}}</td>
                                <td>{{$user->status;}}</td>
                                <td>
                                    <form action="{{url('admin/users/'.$user->id.'/delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('admin/users/'.$user->id.'/edit')}}"
                                            class="btn btn-secondary btn-sm"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{$users->links()}}
                </div>
            </div>




        </div>
    </div>
</div>
@endsection