@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-officials.css">
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
    <div class="table-header">
        <div class="col mb-3">
            <x-admin-components.admin-page-title>Officials</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px">View Officials</li>
                </ol>
            </nav>
        </div>
        <div class="col add-btn">
            <a class="btn btn-primary" style="font-size: 12px" href="{{ route('official.create') }}"><i class='bx bx-user-plus'></i>Add Official</a>
        </div>
    </div>
    <div class="table-container">
        <table class="table" style="width:100%" id="official">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officials as $official)
                    <tr>
                        <td>{{ $official->id }}</td>
                        <td>
                            @if(!empty($official->image))
                                <img class="image" src="{{ Storage::url($official->image) }}" alt="Supporting File" />
                            @else
                                <img class="image" src="/images/profile-picture.png" alt="Supporting File" />
                            @endif
                        </td>
                        <td>{{ $official->firstname }} {{ $official->lastname }}</td>
                        <td>{{ $official->position }}</td>
                        <td>
                            @switch($official->official_status)
                                @case('active')
                                    <span class="badge bg-success">{{ $official->official_status }}</span>
                                    @break
                                @case('inactive')
                                    <span class="badge bg-danger">{{ $official->official_status }}</span> 
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ $official->official_status }}</span> 
                            @endswitch
                        </td>                        
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <form id="edit-form-{{ $official->id }}"
                                        action="{{ route('official.edit', $official->id) }}" method="GET">
                                        @csrf
                                        <li> <a class="dropdown-item"
                                                href="javascript:document.getElementById('edit-form-{{ $official->id }}').submit()">Edit</a>
                                        </li>
                                    </form>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#viewOfficialProfile-{{ $official->id }}">View</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#{{ $official->id }}">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <x-admin-components.modal.confirm-delete-official :official="$official"
                    modalId="{{ $official->id }}"/>
                    <x-admin-components.modal.view-official-profile :official="$official"
                        modalId="viewOfficialProfile-{{ $official->id }}"/>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
        $('#official').DataTable({
            lengthMenu: [5, 10, 25],
            scrollCollapse: true,
            scroller: true,
            responsive: true,
            
        });
    });
</script>

@endpush