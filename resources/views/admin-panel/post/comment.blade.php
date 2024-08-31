@extends('admin-panel.master')
@section('title','Post Comments')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Comments</h1>
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
                        <tbody>
                            @if($comments->count() != 0)
                                @foreach ($comments as $index=> $comment)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$comment->text}}</td>
                                    <td>
                                        <form action="{{url('admin/comment/'.$comment->id.'/show_hide')}}" method="POST">
                                            @csrf
                                                                    
                                            <button type="submit"
                                                class="btn btn-sm
                                                {{$comment->status == 'show' ? 'btn-danger' : 'btn-success'}}
                                                " title="edit">
                                                    @if($comment->status == "show")
                                                        <i class="fa-solid fa-eye-slash"></i> Hide
                                                    @else
                                                        <i class="fa-solid fa-eye"></i> Show
                                                    @endif
                                            </button>              
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <p>No comment</p>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- <div class="card-footer">
                     {{$posts->links()}} 
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection