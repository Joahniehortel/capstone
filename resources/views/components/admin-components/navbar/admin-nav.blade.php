<div class="sidebar">
    <div class="logo-details1">
        <div class="logo-image">
            <img src="/images/dc.png" alt="">
        </div>
        <span class="logo_name">EBARRIO</span>
    </div>
    <ul class="nav-links">
        <x-admin-components.navbar.admin-navbar-link href="/admin/dashboard" :active="request()->is('admin/dashboard')"
            :icon="'bx bxs-dashboard'">Dashboard</x-admin-components.navbar.admin-navbar-link>
        <x-admin-components.navbar.admin-navbar-link href="/admin/request" :active="request()->is('admin/request')"
            :icon="'bx bx-file'">Request</x-admin-components.navbar.admin-navbar-link>
        <x-admin-components.navbar.admin-navbar-link href="/admin/complaints" :active="request()->is('admin/complaints')"
            :icon="'bx bx-message-alt-error'">Commplaints</x-admin-components.navbar.admin-navbar-link>
        <x-admin-components.navbar.admin-navbar-link href="/admin/document" :active="request()->is('admin/document')"
            :icon="'bx bx-folder-open'">Documents</x-admin-components.navbar.admin-navbar-link>
        <li :active="request()->is('admin/residents')">
            <div class="icon-links {{ Request::is('admin/residents') || Request::is('admin/residents/add') ? 'active' : ''}}">
                <a href="#">
                    <i class='bx bx-male-female'></i>
                    <span class="link_name">Residents</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Category</a>
                </li>
                <li>
                    <a class="{{Request::is('admin/residents') ? 'active' : ''}}" href="{{ route('admin-resident') }}" href="{{ route('admin-resident') }}">View Residents</a>
                </li>
                <li>
                    <a class="{{Request::is('admin/residents/add') ? 'active' : ''}}" href="{{ route('resident.addpage') }}" href="#">Add Resident</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links {{ Request::is('admin/announcements') || Request::is('admin/announcements/create') ? 'active' : ' '}}">
                <a href="#">
                    <i class='bx bxs-megaphone'></i>
                    <span class="link_name">Announcements</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Add Announcements</a>
                </li>
                <li>
                    <a class="{{Request::is('admin/announcements') ? 'active' : ''}}" href="{{ route('admin.announcement') }}">View Announcements</a>
                </li>
                <li>
                    <a class="{{Request::is('admin/announcements/create') ? 'active' : ''}}" href="{{ route('admin.announcement.create') }}">Add Announcements</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links {{Request::is('admin/message') || Request::is('admin/message/logs') ? 'active' : ''}}">
                <a href="#">
                    <i class='bx bx-message-dots'></i>
                    <span class="link_name">SMS Message</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Send Message</a>
                </li>
                <li>
                    <a class ="{{Request::is('admin/message') ? 'active' : ''}}" href="{{ route('admin.message') }}">Send Message</a>
                </li>
                <li>
                    <a class="{{Request::is('admin/message/logs') ? 'active' : ''}}" href="{{ route('admin.message.logs')}}">Message Log</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links {{ Request::is('admin/official') || Request::is('admin/official/add') || Request::is('admin/official/edit/*') ? 'active' : ''}}">
                <a href="javascript:void(0);" onclick="toggleSubmenu(this)">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Officials</span>
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="{{ Request::is('admin/official') ? 'active' : ''}}" href="{{ route('admin.official') }}">View Officials</a>
                </li>
                <li>
                    <a class="{{ Request::is('admin/official/add') ? 'active' : ''}}" href="{{ route('official.create')}}">Add Official</a>
                </li>
            </ul>
        </li>
        <x-admin-components.navbar.admin-navbar-link href="/admin/users" :active="request()->is('admin/users') || request()->is('admin/users')" :icon="'bx bx-user'"
            :showIcon="false">Users</x-admin-components.navbar.admin-navbar-link>
        <x-admin-components.navbar.admin-navbar-link href="/admin/verify" :active="request()->is('admin/verify') || request()->is('admin/verify')" :icon="'bx bx-check-shield'"
            :showIcon="false">Verify Users</x-admin-components.navbar.admin-navbar-link>
        <x-admin-components.navbar.admin-navbar-link style="cursor: pointer" :icon="'bx bx-log-out'" :active="false" :showIcon="false"
            data-bs-toggle="modal" data-bs-target="#adminLogout">Log out</x-admin-components.navbar.admin-navbar-link>
    </ul>
</div>

@push('scripts')
<script>
    function toggleSubmenu(element) {
        const submenu = element.closest('.icon-links').nextElementSibling; // Get the submenu
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block'; // Toggle visibility
    }
</script>
    <script>
        let dropdownItems = document.querySelectorAll('.dropdownlist');
        dropdownItems.forEach(item => {
            item.addEventListener("click", (e) => {
                if (!e.target.closest('a')) {
                    let submenu = item.querySelector('.sub-menu');

                    if (submenu.style.display === "none" || submenu.style.display === "") {
                        submenu.style.display = "block";  
                    } else {
                        submenu.style.display = "none";  
                    }
                }
            });
        });
        let arrow = document.querySelectorAll('.arrow');
        for (var i = 0; i < arrow.length; i++){
            arrow[i].addEventListener("click", (e)=>{
                console.log(e)
                let arrowParent = e.target.parentElement.parentElement;
                console.log(arrowParent)
                arrowParent.classList.toggle('showMenu')
            });
        }
        let sidebar = document.querySelector('.sidebar');
        let sidebarBtn = document.querySelector('.bx-menu');
        let content = document.querySelector('#content');
        let menuBtn = document.querySelector('#menu-btn');

        sidebarBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
            content.classList.toggle("collapsed");
            menuBtn.classList.toggle("collapsed");
        });
    </script>
@endpush

