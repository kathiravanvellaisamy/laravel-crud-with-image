@extends('layouts.app')
@section('main')

        <div class="d-flex justify-content-between">
          <h3><i class="bi bi-phone-vibrate-fill"></i> Product Details</h3>
          <a href="products/create-product" class="btn btn-primary"
            ><i class="bi bi-plus-circle-dotted"></i> New Product</a
          >
        </div>

        <!-- product table start-->
        <div class="col-md-12 table-responsive mt-3">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>S No</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              @php
                  $index = ($products->currentPage()-1) * $products->perPage() + $loop->iteration;
              @endphp
                  <tr>
                <td>{{$index}}</td>
                <td>
                  <img
                    src="{{$product->image}}"
                    style="width: 80px; height: 100px; object-fit: contain"
                    alt="{{$product->name}}"
                    srcset=""
                  />
                </td>
                <td>
                  <a href="products/show/{{$product->id}}/" class="text-decoration-none"
                    >{{ $product->name}}</a
                  >
                </td>
                <td>€ {{ $product->price}}</td>
                <td>
                  <div class="d-flex gap-3">
                    <a href="products/edit/{{$product->id}}/" class="btn btn-secondary"
                      ><i class="bi bi-pencil-fill"></i
                    ></a>
                    <a href="products/delete/{{$product->id}}/" onclick="return confirm('Are you sure to delete {{$product->name}}')" class="btn btn-danger"
                      ><i class="bi bi-trash3-fill"></i
                    ></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$products->links()}}
        </div>

@endsection
