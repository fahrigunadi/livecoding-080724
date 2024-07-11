<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Reset</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="text-center">

    <main class="container pt-5">
        <div class="card card-sm">
            <form class="card-body" action="{{ route('password.store') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please Reset</h1>

                <input name="token" type="hidden" value="{{ request('token') }}">

                <div>
                    <label for="floatingInput">Email address</label>
                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="floatingInput" placeholder="name@example.com" value="{{ old('email', request('email')) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="floatingPassword">Password</label>
                    <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="floatingPassword" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="floatingPassword">Password Confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="floatingPassword" placeholder="Password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </main>
</body>

</html>
