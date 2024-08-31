@extends('admin-panel.master')
@section('title','Project Create')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Project Create Form</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('admin/projects')}}" class="btn btn-primary float-end"><i
                                    class="fas fa-circle-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('projects.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name')}}" placeholder="Enter project name...">
                            @error('name')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                value="{{old('url')}}" placeholder="Enter project URL...">
                            @error('url')
                            <span><small class="text-danger ">{{$message}}</small></span>
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