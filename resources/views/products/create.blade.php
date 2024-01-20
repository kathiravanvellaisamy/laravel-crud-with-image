@extends('layouts.app')
@section('main')

        <div class="d-flex justify-content-between mb-3">
          <h3><i class="bi bi-node-plus-fill"></i> Add Product</h3>
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
              <a href="/" class="text-decoration-none">Add new Product</a>
            </li>
          </ol>
        </nav>
        <form action="/products/store" method="post" class="my-4" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="form-label" for="name">Product Name</label>
                <input type="text" name="name" id="name"
                class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" />
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
                @endif
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="sku">SKU</label>
                <input type="text" name="sku" value="{{ old('name')}}" id="sku" class="form-control  @if($errors->has('name')) {{'is-invalid'}} @endif" />
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('sku')}}
                </div>
                @endif
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea
                  name="description"
                  id="description"
                  class="form-control  @if($errors->has('description')) {{'is-invalid'}} @endif"
                  rows="4"
                ></textarea>
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="form-label" for="price">Price</label>
                <input
                  type="text"
                  name="price"
                  id="price"
                  class="form-control  @if($errors->has('price')) {{'is-invalid'}} @endif"
                />
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
                @endif
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="sprice">Selling Price</label>
                <input
                  type="text"
                  name="sprice"
                  id="sprice"
                  class="form-control  @if($errors->has('sprice')) {{'is-invalid'}} @endif"

                />
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('sprice')}}
                </div>
                @endif
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="image">Product Picture</label>
                <input type="file" name="image" id="image" class="form-control  @if($errors->has('image')) {{'is-invalid'}} @endif" />
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
                @endif
              </div>
            </div>
          </div>
          <button class="btn btn-info">Save Product</button>

          <button class="btn btn-warning" type="reset">Reset All</button>
        </form>

@endsection
