@extends('layouts.app')

@section('title', 'Enquiry Details')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Enquiry Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $enquiry->name }}</p>
            <p><strong>Email:</strong> {{ $enquiry->email }}</p>
            <p><strong>Question:</strong> {{ $enquiry->question }}</p>

            <!-- Only display admin reply if available -->
            @if($enquiry->admin_reply)
                <p><strong>Admin Reply:</strong> {{ $enquiry->admin_reply }}</p>
            @else
                <p><strong>Admin Reply:</strong> No reply yet.</p>
            @endif

            <!-- Back to the list of enquiries (admin view) -->
            <a href="{{ route('enquiry.create') }}" class="btn btn-secondary ms-2">Back to List</a>
        </div>
    </div>
</div>
@endsection
