@props(['official', 'modalId'])

@push('assets')
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3);
        }
        .view-image{
            text-align: center;
            width: 300px;
            height: 350px;
        }
    </style>
@endpush
</style>
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Official</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="official">
                    <form action="{{ route('official.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 mb-3 text-center">
                                <img class="view-image" src="{{ $official->image ? asset('storage/' . $official->image) : '/images/profile-picture.png' }}" alt="Profile Picture">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname" class="col-form-label">First name</label>
                                <input disabled type="text" class="form-control" value="{{ $official->firstname }}" name="firstname" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="col-form-label">Last name</label>
                                <input disabled type="text" class="form-control" value="{{ $official->lastname }}" name="lastname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="position" class="col-form-label">Brgy. Position</label>
                                        <input disabled class="form-control" type="text" id="position" value="{{ $official->position }}" name="position" placeholder="Position">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="col-form-label">Status</label>
                                        <select class="form-select" id="status" aria-label="Default select example" name="status" disabled>
                                            <option value="" {{ $official->status == '' ? 'selected' : '' }}>Select Status</option>
                                            <option value="active" {{ $official->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $official->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="term_start" class="col-form-label">Term start</label>
                                        <input disabled type="date" class="form-control" id="term_start" name="term_start" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="term_end" class="col-form-label">Term end</label>
                                        <input disabled type="date" class="form-control" id="term_end" name="term_end" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label">Email</label>
                                <input disabled class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="gender" class="col-form-label">Gender</label>
                                        <select class="form-select" id="gender" aria-label="Default select example" name="gender" disabled>
                                            <option value="" {{ $official->gender == '' ? 'selected' : '' }}>Select Gender</option>
                                            <option value="male" {{ $official->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $official->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="col-form-label">Contact number</label>
                                        <input disabled class="form-control" type="email" id="email" name="contact_number" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
