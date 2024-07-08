<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Create</title>
  </head>
  <body>
    <h1 class="text-center">CRUD Create</h1>

    <div class="container">
        <form action="{{ route('cars.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input name="name" value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name">
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <select name="company" id="company" class="form-select {{ $errors->has('company') ? 'is-invalid' : '' }}" aria-label="Default select example">
                    <option>Select Company</option>
                    @foreach ($companies as $company)
                        <option @selected($company->id == old('company')) value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="license_plate" class="form-label">License Plate</label>
              <input name="license_plate" value="{{ old('license_plate') }}" type="text" class="form-control {{ $errors->has('license_plate') ? 'is-invalid' : '' }}" id="license_plate">
              @error('license_plate')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="model" class="form-label">Model</label>
              <input name="model" value="{{ old('model') }}" type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" id="model">
              @error('model')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input name="color" value="{{ old('color') }}" type="text" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color">
              @error('color')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
              @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
