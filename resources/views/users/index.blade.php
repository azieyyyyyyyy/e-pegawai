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
        <h1>Senarai Users</h1>

        <x-alert :type="$type" :message="$message" />

        <hr>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        <br><br>


        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th>NO PEKERJA</th>
                    <th>STATUS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse (($senaraiUsers) as $user)
                    <tr>
                        <td>{{ $user->nama}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->role}}</td>
                        <td>{{ $user->no_pekerja}}</td>
                        <td>{{ $user->status}}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">
                                View
                            </a>

                            @can('update', $user)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">
                                    Edit
                                </a>
                            @endcan

                            @can('delete', $user)
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info">
                                Tiada Rekod
                            </div></td></tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
