<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid justify-content-start">
        <h1 class="navbar-brand">Home</h1>
    </div>
</nav>
<div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn">
                    <a href="{{ route('annonces.create') }}">Créer une annonce</a>
                </button>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if (count($annonces) > 0)
                            @foreach ($annonces as $annonce)
                                <div class="card">
                                    <div class="card-header">{{ $annonce->created_at }}</div>
                                    <div class="card-body">
                                        <div class="card-title">{{ $annonce->title }}</div>
                                        <div class="card-text">
                                            <p>{{ $annonce->description }}</p>
                                            <span>{{ $annonce->price }} €</span>
                                            <h5>{{ $annonce->location }}</h5>
                                        </div>
                                        <a class="btn btn-outline-warning" href='mailto:{{ $annonce->email }}'>contacter {{ $annonce->name }}</a>
                                        <a class="btn btn-primary" href="{{ route('annonces.show', $annonce->id) }}">Voir l'annonce</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Aucune annonce n'a été trouvée.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
