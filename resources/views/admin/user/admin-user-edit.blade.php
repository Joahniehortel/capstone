@extends('components.admin-components.admin-layout')
@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-user-create.css">
@endpush

@section('content')
    <div class="page-title">
        <div class="col">
            <x-admin-components.admin-page-title>USER</x-admin-components.page-title>
        </div>
    </div>
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
    <div class="user">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="number-copies" class="col-form-label">First name</label>
                    <input class="form-control" type="text" value="{{ $user->firstname }}" name="firstname" placeholder="First Name" required>
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="col-form-label">Last name</label>
                    <input class="form-control" value="{{ $user->lastname }}" type="text" id="lastname" name="lastname" placeholder="Last Name"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input class="form-control" value="{{ $user->email }}" type="email" name="email" placeholder="Email address" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="contact" class="col-form-label">Contact number</label>
                    <input class="form-control" value="{{ $user->contact_number}}" type="text" id="contact" name="password" placeholder="Contact number"
                        required>
                </div>
                <div class="col d-flex justify-content-end align-items-end gap-3">
                    <a href="{{ route('admin.user')}}" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
