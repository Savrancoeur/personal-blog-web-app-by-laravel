@extends('admin-panel.master')
@section('title','Post Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Post</h1>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('admin/posts/create')}}" class="btn btn-primary float-end"><i
                                    class="fas fa-plus"></i> Create New Post</a>
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
                                <th>No</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $index => $post)
                            <tr>
                                <td>{{$index+ $posts->firstItem()}}</td>
                                <td>{{$post->category->name;}}</td>
                                <td>
                                    <img src="{{asset('storage/post-images/'.$post->image)}}" width="100px">
                                </td>
                                <td>{{$post->title;}}</td>
                                <td><textarea  cols="25" rows="10" readonly>{{$post->content;}}</textarea></td>
                                <td>
                                    <form action="{{url('admin/posts/'.$post->id)}}"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('posts.edit',$post->id)}}"
                                            class="btn btn-sm btn-secondary" title="edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <button type="submit" class="btn btn-sm btn-danger" title="delete"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-info btn-sm my-2"><i class="fas fa-comments"></i> Comments</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                     {{$posts->links()}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection