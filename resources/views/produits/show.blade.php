@extends('layout.app')
@section('content')
    <div class="mx-auto card mb-3 mt-5" style="width: 80%;">
        <div class="row g-0">
            <div class="col-md-4" style="width: fit-content;">
                <img style="width: 200px" src="{{ asset('storage/' . $produit->image_path) }}" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$produit->nom}}</h5>
                    <p class="card-text">{{$produit->description}}</p>
                    <p class="card-text"><h2><span class="badge rounded-pill text-bg-info">{{$produit->prix}} $</span></h2></p>
                </div>
            </div>
        </div>
    </div>
@endsection











