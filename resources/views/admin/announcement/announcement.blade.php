@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-add-announcement.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
    <script src="js/data-table.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
@endpush

@section('content')
    <div class="page-title">
        <div class="row mt-3 mb-3">
            <div class="col">
                <x-admin-components.admin-page-title>Announcement</x-admin-components.page-title>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">View Announcements</li>
                    </ol>
                </nav>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <div>
                    <a href="{{ route('admin.announcement.create')}}" class="btn btn-primary"><i class='bx bxs-megaphone'></i> Add Announcement</a>
                </div>
            </div>
        </div>
        <div class="table-container" style="overflow-x: scroll">
            <table class="table table-bordered" id="example">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement )
                        <tr>    
                            <td>{{ $announcement->id}}</td>
                            <td>{{ $announcement->title }}</td>
                            <td><img class="image" src="{{ Storage::url($announcement->image_path) }}" alt="Supporting File" style="width: 100px" /></td>
                            <td>{{ $announcement->content }}</td>
                            <td>{{ $announcement->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#{{ $announcement->id }}">View</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.announcement.edit', $announcement->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete{{ $announcement->id }}">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <x-admin-components.modal.confirm-delete-announcement :announcement="$announcement" modalId="{{ $announcement->id }}"/>  
                        <x-admin-components.modal.view-announcement :announcement="$announcement"
                        modalId="{{ $announcement->id }}"/>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush

@push('scripts')
    <script>
    new DataTable('#example', {
        pagingType: "simple",  // Compact pagination
        lengthMenu: [5, 10, 25],  // Adjust number of rows per page
        order: [[0, 'asc']],  // Order by the first column
        autoWidth: false,  // Prevents DataTables from expanding the table width
        columnDefs: [
            { width: "5%", targets: 0 },  // Adjust column width as needed
            { width: "25%", targets: 1 }
        ],
        dom: '',  // Enable buttons
        buttons: [
            'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'selectAll', 'selectNone'
        ],
        language: {
            buttons: {
                selectAll: 'Select all items',
                selectNone: 'Select none'
            }
        }
    });
    </script>
@endpush
