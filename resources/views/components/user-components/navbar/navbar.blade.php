<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <div class="navbar-brand me-auto">
            <img src="/images/dc.png" alt="error">
            <div style="line-height: 1">
                <a class="navbar-brand me-auto" href="#">EBARRIO</a>
                <p>BARANGAY 8-A POBLACION DISTRICT</p>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img class="image-logo" style="width: 70px" src="/images/dc.png"
                        alt="">EBARRIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <x-user-components.navbar.navbar-link href="/home" :active="request()->is('home')">Home
                    </x-user-components.navbar.navbar-link>
                    @if(Auth::user())
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false"
                                style="box-shadow: none">
                                Services
                            </button>
                            <ul class="dropdown-menu" style="box-shadow: none">
                                <x-user-components.navbar.navbar-link href="/request" :active="request()->is('request')">Request
                                    </x-user-components.navbar-link>
                                    <x-user-components.navbar.navbar-link href="/complaint" :active="request()->is('complaint')">Complaint
                                        </x-user-components.navbar-link>
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
                </ul>
            </div>
        </div>
        @guest
            <a href="{{ route('login') }}" class="login-btn">Login</a>
        @endguest
        @auth
            <div class="header-actions">
                <div class="btn-group">
                    <div class="dropdown-center align-center">
                        <a href="#" class="notification-btn" data-bs-toggle="dropdown" aria-expanded="false"> <img class="notification" src="/images/notification.png" alt="">
                        <span class="visually-hidden">New alerts</span>
                      </span></a>
                        <ul class="dropdown-menu notification dropdown-menu-end" id="dropdown-menu-notifications">
                            @if ($notifications->isNotEmpty())
                                @foreach ($notifications as $notification)
                                <li class="notification-list">
                                    <div class="row d-flex">
                                        <div class="col-12" style="width: 95%">
                                            <span>{{ $notification->data['notification_type'] ?? 'No message' }}</span><br>
                                            {{ $notification->data['message'] ?? 'No message' }}<br>
                                            {{ $notification->additional_message ?? 'No message' }}<br>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Dropdown link
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#{{ $notification->id }}">View</a></li>
                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                    </ul>
                                              </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <p>No notifications found.</p>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-secondary dropdown-toggle profile-btn"><i class='bx bx-user' style="font-size: 20px"></i>{{ Auth::user()->firstname }}</a>
                    <ul class="dropdown-menu">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>{{ $notification->data['notification_type'] ?? 'No message' }}</span><br>
                    {{ $notification->data['message'] ?? 'No message' }}<br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endforeach 
<x-user-components.profile />

@push('script')
    <script>
        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endpush
