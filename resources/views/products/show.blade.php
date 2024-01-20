@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between mb-3">
          <h3 class="text-primary">{{$product ->name}}</h3>
          <a href="/" class="btn btn-success"
            ><i class="bi bi-arrow-return-left"></i> Back</a
          >
        </div>
        <hr />
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="/" class="text-decoration-none"
                >{{$product ->name}}</a
              >
            </li>
          </ol>
        </nav>

        <!-- product form start-->
        <div class="card mobile">
          <img src="/{{$product ->image}}" alt="{{$product ->name}}" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title">{{$product ->name}}</h5>
            <p class="card-text">
              {{$product ->description}}
            </p>
            <h5>€ {{$product ->price}}</h5>
            <div class="mt-3 gap-3">
              <button class="btn btn-info">Add to Cart</button>
              <button class="btn btn-outline-warning">Buy Now</button>
            </div>
          </div>
        </div>
        <!-- product form end-->

@endsection
