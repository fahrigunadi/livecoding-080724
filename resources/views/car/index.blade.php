<x-layouts.app>
    <span class="hai-guys"></span>
    <x-layouts.sidebar />
        <div class="d-flex justify-content-between">
            @can('admin')
                <a href="{{ route('cars.create') }}" type="button" class="btn btn-primary">Create</a>
            @endcan
            <form onsubmit="return confirm('Are you sure logout?')" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
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
                        <td>{{ $car->company?->name }}</td>
                        <td>{{ $car->name }}</td>
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
</x-layouts.app>
