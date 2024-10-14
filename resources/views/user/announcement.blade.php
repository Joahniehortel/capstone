@extends('components.user-components.layout')
@push('assets')
    <link rel="stylesheet" href="/css/user-css/announcement.css">
@endpush
@section('content')
    <div class="page-content">
        <x-user-components.page-title>ANNOUNCEMENTS</x-user-components.page-title>
        @if ($announcements->isNotEmpty())
            <div>
                <div class="announcement-list-container w-100">
                    @foreach ($announcements as $index => $announcement)
                        <div class="announcement-container">
                            <h1 class="announcement_title" style="font-weight: bold; color:#6D4C41">{{ $truncatedAnnouncements[$index]['title'] }}</h1>
                            <p style="font-size: 14px"><i class='bx bxs-calendar-check'></i>{{ \Carbon\Carbon::parse($announcement->created_at)->format('F j, Y') }}</p>
                            <p class="announcement_content" style="font-weight: 400">{{ $truncatedAnnouncements[$index]['truncated_content'] }}</p>
                            <button class="btn btn-primary w-100" style="background: transparent; color:black; border:none;" data-bs-toggle="modal" data-bs-target="#{{ $announcement->id }}">View Details</button>
                            <x-admin-components.modal.view-announcement-user :announcement="$announcement" modalId="{{ $announcement->id }}"/>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if($announcements->isEmpty())
            <div class="no-announcements-container text-center">
                <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" alt="">
                <p>No announcements available at this time.</p>
            </div>
        @endif    
    </div>
@endsection
