@extends('ui-panel.master')

@section('title','index')

@section('content')
<!-- ABOUT ME & SKILLS SECTION-->
<div class="aboutme">
  <div class="row">
    <div class="col-md-5">
      <br />
      <h3 class="text-center">ABOUT ME</h3>
      <br />
      <p>My name is Thu Ta Ye Yint and I'm a freelance full stack developer and project manager, from Myanmar 🇲🇲 </p>

      <p>I’m interested in web development, backend engineering, and project management. I love exploring new technologies and building innovative solutions.</p>

      <p>I’m looking to collaborate on open-source projects or any exciting web development projects that align with my skills and interests. I'm especially interested in projects that involve Django, Laravel, or modern front-end frameworks.</p>
          
      <p>I’m currently learning PHP, Laravel, Vue, and Laravel to expand my skills in full-stack development and create more dynamic web applications.</p>

      <p>How to reach me: You can reach me through my GitHub profile <a href="https://github.com/Savrancoeur">Savrancoeur</a> , or feel free to connect with me on LinkedIn <a href="https://www.linkedin.com/in/thutayeyint73">Thu Ta Ye Yint</a> or via  <a href="mailto:mario.thuta@gmail.com">Email</a>.</p>

      <p>⚡ <strong>Fun fact</strong>: I'm not just a coder, but also a project manager! At 21, I'm already managing freelance projects, combining technical skills with leadership and organization.</p>
      <div class="row">
        <div class="col-md-6 g-3">
          <div class="total-project py-3 bg-info">
            <i class="fa fa-project-diagram text-warning"></i>
            <br />
            <strong class="text-danger">{{$projects->count()}}</strong>
            <p class="text-center fw-bold">Total Projects</p>
          </div>
        </div>
        <div class="col-md-6 g-3">
          <div class="total-student py-3 bg-info">
            <i class="fas fa-users text-warning"></i>
            <br />
            <strong class="text-danger">
              @if($clientcounts)
              {{$clientcounts->count}}
              @endif
            </strong>
            <p class="text-center fw-bold">Total Clients</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <br />
      <h4 class="text-center">MY SKILLS</h4>
      <br />

      @foreach ($skills as $skill)
      <div class="row mb-3">
        <div class="col-md-9">
          <div class="progress mt-2" style="border: 1px solid gray">
            <div class="progress-bar" style="width: {{$skill->percent}}%"
              aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100">
              {{$skill->percent}}%
            </div>
          </div>
        </div>
        <div class="col-md-3">{{$skill->name}}</div>
      </div>
      @endforeach
      {{$skills->links()}}
    </div>
  </div>
</div>



<br /><br /><br />

<!-- MY PROJECTS SECTION -->
<h2 class="text-center">MY PROJECTS</h2>
<br />
<div class="row">
  @foreach($projects as $project)
  <div class="col-sm-6 col-md-4 g-4 ">
    <a href="{{$project->url}}" class="text-decoration-none" target="_blank">
      <div class="single-project bg-info">
        <i class="fa fa-project-diagram text-warning"></i>
        <br />
        <strong class="text-danger">{{$project->name}}</strong>
      </div>
    </a>
  </div>
  @endforeach
</div>

<br /><br /><br />
<!-- LATEST POSTS SECTION  -->
<h2 class="text-center">LATEST POSTS FROM BLOGS</h2>
<br />
<p class="text-center">
  Hey Guys! I warmly welcome you to read some of my blog posts.
  Here are very interesting and exciting posts you can read that
  i am supporting for you guys!
</p>
<div class="row">
  @foreach($posts as $post)
    <div class="col-sm-6 col-md-4">
      <a href="{{url('/posts/'.$post->id.'/details')}}" style="text-decoration: none">
        <div class="latest-post">
          <img src="{{asset('storage/post-images/'.$post->image)}}"
            alt="{{$post->image}}"  />
          <small>{{date('d-M-Y',strtotime($post->created_at))}}  </small>
          <p>
            <strong>
              {{$post->title}}
            </strong>
          </p>
          <p>
            {{substr($post->content,0,150)}}...
          </p>
        </div>
      </a>
    </div>
  @endforeach
</div>
@endsection