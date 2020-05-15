<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <title>WhizNews - @yield('title') </title>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <div class="container">
            {{-- <a href="#" class="brand-logo"><img src="{{ asset('assets/icon/interface.svg') }}" alt=""></a> --}}
            <a href="/" class="brand-logo"><i class="material-icons">web</i> WhizNews</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down --nav">
                    <div class="--search">
                        <form method="GET" action="/search">
                            <div class="input-field">
                                <input id="search" type="search" name="value" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                    @if(Auth::check())
                    <li><a href="/admin">Admin Panel</a></li>
                    <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="{{route('login')}}">Admin Login</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
      </nav>
      <div class="container white">
        
          @yield('content')
          
       </div>
       
       <footer class="page-footer grey darken-4">
        <div class="footer-copyright">
          <div class="container">
          &copy; Wisnu Murfadilah R 2020
          <div class="right">UTS Atol - 10118325</div>
          </div>
        </div>
      </footer>

      {{-- <footer class="footer grey darken-4  white-text">
          <div class="container">
              <div class="right">
                  &copy; Wisnu M R 2020
              </div>
          </div>
      </footer> --}}
      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      @yield('js')
</body>
</html>