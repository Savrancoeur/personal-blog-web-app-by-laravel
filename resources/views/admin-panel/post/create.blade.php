@extends('admin-panel.master')
@section('title','Post Create')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Post Create Form</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('admin/posts')}}" class="btn btn-primary float-end"><i
                                    class="fas fa-circle-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{old('title')}}" placeholder="Enter post title...">
                            @error('title')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="content">Content</label>
                            <textarea name="content" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="Enter post content...">{{old('content')}}</textarea>
                            @error('content')
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