<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .sidebar {
                height: 100vh;
                width: 250px;
                background-color: #0d6dfd56;
                color: #fff;
            }
            .sidebar a {
                color: #fff;
            }
            .sidebar .btn {
                color: #fff;
                background-color: #0D6EFD;
            }
            #x {
                height: 110em;
            }
            .d-flex {
                display: flex;
                justify-content: space-between; /* This will push the buttons to the left and right */
            }
        </style>
    </head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg border-bottom" style="background: #0d6dfd">
                <div class="container-fluid d-flex align-items-center">
                    <!-- Left: Logo and "All products" button -->
                    <a class="navbar-brand" style="color: #fff" href="#">Dashboard</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light ms-2">All products</a>
                    <!-- Center: Separator Line -->
                    <div class="flex-grow-1 d-flex justify-content-center">
                        <hr class="w-50 mx-3 my-0 border-dark">
                    </div>
                    <!-- Right: Register and Login Buttons -->
                    <form action="{{ route('logout') }}" method="POST" style="margin:auto;">
                        @csrf
                        <button type="submit" class="btn btn-secondary" >Logout</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column p-3" id="x" style="background: #F2F7FF">
                <div class="container d-flex justify-content-center mt-5">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-header bg-primary text-white">
                            <h6>Welcome, {{ Auth::user()->name }}</h6>
                        </div>
                        <img src="{{ asset('storage/' . Auth::user()->image_path) }}" class="card-img-top rounded-circle mx-auto mt-3" alt="Profile Picture" style="width: 100px; height: 100px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="card-text text-muted">E-commerce trader</p>
                            <form method="GET" action="{{ route('produits.myProducts') }}">
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-outline-primary mt-3">My products</button>
                            </form>
                            <a href="{{ route('produits.create') }}" class="btn btn-outline-primary mt-3">Add products</a>
                        </div>
                        </div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="flex-grow-1 p-4">
                @yield('content')
            </div>
        </div>
        <div>
            <!-- Footer Text -->
            <div class="mt-auto" class="navbar navbar-expand-lg border-bottom" style="">
                <p class="small" style="text-align: center;margin:0%">
                    &copy; 2024 All rights reserved 
                </p>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>





