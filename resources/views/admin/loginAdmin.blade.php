<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Admin Login</h2>
            <form action="loginAdmin" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>

        </div>

    </div>
</div>

  <script src="{{ asset('js/app.js') }}" defer></script>
