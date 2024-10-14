
@push('asset')
    <style>
        .image{
            width: 25%;
        }
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>
@endpush
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
<div class="modal fade" id="adminProfile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Admin Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.profile.update', $authUser->id ) }}" method="POST">
                    @csrf
                    @if (!empty($authUser->image))
                        <div class="text-center mb-3">
                            <img class="image" src="{{ Storage::url($authUser->image) }}" alt="Supporting File" />
                        </div>
                    @else
                        <div class="text-center mb-3">
                            <img class="image" src="{{ asset('images/profile-picture.png') }}" alt="Default Image" />
                        </div>
                    @endif
                    <p class="text-center">{{ $authUser->email }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname" style="font-weight: 200">First name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $authUser->firstname) }}">
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" style="font-weight: 200">Last name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $authUser->lastname) }}">
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-md-6">
                            <label for="contact_no" style="font-weight: 200">Contact no.</label>
                            <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $authUser->contact_no) }}" maxlength="12">
                            @error('contact_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-md-6">
                            <label for="current_password" style="font-weight: 200">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-md-6">
                            <label for="new_password" style="font-weight: 200">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="row mb-3">
                        <div class="row-md-6">
                            <label for="confirm_new_password" style="font-weight: 200">Confirm New Password</label>
                            <input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password">
                            @error('confirm_new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 
                    <div class="d-flex justify-content-end">    
                        <button type="submit" class="btn btn-primary">save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>
<x-admin-components.modal.admin-change-password/>