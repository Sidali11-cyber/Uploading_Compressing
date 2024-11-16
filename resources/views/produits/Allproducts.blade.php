@extends('layout.dashboard')
@section('content')
<div class="container my-5" style="background-color: #F2F7FF">
    <div class="row justify-content-start">
        @foreach ($allProduits as $Produit)
        <!-- Product -->
        <div class="col-md-4 mb-4" style="width: 260px;" >
            <div class="card">
                <img src="{{ asset('storage/' . $Produit->image_path) }}" class="card-img-top" alt="Sony Headphones" style="max-width: 250px; max-height: 250px;">
                <div class="card-body">
                    <h5 class="card-title">{{$Produit->nom}}</h5>
                    {{-- <p class="card-text">{{$Produit->description}}</p> --}}
                    <p class="card-text"><strong>{{$Produit->prix}} $</strong></p>
                    <p class="card-text"><strong>Published by : </strong></p>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $Produit->user->image_path) }}" class="rounded-circle" alt="User Image" style="width: 30px; height: 30px; object-fit: cover;">
                        <p class="mb-0 ms-2 fw-bold" style="line-height: 1;">{{ $Produit->user->name }}</p>
                        <a href="#" class="btn btn-primary btn-sm ms-auto">More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection



