<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Lupa</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="text-center">

    <main class="container pt-5">
        @if($message = session('status'))
            <div class="alert alert-success my-2 text-success" role="alert">{{ $message }}</div>
        @endif
        <div class="card card-sm">
            <form class="card-body" action="{{ route('forgot-password') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Lupa Password</h1>

                <div>
                    <label for="floatingInput">Email address</label>
                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="floatingInput" placeholder="name@example.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg mt-4 btn-primary" type="submit">Send Email Link</button>
            </form>
        </div>
    </main>
</body>

</html>
