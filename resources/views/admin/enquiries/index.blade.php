@extends('layouts.appadmin')

@section('admin_content')
    <div class="container">
        <h1>Enquiries</h1>

        <!-- Search Form -->
        <form action="{{ route('admin.enquiries.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search enquiries...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

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
                @foreach ($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ Str::limit($enquiry->question, 50) }}</td>
                        <td>
                            @if ($enquiry->viewed_by_admin)
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
    </div>
@endsection
