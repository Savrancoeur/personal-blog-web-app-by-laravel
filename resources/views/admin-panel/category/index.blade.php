@extends('admin-panel.master')
@section('title','Project Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Categories</h1>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('admin/categories/create')}}" class="btn btn-primary float-end"><i
                                    class="fas fa-plus"></i> Create New Category</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(Session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session('successMsg')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id;}}</td>
                                <td>{{$category->name;}}</td>
                                <td>
                                    <form action="{{url('admin/categories/'.$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('categories.edit',$category->id)}}"
                                            class="btn btn-sm btn-secondary" title="edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <button type="submit" class="btn btn-sm btn-danger" title="delete"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                     {{$categories->links()}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection