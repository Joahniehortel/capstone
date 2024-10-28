<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <div class="navbar-brand me-auto">
            <a class="navbar-brand me-auto" href="/home">
                <img src="/images/dc.png" alt="error" style="width: 50px">
                <div>
                    <p>BARANGAY 8-A POBLACION DISTRICT</p>
                </div>
                EBARRIO
            </a>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-size: 16px; font-weight: 900; color:#6D4C41"><img class="image-logo" style="width: 50px" src="/images/dc.png"
                        alt=""> EBARRIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <x-user-components.navbar.navbar-link href="/home" :active="request()->is('home')">Home
                    </x-user-components.navbar.navbar-link>
                    @if(Auth::user())
                        <li class="nav-item active dropdown" :active="request()->is('complaint') || request()->is('complaint/edit/*')">
                            <button class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false"
                                style="box-shadow: none">
                                Services
                            </button>
                            <ul class="dropdown-menu" style="box-shadow: none">
                                <x-user-components.navbar.navbar-link href="/request" :active="request()->is('request')">Request
                                </x-user-components.navbar-link>
                                <x-user-components.navbar.navbar-link 
                                    href="/complaint" 
                                    :active="request()->is('complaint') || request()->is('complaint/edit/*')">
                                    Complaint
                                </x-user-components.navbar.navbar-link>
                            </ul>
                        </li>
                    @else
                        <x-user-components.navbar.navbar-link href="/request" :active="request()->is('request')">Request</x-user-components.navbar-link>
                    @endif
                    <x-user-components.navbar.navbar-link href="/announcements"
                        :active="request()->is('announcements')">Announcements</x-user-components-navbar.navbar-link>
                    <x-user-components.navbar.navbar-link href="/officials"
                        :active="request()->is('officials')">Officials</x-user-components-navbar.navbar-link>
                    <x-user-components.navbar.navbar-link href="/about"
                        :active="request()->is('about')">About</x-user-components-navbar.navbar-link>
                    <div class="notification-responsive">
                        {{-- <x-user-components.navbar.navbar-link href="/notification"
                            :active="request()->is('notification')">Notification</x-user-components-navbar.navbar-link> --}}
                    </div>
                </ul>
            </div>
        </div>
        @guest
            <a href="{{ route('login') }}" class="login-btn">Login</a>
        @endguest
        @auth
            <div class="header-actions">
                <div class="btn-group">
                    <div class="mobile d-flex dropdown-end align-items-center justify-content-center">
                    <div class="desktop d-flex dropdown-center align-items-center justify-content-center">
                        <a href="#" class="notification-btn" data-bs-toggle="dropdown" aria-expanded="false"> 
                            <img class="notification" src="/images/bell-ring.png" alt="">
                            @if($unread != 0)
                                <span class="badge-notification">{{ !$unread == 0 ? $unread : ' ' }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notification dropdown-menu-end" id="dropdown-menu-notifications">
                            <div class="row">
                                <div class="col">
                                    <h1 class="fs-6">Notifications</h1>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <h1 class="badge fs-6">Unread: {{ $unread }}</h1>
                                </div>
                            </div>
                            @if ($notifications->isNotEmpty())
                                @foreach ($notifications as $notification)
                                    <li class="notification-list"  id="{{ is_null($notification->read_at) ? 'unread-notification' : '' }}" data-id="{{ $notification->id }}" data-bs-toggle="modal" data-bs-target="#{{ $notification->id }}">
                                        <div class="d-flex">
                                            <div class="col notification-sign p-1 d-flex align-items-center">
                                                @if($notification->data['notification_type'] == 'Document Request')
                                                    @isset($notification->data['status'])
                                                        @switch($notification->data['status'])
                                                            @case('Pending')
                                                                    <i class='bx bxs-hourglass-top' style="background-color: blue"></i>
                                                                @break
                                                            @case('Processing')
                                                                    <i class='bx bx-cog' style="background-color: blue"></i>
                                                                @break
                                                            @case('Ready for pick up')
                                                                    <i class='bx bxs-hand' style="background-color: green"></i>
                                                                @break
                                                            @case('Completed')
                                                                    <i class='bx bx-check' style="background-color: green"></i> 
                                                                @break
                                                            @case('Rejected')
                                                                    <i class='bx bx-x' style="background-color: blue"></i>
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                    @endisset
                                                @elseif($notification->data['notification_type'] == 'Announcement')
                                                    <i class='bx bxs-calendar-check'></i>
                                                @elseif($notification->data['notification_type'] == 'Account Verification')
                                                    @if($notification->data['status']  == 'verified')
                                                        <i class='bx bx-user-check' style="background-color: green"></i>
                                                    @else
                                                        <i class='bx bx-user-x' style='color:#ffffff; background-color: red' ></i>
                                                    @endif
                                                @elseif($notification->data['notification_type'] == 'Complaint')

                                                    @switch($notification->data['status'] ?? '')
                                                        @case('Pending')
                                                            <i class='bx bxs-hourglass-top' style="background-color: blue;"></i>
                                                            @break
                                                        @case('In Review')
                                                            <i class='bx bx-search-alt-2' style="background-color: orange;"></i>
                                                            @break
                                                        @case('Resolved')
                                                            <i class='bx bxs-hand' style="background-color: green;"></i>
                                                            @break
                                                        @case('Escalated')
                                                            <i class='bx bx-check' style="background-color: green;"></i> 
                                                            @break
                                                        @case('Rejected')
                                                            <i class='bx bx-x' style="background-color: red;"></i>
                                                            @break
                                                        @default
                                                            <i class='bx bx-info-circle' style="background-color: gray;"></i> 
                                                    @endswitch
                                                @else
                                                    <i class='bx bx-question-mark' style="background-color: gray;"></i>               
                                                @endif
                                            </div>
                                            <div>
                                                <div>
                                                    <span style="font-size: 14px">{{$notification->data['notification_type'] ?? 'No message'}}</span><br>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small><br>
                                                    <p style="font-size: 14px">{!! Str::limit(preg_replace('/\s+/', ' ', trim($notification->data['message'] ?? 'No message')), 200) !!}</p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="text-center">
                                    <i class="bx bx-bell-off fs-3"></i>
                                    <p>No notifications found.</p>
                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-secondary dropdown-toggle profile-btn"><i class='bx bx-user' style="font-size: 20px"></i><span class="profile_name">{{ Auth::user()->firstname }}</span></a>
                    <ul class="dropdown-menu" style="z-index: -1">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#view-profile">
                                Profile
                            </a>
                        </li>
                        <li>
                            <button type="submit" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#adminLogout">Log out</button>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<x-admin-components.modal.admin-logout/>
@foreach ( $notifications as $notification )
    <div class="modal fade" id="{{ $notification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $notification->data['message'] ?? 'No message' !!}<br><br>
                    @isset($notification->data['additional_message'])
                        @if($notification->data['additional_message'])
                            <label for="additional_message">Additional Message</label>
                            <input class="form-control" id="additional_message" type="text" value="{{ $notification->data['additional_message'] ?? ''}}" disabled>
                        @endif
                    @endisset
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach 
<x-user-components.profile />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

@push('script')
    <script>
        $(document).ready(function () {
            $('.notification-list').on('click', function () {
                var notificationId = $(this).data('id');
                $.ajax({
                    url: '/notifications/' + notificationId + '/mark-as-read',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log('Notification marked as read');
                        }
                    },
                    error: function () {
                        console.log('Error marking notification as read');
                    }
                });
            });
        });
        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endpush
