@extends('layouts.app')

@section('title', 'Session Test')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 m-0">Session Data</h2>
        </div>
        <div class="card-body">
            <h3 class="h5 mb-4">Authentication Status</h3>
            <div class="mb-4">
                <p><strong>Is Authenticated:</strong> {{ $sessionData['is_authenticated'] ? 'Yes' : 'No' }}</p>
                @if($sessionData['user'])
                    <div class="alert alert-info">
                        <h4 class="h6">Logged In User Details:</h4>
                        <pre class="mb-0">{{ print_r($sessionData['user']->toArray(), true) }}</pre>
                    </div>
                @endif
            </div>

            <h3 class="h5 mb-3">Session Details</h3>
            <div class="mb-4">
                <p><strong>Session ID:</strong> {{ $sessionData['session_id'] }}</p>
                <p><strong>Last Activity:</strong> 
                    @if($sessionData['last_activity'])
                        {{ date('Y-m-d H:i:s', $sessionData['last_activity']) }}
                    @else
                        Not available
                    @endif
                </p>
            </div>

            <h3 class="h5 mb-3">All Session Data</h3>
            <div class="bg-light p-3 rounded">
                <pre class="mb-0" style="white-space: pre-wrap;">{{ print_r($sessionData['all_session_data'], true) }}</pre>
            </div>
        </div>
    </div>
</div>
@endsection