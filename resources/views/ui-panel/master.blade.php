<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- HEADER SECTION-->
          <div class="header">
            <div class="row">
              <div class="col-md-2"></div>
              <div
                class="col-md-4 d-flex justify-content-center align-items-center"
              >
                <img src="{{asset('images/profile.png')}}" id="headerImg" alt="" style="border-radius:50%;" />
              </div>
              <div
                class="col-md-4 d-flex justify-content-center align-items-center"
              >
                <div>
                  <p class="hello">HELLO!</p>
                  <p class="itme">IT'S ME</p>
                  <p class="yms">Thu Ta Ye Yint</p>
                  <p class="hc">The Luminous</p>
                  <br />
                  <a href="{{url('/posts')}}">
                    <button class="btn btn-info">
                      <i class="fa fa-plus-circle"></i>
                      Explore My Blogs
                    </button>
                  </a>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
          </div>

          <!-- NAVBAR SECTION -->
          <div class="position-sticky" id="navbar">
            <a href="{{url('/')}}">HOME</a>
            <a href="{{url('/posts')}}">BLOGS</a>

            @if(Auth::check())
              <a href="{{url('/register')}}" class="float-end">{{strtoupper(Auth::user()->name)}}</a>
              <a class="float-end" onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')){document.getElementById('logout-form').submit();}">LOGOUT</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
            @else
              <a href="{{url('/register')}}" class="float-end">REGISTER</a>
              <a href="{{url('/login')}}" class="float-end">LOGIN</a>
            @endif
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-12">
                @yield('content')
              </div>
            </div>
          </div>

          <!-- FOOTER SECTION  -->
          <div class="footer">
            <div class="row">
              <div class="col-sm-12 col-md-4 mb-4">
                <h5>ABOUT THIS WEBSITE</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Beatae sequi, architecto laborum excepturi molestiae dolore?
                  Beatae distinctio.
                </p>
              </div>

              <div class="col-sm-12 col-md-4 mb-4">
                <h5>CONTACT INFO</h5>
                <span> <i class="fas fa-mobile-alt"></i> 09-787-042-890 </span>
                <br />
                <span>
                  <i class="far fa-envelope"></i> mario.thuta@gmail.com
                </span>
              </div>

              <div class="col-sm-12 col-md-4">
                <h5>FOLLOW ME ON</h5>
                <a
                  href="https://www.facebook.com/ye.m.soe.96387/"
                  target="_blank"
                >
                  <i class="fab fa-facebook-square"></i>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a
                  href="https://www.instagram.com/yemyintsoe_salai/"
                  target="_blank"
                >
                  <i class="fab fa-instagram-square"></i>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a
                  href="https://www.linkedin.com/in/ye-myint-soe-28a2aa1a0/"
                  target="_blank"
                >
                  <i class="fab fa-linkedin"></i>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="">
                  <i class="fab fa-twitter-square"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- CUSTOMS JS  -->
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
