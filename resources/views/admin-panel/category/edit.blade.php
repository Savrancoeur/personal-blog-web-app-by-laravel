@extends('admin-panel.master')
@section('title','Category Update')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Category Update Form</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('admin/categories')}}" class="btn btn-primary float-end"><i
                                    class="fas fa-circle-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/categories/'.$category->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{$category->name}}" placeholder="Enter category name...">
                            @error('name')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection