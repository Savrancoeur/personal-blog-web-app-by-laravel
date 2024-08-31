@extends('ui-panel.master')
@section('title','posts')
@section('content')
            <div class="row">
              {{-- BLOG --}}
              <div class="col-md-8">
                @foreach($posts as $post)
                <div class="row">
                  <div class="col-md-12">
                    <div class="post">
                      <img src="{{asset('storage/post-images/'.$post->image)}}"  style="border:1px solid salmon;height:400px;object-fit:fill;" />
                      <br /><br />
                      <h5>
                        <strong
                          >{{$post->title}}</strong
                        >
                      </h5>
                      <br />
                      <p>
                        {{substr($post->content,0,150)}}...
                      </p>
                      <a href="{{url('/posts/'.$post->id.'/details')}}">
                        <button class="btn btn-info">
                          See More <i class="fas fa-angle-double-right"></i>
                        </button>
                      </a>
                    </div>
                  </div>                 
                </div>
                @endforeach
                {{$posts->links()}}
              </div>

              {{-- Side Bar --}}
              <div class="col-md-4">
                <div class="siderbar">
                  <form action="{{url('/search_posts')}}" method="GET">
                    @csrf
                    <div class="input-group">
                      <input
                        type="text"
                        name="search_data"
                        class="form-control"
                        placeholder="Search"
                      />
                      <button class="btn btn-success">
                        Submit <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                  <hr />

                  <h5>Categories</h5>
                  @foreach($categories as $category)
                  <ul>
                    <li><a href="{{url('search_posts_by_category/'.$category->id)}}">{{$category->name}}</a></li>
                  </ul>
                  @endforeach
                </div>
              </div>
            </div>
@endsection