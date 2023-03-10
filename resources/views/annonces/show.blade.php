<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Annonce</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-outline-success me-2" type="button" href="{{ route('annonces.home') }}">Home</a>
    </div>
</nav>
<div class="container">
        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
        <div class="row justify-content-center">
            <button type="button" class="btn btn-primary">
                <a href="{{ route('annonces.home') }}">Retour à la liste des annonces</a>
            </button>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Annonce') }}</div>
                        <div class="card-body">
                            <ul>
                                <li>{{ $annonce->title }}</li>
                                <li>{{ $annonce->name }}</li>
                                <li>{{ $annonce->location }}</li>
                                <li>{{ $annonce->description }}</li>
                                <li>{{ $annonce->price }}</li>
                                <li>{{ $annonce->created_at }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
