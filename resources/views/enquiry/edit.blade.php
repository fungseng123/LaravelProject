@extends('layouts.app')

@section('title', 'Submit Enquiry')

@section('content')
<h1>Edit Enquiry</h1>

<!-- Edit Enquiry Form -->
<form action="{{ route('enquiries.update', $enquiry->id) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" name="name" id="name" value="{{ $enquiry->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" name="email" id="email" value="{{ $enquiry->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="question" class="form-label">Your Question</label>
        <textarea name="question" id="question" class="form-control" required>{{ $enquiry->question }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<!-- Delete Enquiry Form -->
<form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection
