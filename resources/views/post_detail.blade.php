<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          </li>
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/post') }}">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/mypost') }}">My Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <form method=="POST" action="/rating/store">
      {{ csrf_field() }}
        <img src="{{asset('img/' . $detail->foto)}}" width="350px" height="200px">
        <div class="post-preview">
          <a>
            <h2 class="post-title">
              {{ $detail->judul }}
            </h2>
            <h3 class="post-subtitle">
              {{ $detail->konten }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $detail->user->name }}</a>
            on {{ $detail->created_at->toDateString() }} <br> Rating : {{ round($score,2) }}</p>
        </div>
        
        <div class="form-group">
                            <input type="hidden" name="postID" class="form-control" placeholder="User ID Konten ..." value="{{ $detail->postID }}">

                            @if($errors->has('id'))
                                <div class="text-danger">
                                    {{ $errors->first('id')}}
                                </div>
                            @endif

                        </div>

        <hr>
        <!-- Pager -->
        @if (Auth::check())
        @if(Auth::user()->id== $detail->id )
        <div class="clearfix">
          <a class="btn btn-warning float-right" href="/edit/{{ $detail->postID }}" style="margin-left: 10px;">Edit &rarr;</a>
          <a class="btn btn-danger float-right" href="/post/hapus/{{ $detail->postID }}">Delete &rarr;</a>
        </div>
        @else

          <div class="form-group">
            <label>Komentar</label>
            <textarea name="komen" class="form-control" placeholder="Isi komentar anda ..." rows="6"></textarea>
            @if($errors->has('komen'))
            <div class="text-danger">
            {{ $errors->first('komen')}}
            </div>
            @endif
          </div>

          <div class="form-group">
            <label>Rate</label>
            <select type="text" name="rateValue" class="form-control" placeholder="Label Konten ...">
              <option value="1" selected>1</option>
              <option value="2" selected>2</option>
              <option value="3" selected>3</option>
              <option value="4" selected>4</option>
              <option value="5" selected>5</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Kirim">
          </div>
        <div class="clearfix">
        </div>
        </form>
        @foreach($rate as $data)
        <div class="card" style="width: 28rem; margin-bottom: 10px;">
          <div class="card-body">
            <!-- <h5 class="card-title">{{ $data->user->email }}</h5> -->
            <h6 class="card-subtitle mb-2 text-muted">{{ $data->user->email }}</h6>
            <p class="card-text">{{ $data->komen }}</p>
          </div>
        </div>
        @endforeach
        @endif
        @else
        @foreach($rate as $data)
        <div class="card" style="width: 28rem; margin-bottom: 10px;">
          <div class="card-body">
            <!-- <h5 class="card-title">{{ $data->user->email }}</h5> -->
            <h6 class="card-subtitle mb-2 text-muted">{{ $data->user->email }}</h6>
            <p class="card-text">{{ $data->komen }}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('js/clean-blog.min.js')}}"></script>

</body>

</html>

