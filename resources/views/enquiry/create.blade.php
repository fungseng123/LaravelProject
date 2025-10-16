@extends('layouts.app')

@section('title', 'Submit Enquiry')

@section('content')
<div class="container mt-4">

    {{-- Enquiry Form --}}
    <div class="card mb-5">
        <div class="card-header">
            <h4>Submit a New Enquiry</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('enquiries.store') }}" method="POST">
                @csrf

                <!-- Autofill with authenticated user info -->
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Your Name" 
                        value="{{ old('name', Auth::user()->name) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" placeholder="Your Email" 
                        value="{{ old('email', Auth::user()->email) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <textarea name="question" placeholder="Your Question" 
                              class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Enquiry</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    {{-- Enquiries Table --}}
    <div class="card">
        <div class="card-header">
            <h4>Your Previous Enquiries</h4>
        </div>
        <div class="card-body">
            @if($enquiries->isEmpty())
                <p>You haven't submitted any enquiries yet.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Question</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td>{{ $enquiry->question }}</td>
                                <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <a href="{{ route('enquiries.edit', $enquiry->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

</div>
@endsection
