@push('assets')
@auth
    <header class="header w-100" id="header">
        <div class="row w-100">
            <div class='col'>
                <button class="menu-btn" id="menu-btn"><i class='bx bx-menu' style="font-size: 26px"></i></button>
            </div>
            <div class="col btn-container d-flex align-items-center justify-content-end ms-auto cursor-pointer">
                <div class="dropdown">
                    <a href="#" class="text-center dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
                        <i class='bx bxs-user text-center' class="admin-icon" style="color: black;font-size: 16px;"></i>{{ $authUser->firstname }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminProfile"><i class='bx bxs-user-account'></i> Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminLogout"><i class='bx bx-log-out'></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>        
        </div>
    </header>
    <x-admin-components.modal.admin-profile/>
    <x-admin-components.modal.admin-logout/>
@endauth
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endpush