@extends('layout.dashboard')
@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card p-4 " style="width: 500px;">
            <h1 class="text-center mb-4">Edit Product</h1>
            <form method="POST" action="{{ route('produits.update',['id'=> $Produit->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Produit Name:</label>
                    <input type="text" class="form-control" id="name" name="nom" required value="{{ $Produit->nom }}">
                </div>

                <div class="mb-3">
                    <label for="Prix" class="form-label">Prix :</label>
                    <input type="number" class="form-control" id="Prix" name="Prix" required value="{{ $Produit->prix }}">
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description:</label>
                    <textarea id="Description" name="Description" class="form-control" rows="4" required>{{ $Produit->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Choisir une image à uploader :</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                </div>
                <input type="text" name="id" hidden value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary w-100">Edit Product</button>
            </form>
        </div>
    </div>
@endsection








