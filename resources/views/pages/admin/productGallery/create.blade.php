@extends('layouts.admin')

@section('title','Add Product')

@section('content')
{{-- Page content --}}
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Add Product</h2>
        <p class="dashboard-subtitle">
            Create New Product
        </p>
        </div>
        <div class="dashboard-content">
        <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <div class="card">
            <div class="card-body">
                <form action="{{ route('product-gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="name">Product</label>
                        <select name="products_id" class="form-control">
                            @foreach ($product as $products)
                                <option value="{{ $products->id }}">{{ $products->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="harga">Photo product</label>
                        <input type="file" name="photos" id="harga" class="form-control" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
