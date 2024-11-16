@extends('layout.dashboard')
@section('content')
<div class="container my-5" style="background: #F2F7FF">
    <div class="row justify-content-center">
        @foreach ($myProducts as $Produit)
            <!-- Product -->
            <div class="container mt-5">
                <div class="card mb-3">
                    <div class="row no-gutters" style="width: 100%;">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $Produit->image_path) }}" class="card-img" alt="iPhone 15 Pro" style="max-width: 300px; max-height: 300px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$Produit->nom}}</h5>
                                <p class="card-text">{{$Produit->description}}</p>
                                <p class="card-text"><strong>{{$Produit->prix}} $</strong></p>
                                <p class="card-text"><strong>Published by : </strong></p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- User Image and Name -->
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $Produit->user->image_path) }}" class="rounded-circle" alt="User Image" style="width: 30px; height: 30px; object-fit: cover;">
                                        <p class="mb-0 ms-2 fw-bold" style="line-height: 1;">{{ $Produit->user->name }}</p>
                                    </div>
                                    <!-- Buttons for Edit and Delete -->
                                    <div class="d-flex">
                                        <a href="{{ route('produits.edit', ['id' => $Produit->id]) }}" style="text-decoration: none; margin-right: 5px;">
                                            <button type="button" class="btn btn-danger">Edit</button>
                                        </a>
                                        <form action="{{ route('produits.destroy', ['id' => $Produit->id]) }}" method="POST" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="id" hidden value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection