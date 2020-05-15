<html>
  <head>
    <meta charset="UTF-8">
    <title>WhizNews - Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.js"></script>
    @yield('link')
  </head>

  <body>

    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="{{asset('assets/icon/back.jpeg')}}">
          </div>
         <img class="circle" src="{{asset('assets/icon/users.png')}}">
         <span class="white-text name">Welcome back,</span>
          <span class="white-text email">{{ Auth::user()->username }}</span>
        </div>
      </li>
      

      <li><a href="{{route('admin-dashboard')}}"><i class="material-icons blue-text">dashboard</i>Dashboard</a></li>
      <li><a href="{{route('add-news')}}"><i class="material-icons blue-text">add_box</i>Add News</a></li>
      <li><div class="divider"></div></li>
      <li><a href="/"><i class="material-icons blue-text">arrow_back</i>Home Page</a></li>
      <li><a href="/logout"><i class="material-icons blue-text">exit_to_app</i>Logout</a></li>

    </ul>
    <main>
      <section class="content">
        <div class="page-announce blue valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign"> @yield('name') </h1></div>
        <!-- Stat Boxes -->
            @yield('content')
        </div>
      </section>
    </main>
    <footer class="page-footer blue">
      <div class="footer-copyright">
        <div class="container">
          © 2020 Wisnu Murfadilah R - 10118325
        </div>
      </div>
    </footer>

        <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
        in the materialize js file & I don't want that.
        -->
        <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
        @yield('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script>
        // Hide sideNav
        $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
        });
          </script>
        </div>
      </body>
    </html>
