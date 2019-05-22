<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="{{ url('/') }}">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
                    @guest
                        <li><a href="{{ route('viewfile')}}" class="nav-link">File</a></li>
                    @else
                    <!-- Left Side Of Navbar -->
                  
                        <li><a href="{{ route('post')}}" class="nav-link">CRUD</a></li>
                         <li><a href="{{ route('viewfile')}}" class="nav-link">File</a></li>
                         <li><a href="{{ route('viewload')}}" class="nav-link">LoadMore</a></li>
                         <li><a href="{{ route('autocomplete')}}" class="nav-link">Autocomplete</a></li>
                    @endguest

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>