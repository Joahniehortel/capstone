@extends('components.admin-components.admin-layout')

@push('assets')
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>
@endpush
@section('page-title')
    <x-admin-components.admin-page-title>Request</x-admin-components.page-title>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">View Requests</li>
        </ol>
    </nav>
@endsection

    @push('assets')
        <link rel="stylesheet" href="/css/admin-css/admin-request.css">

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
        @if (session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
                    data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
        <div class="page-container">
            <div class="table-header">
                <div class="col">
                    <x-admin-components.admin-page-title>Requests</x-admin-components.page-title>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">View Requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">On Process</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ready-tab" data-bs-toggle="tab" data-bs-target="#ready-tab-pane" type="button"
                        role="tab" aria-controls="ready-tab-pane" aria-selected="false">Ready to pick up</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-tab-pane"
                        type="button" role="tab" aria-controls="completed-tab-pane"
                        aria-selected="false">Completed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected-tab-pane"
                        type="button" role="tab" aria-controls="rejected-tab-pane" aria-selected="false">Rejected</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="process">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requesteds</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($document_requests as $document_request)
                                    <tr>
                                        <td>{{ $document_request->id }}</td>
                                        <td>{{ $document_request->request_file_name }}</td>
                                        <td>{{ $document_request->firstname }}</td>
                                        <td>{{ $document_request->lastname }}</td>
                                        <td>
                                            @switch($document_request->request_status)
                                                @case('Pending')
                                                    <span class="badge text-bg-secondary">{{ $document_request->request_status }}</span>
                                                @break
    
                                                @case('Processing')
                                                    <span class="badge text-bg-primary">{{ $document_request->request_status }}</span>
                                                @break
    
                                                @default
                                                    <span>Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $document_request->created_at }}</td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $document_request->id }}">UPDATE</button>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.request-modal :documentRequest="$document_request"
                                        modalId="{{ $document_request->id }}" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="ready-tab-pane" role="tabpanel" aria-labelledby="ready-tab" tabindex="0">
                    <div class="table-container">
                        <table class="table" id="ready">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($readyRequest as $ready)
                                    <tr>
                                        <td>{{ $ready->id }}</td>
                                        <td>{{ $ready->request_file_name }}</td>
                                        <td>{{ $ready->firstname }}</td>
                                        <td>{{ $ready->lastname }}</td>
                                        <td>
                                            <span class="badge text-bg-success">{{ $ready->request_status }}</span>
                                        </td>
                                        <td>{{ $ready->created_at }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <form action="{{ route('documentRequest.update', $ready->id) }}" method="POST">
                                                    @csrf
                                                        <input type="hidden" name="status" value="Completed">
                                                        <button class="btn btn-success" type="submit">Completed</button>
                                                </form>
                                                <button class="btn btn-secondary"  data-bs-toggle="modal"
                                                data-bs-target="#{{ $ready->id }}">UPDATE</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.request-modal :documentRequest="$ready"
                                        modalId="{{ $ready->id }}" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="completed-tab-pane" role="tabpanel" aria-labelledby="completed-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="completed">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($completed as $completed)
                                    <tr>
                                        <td>{{ $completed->id }}</td>
                                        <td>{{ $completed->request_file_name }}</td>
                                        <td>{{ $completed->firstname }}</td>
                                        <td>{{ $completed->lastname }}</td>
                                        <td>
                                            <span class="badge text-bg-success">{{ $completed->request_status }}</span>
                                        </td>
                                        <td>{{ $completed->created_at }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $completed->id }}">UPDATE</button>
                                                <form action="{{ route('documentRequest.destroy', $completed->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.request-modal :documentRequest="$completed"
                                        modalId="{{ $completed->id }}" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="rejected-tab-pane" role="tabpanel" aria-labelledby="rejected-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="rejected">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected as $rejected)
                                    <tr>
                                        <td>{{ $rejected->id }}</td>
                                        <td>{{ $rejected->request_file_name }}</td>
                                        <td>{{ $rejected->firstname }}</td>
                                        <td>{{ $rejected->lastname }}</td>
                                        <td>
                                            <span class="badge text-bg-danger">{{ $rejected->request_status }}</span>
                                        </td>
                                        <td>{{ $rejected->created_at }}</td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#{{ $rejected->id }}">UPDATE</button>
                                            {{-- <form action="{{ route('documentRequest.destroy', $rejected->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.request-modal :documentRequest="$rejected"
                                        modalId="{{ $rejected->id }}" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var toastEl = document.querySelector('.toast');
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                });
                new DataTable('#process', {
                    lengthMenu: [5, 10, 25],         
                    dom: '',            
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    },
                });

                new DataTable('#ready', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    }
                });
                new DataTable('#completed', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    }
                });
                new DataTable('#rejected', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    },
                });
            </script>
        </div>
    @endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush