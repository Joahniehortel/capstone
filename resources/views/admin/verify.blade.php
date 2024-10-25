@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-verify.css">

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
        <div class="col" style="margin-top: 3rem; margin-bottom: 3rem;">
            <x-admin-components.admin-page-title>Verify User</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Verify User</li>
                </ol>
            </nav>                
        </div>
        <div class="table-container">
            <table class="table table-bordered" id="example">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->status == 'to verify')
                                    <span class="badge text-bg-warning">{{ $user->status }}</span>
                                @else
                                    <span class="badge text-bg-danger">warning</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#{{ $user->id }}">Verify</button>
                            </td>
                        </tr>
                        <x-admin-components.modal.verify-user :user="$user" modalId="{{ $user->id }}" />
                    @endforeach
                </tbody>
            </table>
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
@endpush
@push('footer')
    <x-admin-components.admin-footer/>
@endpush