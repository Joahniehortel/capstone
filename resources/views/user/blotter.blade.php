@extends('components.user-components.layout')

@push('assets')
    <link rel="stylesheet" href="/css/user-css/blotter.css">
@endpush
@section('content')
@if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
    <div class="page-content">
        <x-user-components.page-title>BLOTTER</x-user-components.page-title>
        <form action="{{ route('blotter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-content">
                <div class="row mb-3">
                    <legend>Blotter Form</legend>
                    <div class="col-md-6">
                        <label for="location" class="col-label-form">Incident Location (e.g., street name, barangay hall, etc.).</label>
                        <input class="form-control" id="location" type="text" placeholder="Location" name="incidentLocation">
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="col-label-form">Date of Incident</label>
                        <input type="date" class="form-control" name="incidentDate" id="date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex gap-5">
                        <div class="col-md-5">
                            <label for="incidentType">Type of Incident:</label>
                            <select id="incidentType" name="incidentType" class="form-control" onchange="toggleOtherInput()">
                                <option value="theft">Theft</option>
                                <option value="assault">Assault</option>
                                <option value="vandalism">Vandalism</option>
                                <option value="domestic-dispute">Domestic Dispute</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div id="otherIncidentDiv" class="col-md-6">
                            <label for="otherIncident">Please Specify:</label>
                            <input type="text" id="otherIncident" name="otherIncident" class="form-control"
                                placeholder="Specify the type of incident">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="subjectOfComplaint">Subject of Complaint</label>
                        <input type="text" id="subjectOfComplaint" name="subjectOfComplaint" class="form-control" placeholder="Full name">
    
                    </div>
                </div>
                <div class="row-md-6 mt-3">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" style="width: 100%"></textarea>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
@endpush