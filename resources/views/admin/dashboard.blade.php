@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/admin/products') }}" class="btn btn-primary btn-block mb-3">Manage Products</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/admin/posts') }}" class="btn btn-primary btn-block mb-3">Manage Posts</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/admin/users') }}" class="btn btn-primary btn-block mb-3">Manage Users</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/admin/comments') }}" class="btn btn-primary btn-block mb-3">Manage Comments</a>
        </div>
    </div>
@endsection
