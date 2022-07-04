@extends('layouts.admin')

@section('title','Edit User')

@section('content')
{{-- Page content --}}
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">User</h2>
            <p class="dashboard-subtitle">
                Edit User
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name User</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email User</label>
                                            <input type="email" name="email" id="email" class="form-control"  value="{{ $item->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password User</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        <small>Kosongkan jika tidak ingin mengganti password</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Roles</label>
                                            <select name="roles" required class="form-control">
                                                <option value="{{ $item->roles }}" selected>Tidak Diganti</option>
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
