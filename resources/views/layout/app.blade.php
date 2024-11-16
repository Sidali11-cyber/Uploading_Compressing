<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg bg-light border-bottom">
                <div class="container-fluid d-flex align-items-center">
                    <!-- Left: Logo and "All products" button -->
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <a href="{{ route('geust') }}" class="btn btn-outline-primary ms-2">All products</a>
                    <!-- Center: Separator Line -->
                    <div class="flex-grow-1 d-flex justify-content-center">
                        <hr class="w-50 mx-3 my-0 border-dark">
                    </div>
                    <!-- Right: Register and Login Buttons -->
                    <div>
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary me-2">Register</a>
                        <a href="{{ route('login') }}" type="button" class="btn btn-secondary">Login</a>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>