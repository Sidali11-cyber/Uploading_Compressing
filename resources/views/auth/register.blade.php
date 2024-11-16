@extends('layout.app')
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 " style="width: 500px;">
        <h1 class="text-center mb-4">Inscription</h1>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Choisir une image à uploader :</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
        <a style="margin: auto" class="mt-4" href="{{ route('login') }}">Déjà un compte ? Connectez-vous</a>
    </div>
</div>
@endsection
