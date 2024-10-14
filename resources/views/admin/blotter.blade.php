@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-blotter.css">
@endpush
@section('content')
    <div class="table-header">
        <x-admin-components.admin-breadcrumb :page="'COMPLAINTS'"/>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Incident Type</th>
                    <th scope="col">Incident Date</th>
                    <th scope="col">Incident Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date submitted</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ( $blotters as $blotter )
                        <td>{{ $blotter->bloter_id }}</th>
                        <td>{{ $blotter->incidentType }}</td>
                        <td>{{ $blotter->incidentDate }}</td>
                        <td>{{ $blotter->incidentLocation }}</td>
                        <td>{{ $blotter->status }}</td>
                        <td>{{ $blotter->created_at }}</td>
                        <td>
                            <button class="btn btn-light" data-bs-toggle="modal" 
                            data-bs-target="#editModal{{ $blotter->id }}">Edit</button>
                        </td>
                        <x-admin-components.modal.edit-blotter :blotter="$blotter" :modalId="'editModal'.$blotter->id"/>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
