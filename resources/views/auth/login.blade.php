@extends('layout.app')
@section('content')
<div class="bg-light">
    @if (session('success'))
        <div style="width: 40%; margin:auto; margin-top:30px" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card p-4 " style="width: 500px;">
            <h1 class="text-center mb-4">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                </div>
    
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
            <a style="margin: auto" class="mt-4" href="{{ route('register') }}">Créer un compte</a>
        </div>
    </div>
</div>
@endsection