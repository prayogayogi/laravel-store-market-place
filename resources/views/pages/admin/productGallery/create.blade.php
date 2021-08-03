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
              <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Name Product</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Pemilik Product</label>
                      <select name="users_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Kategori Product</label>
                      <select name="categories_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Product</label>
                      <input type="number" name="price" id="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="harga">Deskrippsi Product</label>
                      <textarea name="description" id="editor"></textarea>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'editor' );
</script>
@endpush
