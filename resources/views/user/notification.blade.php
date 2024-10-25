@extends('components.user-components.layout')
@push('assets')
    <link rel="stylesheet" href="/css/user-css/notification.css">
@endpush
@section('content')
    <div class="page-content">
        <x-user-components.page-title>NOTIFICATION</x-user-components.page-title>
        <ul>
            @if (!empty($notifications))
                @foreach ($notifications as $notification)
                    <li>
                        <div class="mobile-notification">
                            <span>{{ $notification->data['notification_type'] ?? 'No message' }}</span><br>
                            {{ $notification->data['message'] ?? 'No message' }}<br>
                            {{ $notification->additional_message ?? 'No message' }}<br>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            :
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#{{ $notification->id }}">View</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            @else
                <div class="d-flex flex-column text-center p-3">
                    <i class='bx bx-bell-off' style="font-size: 100px"></i>
                    <p>No notifications found.</p>
                </div>
            @endif
        </ul>
    </div>
@endsection
@push('assets')
@endpush
