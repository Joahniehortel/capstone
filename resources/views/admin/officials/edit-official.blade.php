@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-edit-official.css">
@endpush

@section('content')
    <div class="page-title">
        <div class="col" style="margin-top: 3rem; margin-bottom: 3rem;">
            <x-admin-components.admin-page-title>Edit Official</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/admin/official">View Officials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Official</li>
                </ol>
            </nav>
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
    <div class="official">
        <form action="{{ route('official.update', $official->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <div class="modal-container">
                    <input type="file" id="file" name="image" accept="image/*" hidden>
                    <div class="img-area" data-img="">
                        <i class='bx bxs-cloud-upload icon'></i>
                        @if($official->image)
                            <img class="image" src="{{ Storage::url($official->image) }}" alt="Supporting File" />
                        @endif
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    <button type="button" class="select-image mb-3">Select Image</button>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectImage = document.querySelector('.select-image');
                    const inputFile = document.querySelector('#file');
                    const imgArea = document.querySelector('.img-area');
                
                    selectImage.addEventListener('click', function() {
                        inputFile.click();
                    });
                
                    inputFile.addEventListener('change', function() {
                        const image = this.files[0];
                        if (image && image.size < 2000000) {
                            const reader = new FileReader();
                            reader.onload = () => {
                                const allImg = imgArea.querySelectorAll('img');
                                allImg.forEach(item => item.remove());
                                const img = document.createElement('img');
                                img.src = reader.result;
                                imgArea.appendChild(img);
                                imgArea.classList.add('active');
                                imgArea.dataset.img = image.name;
                            }
                            reader.readAsDataURL(image);
                        } else {
                            alert("Please select an image less than 2MB");
                        }
                    });
                });
            </script>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="firstname" class="col-form-label">First name</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name" value="{{ old('firstname', $official->firstname) }}" required>
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="lastname" class="col-form-label">Last name</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Last Name" value="{{ old('lastname', $official->lastname) }}" required>
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="position" class="col-form-label">Brgy. Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Position</option>
                                <option value="Punong Barangay" {{ old('position', $official->position) === 'Punong Barangay' ? 'selected' : '' }}>Punong Barangay</option>
                                <option value="Barangay Kagawad" {{ old('position', $official->position) === 'Barangay Kagawad' ? 'selected' : '' }}>Barangay Kagawad</option>
                                <option value="SK Chairman" {{ old('position', $official->position) === 'SK Chairman' ? 'selected' : '' }}>SK Chairman</option>
                                <option value="Barangay Secretary" {{ old('position', $official->position) === 'Barangay Secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                                <option value="Barangay Clerk" {{ old('position', $official->position) === 'Barangay Clerk' ? 'selected' : '' }}>Barangay Clerk</option>
                                <option value="Barangay Record Keeper" {{ old('position', $official->position) === 'Barangay Record Keeper' ? 'selected' : '' }}>Barangay Record Keeper</option>
                            </select>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="official_status" class="col-form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="official_status" name="official_status" style="font-size: 14px">
                                <option value="" {{ old('official_status', $official->official_status) == null ? 'selected' : '' }}>Select Status</option>
                                <option value="active" {{ old('official_status', $official->official_status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('official_status', $official->official_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('official_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="term_start" class="col-form-label">Term start</label>
                            <input type="date" class="form-control @error('term_start') is-invalid @enderror" id="term_start" name="term_start" value="{{ old('term_start', $official->term_start) }}" required>
                            @error('term_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="term_end" class="col-form-label">Term end</label>
                            <input type="date" class="form-control @error('term_end') is-invalid @enderror" id="term_end" name="term_end" value="{{ old('term_end', $official->term_end) }}" required>
                            @error('term_end')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="email" class="col-form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $official->email) }}" type="email" id="email" name="email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="gender" class="col-form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" style="font-size: 14px">
                                <option value="" {{ old('gender', $official->gender) == null ? 'selected' : '' }}>Select Gender</option>
                                <option value="Male" {{ old('gender', $official->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $official->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="contact" class="col-form-label">Contact number</label>
                            <input class="form-control @error('contact_number') is-invalid @enderror" type="text" id="contact" value="{{ old('contact_number', $official->contact_number) }}" name="contact_number" required>
                            @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>            
            <div class="d-flex justify-content-end align-items-end mt-3 gap-3">
                <a href="{{ route('admin.official') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush