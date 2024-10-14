@extends('components.user-components.layout')

@push('assets')
    <link rel="stylesheet" href="/css/user-css/home.css">
@endpush

@section('title', 'Home')

@section('content')
    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="hero-section">
        <div class="text-container">
            <h1 class="fs-1">Welcome to <span class="logo-name">EBARRIO</span>!</h1>
            <p>eBarrio simplifies barangay services, letting you request documents, <br> file complaints, and stay updated
                with ease.</p>
            <a href="{{ route('user.request') }}" class="cta-btn">Request Now</a>
        </div>
    </div>
    <div class="about">
        <div class="d-flex text-center">
            <div>
                <img class="about-image" src="/images/undraw_team_work_k80m.png" alt="">
            </div>
            <div>
                <div class="about-text-container align-items-center">
                    <div class="section-details">
                        <h1 class="fs-3" class="page-title" style="font-weight: 600">About us</h1>
                        <p>Committed to the community.</p>
                    </div>
                    <div class="d-flex flex-column gap-2 details">
                        <p class="text-start"><span style="color: # ; font-weight:600">EBARRIO </span>is an innovative
                            digital platform designed to enhance the efficiency and accessibility of
                            barangay services for residents. By leveraging technology, eBarangay allows community members
                            to:
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">1</span>
                            <div class="text-start">
                                <span class="text-start" style="font-weight: 600">Request Documents</span>
                                <p>Easily submit requests for barangay IDs, clearances, and certificates online.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">2</span>
                            <div class="text-start">
                                <span style="font-weight: 600">Manage Complaints</span>
                                <p>Report issues directly to barangay officials and track the resolution process.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">3</span>
                            <div class="text-start">
                                <span style="font-weight: 600">Stay Informed</span>
                                <p>Access important announcements and updates from the barangay administration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-start mt-3">
                        <a class="readMore" href="{{ route('about') }}">Read more <i id="read-more-icon"
                                class='bx bx-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="feature-section">
        <div class="section-details text-center">
            <h1 class="fs-3">Key Features</h1>
            <p class="fs-7">"Simplifying your experience"</p>
        </div>
        <div class="features">
            <div class="feature">
                <i class='bx bx-building-house'></i>
                <h1 class="fs-5">Resident Management</h1>
                <p>
                    This feature allows for the efficient management of resident information within the barangay.
                    It includes functionalities for registering new residents, updating their details, and organizing
                    their records.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-folder-open'></i>
                <h1 class="fs-5">Document Management</h1>
                <p>
                    This feature facilitates the creation, storage, and retrieval of various documents issued by the
                    barangay, such as IDs, clearances, certificates, and other official documents.
                </p>
            </div>
            <div class="feature">
                <i class='bx bxs-megaphone'></i>
                <h1 class="fs-5">Announcement</h1>
                <p>
                    The Announcement feature allows barangay officials to broadcast important information and updates to
                    residents.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-archive'></i>
                <h1 class="fs-5">Request and Complaint Management</h1>
                <p>
                    This feature allows for the efficient management of resident information within the barangay.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-chart'></i>
                <h1 class="fs-5">Descriptive Analytics</h1>
                <p>The Descriptive Analytics feature offers insights into various aspects of barangay operations by
                    summarizing historical data.</p>
            </div>
            <div class="feature">
                <i class='bx bxs-bot'></i>
                <h1 class="fs-5">Chatbot</h1>
                <p>The Chatbot feature provides an interactive way for residents to get quick responses to common inquiries
                    and navigate the barangay management system.</p>
            </div>
        </div>
    </div>
    <div class="announcements">
        <div class="section-details text-center">
            <h1 class="fs-3 text-center">Latest Announcements</h1>
            <p>Stay Informed with the Latest Updates</p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-3">
                @if(!$latestAnnouncements->isEmpty())
                    @foreach ($latestAnnouncements as  $latestAnnouncement)
                        <div class="card m-2" style="width: 18rem;">
                            @if (!empty($latestAnnouncement->image_path))
                                <img src="{{ asset('storage/' . $latestAnnouncement->image_path) }}" class="card-img-top" alt="Announcement Image">
                            @else
                                <img src="/images/barangay-image.png" class="card-img-top" alt="Default Image">
                            @endif
                            <div class="card-body">
                                <h5 style="font-size: 16px;" class="card-title">{!! $latestAnnouncement->title !!}</h5>
                                {{-- <p class="card-text" style="opacity: 1">{!! Str::limit($latestAnnouncement->content, 200, '...') !!}</p> --}}
                            </div>
                            <div class="card-footer">
                                <a class="view-details" data-bs-toggle="modal" data-bs-target="#{{ $latestAnnouncement->id }}">View Details</a>
                            </div>
                        </div>
                    {{-- <x-admin-components.modal.view-announcement-user :announcement="$latestAnnouncement" modalId="{{ $latestAnnouncement->id }}"/> --}}
                    @endforeach
                @else
                    <div>
                        <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" alt="">
                        <p>No announcements available at this time.</p>
                    </div>
                @endif
            </div>            
            <div class="d-flex justify-content-center">
                <button class="view-more">View More</button>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
@endpush
