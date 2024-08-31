@extends('ui-panel.master')
@section('title','post-detail')
@section('content')
<div class="col-md-12 post-details">
  <img src="{{asset('storage/post-images/'.$post->image)}}" alt="{{$post->image}}" style="border:1px solid salmon;height:500px;object-fit:fill;" />
  <br /><br />

  <small>
    <strong>
      <i class="fa fa-calendar" aria-hidden="true"></i>
      Posted On:
    </strong>
    {{date('d-M-Y',strtotime($post->created_at))}}
  </small>

  <br />

  <small>
    <strong> <i class="fa fa-list"></i> Category: </strong>
    {{$post->category->name}}
  </small>

  <br /> <br />
  
  <h5>
    <strong
      >{{$post->title}}</strong
    >
  </h5>

  <p style="text-align: justify">
    {{$post->content}}
  </p>

  <form  method="post">
    @csrf

    <div>
      <span>{{$likes->count()}} likes</span>
      <span class="mx-3">{{$dislikes->count()}} dislikes</span>
      <span>{{$comments->count()}} comments</span>
    </div>

    <button type="submit" formaction="{{url('/posts/like/'.$post->id)}}" class="btn btn-sm btn-success like"
      @if($likeStatus)
      @if($likeStatus->type == 'like')
      disabled
      @endif
      @endif
      >
      <i class="far fa-thumbs-up"></i> Like 
    </button>

    <button type="submit" formaction="{{url('/posts/dislike/'.$post->id)}}" class="btn btn-sm btn-danger like mx-2"
      @if($likeStatus)
        @if($likeStatus->type == 'dislike')
          disabled
        @endif
      @endif
      >
      <i class="far fa-thumbs-down "></i> Disike 
    </button>

    <button
      type="button"
      class="btn btn-sm btn-info comment"
      data-bs-toggle="collapse"
      data-bs-target="#collapseExample"
    >
      <i class="far fa-comment"></i>  Comments 
    </button>
  </form>

  <br />

  <div class="comment-form">
    <div class="collapse" id="collapseExample">
      <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
        @csrf
        <div class="form-group">
          <textarea name="text" cols="30" rows="3"  required></textarea>
          <br />
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="far fa-paper-plane"></i> Submit
          </button>
        </div>
      </form>
      <br />
      @foreach($comments as $comment)
      <div class="comment-show my-3">
        <i class="fa-regular fa-circle-user"></i> <strong>{{$comment->user->name}}</strong>
        <div class="comment-box mt-2">
          {{$comment->text}}
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endsection