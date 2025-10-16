@extends('layouts.appadmin')

@section('admin_content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Enquiry Details</h2>
            </div>
            <div class="card-body">
                <h5>From: {{ $enquiry->name }} ({{ $enquiry->email }})</h5>
                <p class="card-text"><strong>Question:</strong></p>
                <p class="card-text">{{ $enquiry->question }}</p>

                @if($enquiry->admin_reply)
                    <div class="mt-4">
                        <h5>Admin Reply:</h5>
                        <p>{{ $enquiry->admin_reply }}</p>
                    </div>
                @endif

                @if(!$enquiry->admin_reply)
                    <form action="{{ route('admin.enquiries.reply', $enquiry->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="admin_reply"><strong>Reply to this enquiry:</strong></label>
                            <textarea class="form-control" id="admin_reply" name="admin_reply" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send Reply</button>
                    </form>
                @endif
            </div>
        </div>

        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
