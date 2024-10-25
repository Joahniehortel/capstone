@extends('components.user-components.layout')
@push('assets')
    <link rel="stylesheet" href="/css/user-css/announcement.css">
@endpush
@section('content')
    <div class="page-content">
        <x-user-components.page-title style="font-size: 25px;">ANNOUNCEMENTS</x-user-components.page-title>
        <div class="list">
            @if ($announcements->isNotEmpty())
                <div>
                    <ul class="announcement-list-container w-100">
                        @foreach ($announcements as $index => $announcement)
                            <li>
                                <div class="announcement-container">    
                                    <div class="row">
                                        <div class="col-12 col-md-2 text-center mb-3 mb-md-0">
                                            @if(!empty($announcement->image_path))
                                                <img src="{{ Storage::url($announcement->image_path) }}" alt="Announcement Image" class="img-fluid">
                                            @else
                                                <img src="/images/barangaylogo.png" alt="Announcement Image" style="width: 150px" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-10">
                                            <h1 class="announcement_title" style="font-weight: bold; color:#6D4C41">{{ $truncatedAnnouncements[$index]['title'] }}</h1>
                                            <p style="font-size: 14px"><i class='bx bxs-calendar-check'></i>{{ \Carbon\Carbon::parse($announcement->created_at)->format('F j, Y') }}</p>
                                            <p class="announcement_content" style="font-weight: 400">{{ $truncatedAnnouncements[$index]['truncated_content'] }}</p>
                                            <x-admin-components.modal.view-announcement-user :announcement="$announcement" modalId="{{ $announcement->id }}"/>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" style="background: transparent; color:black; border:none;" data-bs-toggle="modal" data-bs-target="#{{ $announcement->id }}">View Details</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @if($announcements->isEmpty())
            <div class="no-announcements-container text-center">
                <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" style="width: 300px">
                <p>No announcements available at this time.</p>
            </div>
        @endif    
    </div>
@endsection
