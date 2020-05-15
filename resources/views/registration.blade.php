<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <title>WhizNews - Admin Register </title>
</head>
<body>
    <div class="login__page">
        <div class="row">
            <div class="col s12 m4">
                <div class="card-panel white" style="width:max-content">
                    <h3 class="center card-title">WhizNews <small>Register</small></h3>
                    @if (session('status'))
                        <div class="center red white-text">
                        {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <form action="{{url('post-registration')}}" class="col s12" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12">
                                  <input id="username" type="text" class="validate" name="username" required>
                                  <label for="username">Username</label>
                                </div>
                                <div class="input-field col s12">
                                  <input id="password" type="password" class="validate" name="password" required>
                                  <label for="password">Password</label>
                                </div>
                            </div>
                            
                            <button class="btn blue waves-effect waves-light right" type="submit">Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>