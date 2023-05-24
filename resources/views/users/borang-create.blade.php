<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kursus Laravel INTAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <h1>Registration</h1>

        @include('layouts.alerts')

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
              <input type="text" class="form-control" name="nama" placeholder="Username">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="mb-3">
                <select class="form-control" name="role">
                    <option>--Select role--</option>

                    @foreach (\App\Models\User::senaraiRole() as $key => $value )
                    <option value="{{$key}}">{{$value}}</option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <select class="form-control" name="status">
                    <option>--Select status--</option>

                    @foreach (\App\Models\User::senaraiStatus() as $key => $value )
                    <option value="{{$key}}">{{$value}}</option>

                    @endforeach

                </select>
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>