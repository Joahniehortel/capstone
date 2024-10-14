@extends('components.admin-components.admin-layout')

@section('page-title')
    <x-admin-components.admin-page-title>Complaints</x-admin-components.page-title>
    @endsection

    @push('assets')
        <link rel="stylesheet" href="/css/admin-css/admin-complaints.css">
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
        <div class="page-content">
            <div class="table-header" style="margin-bottom: -5px">
                <div class="col">
                    <x-admin-components.admin-page-title>Complaints</x-admin-components.page-title>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">View Complaints</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ON process</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Resolved</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Escalated</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                        type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Rejected</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="example">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Complaint Detail</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($onProcesses as $onProcess)
                                    <tr>
                                        <td style="text-align: start">{{ $onProcess->id }}</td>
                                        <td style="text-align: start">{{ $onProcess->complaint_title }}</td>
                                        <td style="text-align: start">{{ $onProcess->firstname }}</td>
                                        <td style="text-align: start">{{ $onProcess->lastname }}</td>
                                        <td style="text-align: start">{{ $onProcess->created_at }}</td>
                                        <td style="text-align: start">
                                            @switch($onProcess->complaint_status)
                                                @case('Pending')
                                                    <span class="badge text-bg-secondary">{{ $onProcess->complaint_status }}</span>
                                                @break
    
                                                @case('In Review')
                                                    <span class="badge text-bg-info">{{ $onProcess->complaint_status }}</span>
                                                @break
    
                                                @case('Resolved')
                                                    <span class="badge text-bg-success">{{ $onProcess->complaint_status }}</span>
                                                @break
    
                                                @case('Escalated')
                                                    <span class="badge text-bg-danger">{{ $onProcess->complaint_status }}</span>
                                                @break
    
                                                @case('Rejected')
                                                    <span class="badge text-bg-dark">{{ $onProcess->complaint_status }}</span>
                                                @break
    
                                                @default
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $onProcess->id }}">UPDATE</button>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.edit-complaint modalId="{{ $onProcess->id }}"
                                        :complaint="$onProcess" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="resolved">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Date Complaint</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($resolves as $resolved)
                                    <tr>
                                        <td style="text-align: start">{{ $resolved->id }}</td>
                                        <td style="text-align: start">{{ $resolved->complaint_title }}</td>
                                        <td style="text-align: start">{{ $resolved->firstname }}</td>
                                        <td style="text-align: start">{{ $resolved->lastname }}</td>
                                        <td style="text-align: start">{{ $resolved->created_at }}</td>
                                        <td style="text-align: start">
                                            @switch($resolved->complaint_status)
                                                @case('Pending')
                                                    <span class="badge text-bg-secondary">{{ $resolved->complaint_status }}</span>
                                                @break
    
                                                @case('In Review')
                                                    <span class="badge text-bg-info">{{ $resolved->complaint_status }}</span>
                                                @break
    
                                                @case('Resolved')
                                                    <span class="badge text-bg-success">{{ $resolved->complaint_status }}</span>
                                                @break
    
                                                @case('Escalated')
                                                    <span class="badge text-bg-danger">{{ $resolved->complaint_status }}</span>
                                                @break
    
                                                @case('Rejected')
                                                    <span class="badge text-bg-dark">{{ $resolved->complaint_status }}</span>
                                                @break
    
                                                @default
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $resolved->id }}">UPDATE</button>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.edit-complaint modalId="{{ $resolved->id }}"
                                        :complaint="$resolved" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="escalated">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Date Complaint</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($escalates as $escalate)
                                    <tr>
                                        <td style="text-align: start">{{ $escalate->id }}</td>
                                        <td style="text-align: start">{{ $escalate->complaint_title }}</td>
                                        <td style="text-align: start">{{ $escalate->firstname }}</td>
                                        <td style="text-align: start">{{ $escalate->lastname }}</td>
                                        <td style="text-align: start">{{ $escalate->created_at }}</td>
                                        <td style="text-align: start">
                                            @switch($escalate->complaint_status)
                                                @case('Pending')
                                                    <span class="badge text-bg-secondary">{{ $escalate->complaint_status }}</span>
                                                @break
    
                                                @case('In Review')
                                                    <span class="badge text-bg-info">{{ $escalate->complaint_status }}</span>
                                                @break
    
                                                @case('Resolved')
                                                    <span class="badge text-bg-success">{{ $escalate->complaint_status }}</span>
                                                @break
    
                                                @case('Escalated')
                                                    <span class="badge text-bg-danger">{{ $escalate->complaint_status }}</span>
                                                @break
    
                                                @case('Rejected')
                                                    <span class="badge text-bg-dark">{{ $escalate->complaint_status }}</span>
                                                @break
    
                                                @default
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $escalate->id }}">UPDATE</button>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.edit-complaint modalId="{{ $escalate->id }}"
                                        :complaint="$escalate" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="rejected">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Date Complaint</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($rejects as $reject)
                                    <tr>
                                        <td style="text-align: start">{{ $reject->id }}</td>
                                        <td style="text-align: start">{{ $reject->complaint_title }}</td>
                                        <td style="text-align: start">{{ $reject->firstname }}</td>
                                        <td style="text-align: start">{{ $reject->lastname }}</td>
                                        <td style="text-align: start">{{ $reject->created_at }}</td>
                                        <td style="text-align: start">
                                            @switch($reject->complaint_status)
                                                @case('Pending')
                                                    <span class="badge text-bg-secondary">{{ $reject->complaint_status }}</span>
                                                @break
    
                                                @case('In Review')
                                                    <span class="badge text-bg-info">{{ $reject->complaint_status }}</span>
                                                @break
    
                                                @case('Resolved')
                                                    <span class="badge text-bg-success">{{ $reject->complaint_status }}</span>
                                                @break
    
                                                @case('Escalated')
                                                    <span class="badge text-bg-danger">{{ $reject->complaint_status }}</span>
                                                @break
    
                                                @case('Rejected')
                                                    <span class="badge text-bg-dark">{{ $reject->complaint_status }}</span>
                                                @break
    
                                                @default
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#{{ $reject->id }}">UPDATE</button>
                                        </td>
                                    </tr>
                                    <x-admin-components.modal.edit-complaint modalId="{{ $reject->id }}"
                                        :complaint="$reject" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            new DataTable('#example', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#resolved', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#escalated', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#rejected', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
    @endpush
@push('footer')
    <x-admin-components.admin-footer/>
@endpush