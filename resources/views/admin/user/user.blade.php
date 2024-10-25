@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-user.css">

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
    <div class="table-header mb-3">
        <div class="col">
            <div class="col">
                <x-admin-components.admin-page-title>Users</x-admin-components.page-title>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="table-container">
        <table class="table" id="example">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->contact_no }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status == 'unverified')
                                <span class="badge rounded-pill text-bg-danger">{{ $user->status }}</span>
                            @elseif($user->status == 'to verify')
                                <span class="badge rounded-pill text-bg-warning">{{ $user->status }}</span>
                            @elseif($user->status == 'verified')
                                <span class="badge rounded-pill text-bg-success">{{ $user->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    </form>
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#viewUserProfileModal-{{ $user->id }}">View</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="dropdown-item">Edit</a>
                                    </li> --}}
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#{{ $user->id }}">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <x-admin-components.modal.confirm-delete-user :user="$user->id" modalId="{{ $user->id }}"/>
                    <x-admin-components.modal.view-user-profile :user="$user" modalId="viewUserProfileModal-{{ $user->id }}"/>
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
        var table = $('#example').DataTable({
            lengthMenu: [5, 10, 25],
            language: {
                buttons: {
                    selectAll: 'Select all items',
                    selectNone: 'Select none'
                }
            }
        });
        $('#statusFilter').on('change', function() {
        var selectedValue = $(this).val();
            console.log('Selected Value:', selectedValue);
            table.column(5).search(selectedValue).draw(); 
        });
    });

</script>
@endpush