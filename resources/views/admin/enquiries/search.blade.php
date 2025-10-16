@extends('layouts.appadmin')

@section('admin_content')
    <div class="container">
        <h1>Search Results</h1>
        <p>Search results for: "{{ $query }}"</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquiries as $enquiry)
                <tr>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ Str::limit($enquiry->question, 50) }}</td>
                    <td>
                        @if($enquiry->viewed_by_admin)
                            <span class="badge bg-success">Viewed</span>
                        @else
                            <span class="badge bg-warning">New</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" 
                           class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary">Back to All Enquiries</a>
    </div>
@endsection
