@extends('layouts.app')
@section('title', 'Submit Enquiry')

@section('content')
<h1>Enquiries List</h1>

@foreach ($enquiries as $enquiry)
    <div style="margin-bottom: 1rem; padding: 1rem; border: 1px solid #ccc;">
        <p><strong>Name:</strong> {{ $enquiry->name }}</p>
        <p><strong>Email:</strong> {{ $enquiry->email }}</p>
        <p><strong>Question:</strong> {{ $enquiry->question }}</p>

        <!-- Edit Button -->
        <a href="{{ url('/enquiry/' . $enquiry->id . '/edit') }}" class="btn btn-warning">Edit</a>

        <!-- Delete Form -->
        <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enquiry?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endforeach
@endsection
