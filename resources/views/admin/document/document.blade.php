@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-document.css">
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
    <div class="table-header mb-3 mt-3">
        <div class="row">
            <div class="col">
                <x-admin-components.admin-page-title>Document Requests</x-admin-components.page-title>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">View Document Request</li>
                    </ol>
                </nav>
            </div>
            <div class="col add-btn d-flex justify-content-end align-items-center">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocument" style="font-size: 12px"><i class='bx bx-file'></i> Add Document</a>
                {{-- add-official-btn --}}
                <x-admin-components.modal.add-document/>
            </div>
        </div>
    </div>
    <div class="table-container mb-3">
        <table class="table table-bordered text-start " style="width:100%" id="example">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Document Name</th>
                    <th scope="col" >Description</th>
                    <th scope="col"></th>
            </thead>
            <tbody class="text-center">
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->file_name }}</td>
                        <td>{{ $document->file_details }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#{{ $document->id }}">Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $document->id }}">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <x-admin-components.modal.edit-document :modalId="$document->id" :document="$document"/>
                    <x-admin-components.modal.delete-document :modalId="$document->id" :document="$document"/>
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
    new DataTable('#example', {
    lengthMenu: [5, 10, 25],  
    order: [[0, 'asc']],  
    autoWidth: false,  
    columnDefs: [
        { width: "5%", targets: 0 },  
        { width: "25%", targets: 1 }
    ],
    dom: '',  
    language: {
        buttons: {
            selectAll: 'Select all items',
            selectNone: 'Select none'
        }
    }
});

</script>

@endpush