<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>
    <h1 class="text-center">CRUD</h1>

    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="{{ route('cars.create') }}" type="button" class="btn btn-primary">Create</a>
            <form method="GET" action="" class="d-flex">
                <input value="{{ request()->search }}" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        @if ($message = session('success'))
            <div class="alert alert-success my-2" role="alert">
                {{ $message }}
            </div>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Name</th>
                <th scope="col">License Plate</th>
                <th scope="col">Model</th>
                <th scope="col">Color</th>
                <th scope="col">Description</th>
                <th scope="col">Aksi</th>
                {{-- <th scope="col">Actions</th> --}}
              </tr>
            </thead>
            <tbody>
                @php
                    $no = $cars->firstItem();
                @endphp

                @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->company?->name }}</td>
                        <td>{{ $car->license_plate }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->color }}</td>
                        <td>{{ $car->description }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-warning" href="{{ route('cars.edit', $car) }}">Edit</a>

                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('cars.destroy', $car) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $cars->links() }}
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
