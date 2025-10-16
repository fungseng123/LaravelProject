@extends('layouts.app')

@section('title', 'Admin - Enquiry Management')

@section('content')
    <!-- Admin Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.enquiries.index') }}">Enquiries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Admin content -->
    <div class="container py-4">
        @yield('admin_content')
    </div>
@endsection