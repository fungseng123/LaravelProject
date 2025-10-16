@extends('layouts.appadmin')

@section('admin_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Reply to Enquiry</h2>
            </div>
            <div class="card-body">
                <h5>From: {{ $enquiry->name }} ({{ $enquiry->email }})</h5>
                <p class="card-text"><strong>Original Question:</strong></p>
                <p class="card-text">{{ $enquiry->question }}</p>

                <form action="{{ route('admin.enquiries.reply', $enquiry->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="admin_reply"><strong>Your Reply:</strong></label>
                        <textarea class="form-control" id="admin_reply" name="admin_reply" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Send Reply</button>
                    <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
