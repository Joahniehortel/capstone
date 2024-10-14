@props(['user', 'modalId'])

@push('assets')
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3);
        }
        .image{
            width: 50%;
        }
    </style>
@endpush
</style>
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img class="image" src="{{ asset('images/profile-picture.png') }}" alt="Default Image" />
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="number-copies" class="col-form-label">First name</label>
                        <input class="form-control" type="text" value="{{ $user->firstname }}" name="firstname"
                            placeholder="First Name" id="firstname" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="lastname" class="col-form-label">Last name</label>
                        <input class="form-control" value="{{ $user->lastname }}" type="text" id="lastname"
                            name="lastname" placeholder="Last Name" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="row-md-6">
                        <label for="email" class="col-form-label">Email</label>
                        <input class="form-control" value="{{ $user->email }}" type="text" id="lastname"
                            name="email" placeholder="Last Name" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="row-md-6">
                        <label for="contact_no" class="col-form-label">Contact number</label>
                        <input class="form-control" value="{{ $user->contact_no }}" type="text" id="lastname"
                            name="contact_no" placeholder="Last Name" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
