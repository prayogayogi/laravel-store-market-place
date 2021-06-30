@extends('layouts.admin')

@section('title','Add User')

@section('content')
{{-- Page content --}}
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Add User</h2>
      <p class="dashboard-subtitle">
        Create New User
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
              <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Name User</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="email user">Email User</label>
                      <input type="email" name="email" id="email user" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password User</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Roles</label>
                      <select name="roles" class="form-control">
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                      </select>
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
