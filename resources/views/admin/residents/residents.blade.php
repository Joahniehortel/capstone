@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-residents.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
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
    <div class="table-header mt-3 mb-3">
        <div class="col">
            <x-admin-components.admin-page-title>Residents</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">View Residents</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="col" style="display: flex; justify-content:end; align-items:center;">
            <a href="{{ route('resident.pdf') }}" class="btn btn-info">Export Data</a>
        </div> --}}
    </div>
    <div class="table-container">
        <div class="col" style="display: flex; justify-content:end; align-items:center;">
            <a href="{{ route('resident.addpage') }}" class="btn btn-primary">Add resident</a>
        </div>
        <div class="row">
            <div class="col filter-container">
                <label for="pwd-filter">PWD</label>
                <select id="pwd-filter" class="form-select filter">
                    <option value="">All</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col">
                <div class="filter-container">
                    <label for="voter-filter">Voter</label>
                    <select id="voter-filter" class="form-select filter" style="font-size: 14px; border-radius:0px">
                        <option value="">All</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="filter-container">
                    <label for="gender-filter">Gender</label>
                    <select id="gender-filter" class="form-select filter" style="font-size: 14px; border-radius:0px"> 
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col d-flex flex-column gap-3">
                <div class="filter-container">
                    <label for="age-start">Age</label>
                    <div class="col mb-3">
                        <input type="number" id="age-start" class="form-control filter" placeholder="From Age">
                    </div>
                    <div class="col">
                        <input type="number" id="age-end" class="form-control filter" placeholder="To Age">
                    </div>
                </div>
            </div>            
        </div>        
        <table class="table table-bordered" id="residents" style="width: 100%">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Pwd</th>
                    <th scope="col">Voter</th>
                    <th></th>
                </tr>   
            </thead>
            <tbody>
                @foreach ($residents as $resident)
                    <tr data-resident-ethnicity="{{ $resident->ethnicity }}" data-resident-marital-status="{{ $resident->maritalStatus }}" data-resident-address="{{ $resident->address }}" data-resident-nationality="{{ $resident->nationality }}">
                        <td class="details-control"><i class='bx bxs-right-arrow child-row'></i></td> 
                        <td>{{ $resident->id }}</td>
                        <td class="text-center">
                            @if($resident->image != null)
                                <img class="image" style="width: 50px; height:50px" src="{{ Storage::url($resident->image) }}" alt="Supporting File" />
                            @else
                                @if($resident->gender == 'Male')
                                    <img src="/images/man.jpg" style="width: 50px; height:50px;" alt="Default Profile Picture">
                                @elseif($resident->gender == 'Female')
                                    <img src="/images/user-women.png" style="width: 50px; height:50px;" alt="Default Profile Picture">
                                @endif
                            @endif
                        </td>
                        <td>{{ $resident->firstName }} {{ $resident->lastName }} </td>
                        <td>{{ $resident->gender }}</td>
                        <td>{{ $resident->age }}</td>
                        <td>{{ $resident->pwd }}</td>
                        <td>{{ $resident->voter }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <form id="edit-form-${row.id}" action="{{ route('resident.edit', $resident->id)}}" method="GET">
                                        <li>
                                            <a href="javascript:document.getElementById('edit-form-${row.id}').submit()" class="dropdown-item" style="cursor: pointer">Edit</a>
                                        </li>
                                    </form>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#viewResidentProfileModal-{{ $resident->id }}" style="cursor: pointer">
                                            View
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteResident-{{ $resident->id }}" style="cursor: pointer">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                        <x-admin-components.modal.view-resident-profile 
                        :resident="$resident" 
                        modalId="viewResidentProfileModal-{{ $resident->id }}" 
                    />
                    <x-admin-components.modal.confirm-delete 
                        :resident="$resident->id" 
                        modalId="deleteResident-{{ $resident->id }}" 
                    />
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

        var table = $('#residents').DataTable();
        $.fn.dataTable.ext.search.push(function(settings, data) {

            var pwdValue = $('#pwd-filter').val();
            var voterValue = $('#voter-filter').val();
            var genderValue = $('#gender-filter').val();
            var ageStart = $('#age-start').val() ? parseInt($('#age-start').val()) : 0;
            var ageEnd = $('#age-end').val() ? parseInt($('#age-end').val()) : Infinity;

            var pwdColumn = data[6];  
            var voterColumn = data[7]; 
            var genderColumn = data[4]; 
            var ageColumn = parseFloat(data[5]) || 0;  

            if (pwdValue !== '' && pwdColumn !== pwdValue) {
                return false;
            }

            if (voterValue !== '' && voterColumn !== voterValue) {
                return false;
            }

            if (genderValue !== '' && genderColumn !== genderValue) {
                return false;
            }

            if (ageColumn < ageStart || ageColumn > ageEnd) {
                return false;
            }

            return true; 
        });

        $('#pwd-filter, #voter-filter, #gender-filter, #age-start, #age-end').on('keyup change', function() {
            table.draw();
        });
        $('#residents tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var childRowIcon = $(this).find('.child-row'); 

            if (row.child.isShown()) {
                childRowIcon.toggleClass('rotate'); 
                row.child.hide();
                tr.removeClass('shown');
            } else {
                var residentData = {
                    address: tr.data('resident-address'),
                    nationality: tr.data('resident-nationality'),
                    maritalStatus: tr.data('resident-marital-status'),
                    ethnicity: tr.data('resident-ethnicity')
                };
                row.child(format(residentData)).show();
                childRowIcon.toggleClass('rotate'); 
                tr.addClass('shown');
            }
        });

        function format(resident) {
            return '<div class="child-row-details">'+
                    '<p><strong>Address:</strong> ' + resident.address + '</p>' +
                    '<p><strong>Nationality:</strong> ' + resident.nationality + '</p>' +
                    '<p><strong>Marital Status:</strong> ' + resident.maritalStatus + '</p>' +
                    '<p><strong>Ethnicity:</strong> ' + resident.ethnicity + '</p>' +
                '</div>';
            }
        });

</script>
@endpush
