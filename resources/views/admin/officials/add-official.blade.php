@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-add-officials.css">
@endpush

@section('content')
    <div class="page-title" style="margin-bottom: 30px; margin-top:30px">
        <div class="col">
            <x-admin-components.admin-page-title>Add Official</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/admin/official">View Officials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Official</li>
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
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        @if(session('error'))
            <div class="toast text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>    
    <div class="official" style="margin-bottom: 30px">
        <form action="{{ route('official.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-100 d-flex justify-content-center">
                <div class="modal-container">
                    <input type="file" id="file" name="image" hidden>
                    <div class="img-area" data-img="">
                        <i class='bx bxs-cloud-upload icon'></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    @if ($errors->has('image'))
                        <div class="alert alert-danger">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <button type="button" class="select-image mb-3">Select Image</button>
                </div>
            </div>
        
            <!-- Move the script here -->
            <script>
                const selectImage = document.querySelector('.select-image');
                const inputFile = document.querySelector('#file');
                const imgArea = document.querySelector('.img-area');
        
                selectImage.addEventListener('click', function() {
                    inputFile.click();
                });
        
                inputFile.addEventListener('change', function() {
                    const image = this.files[0];
                    if (image.size < 2000000) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            const allImg = imgArea.querySelectorAll('img');
                            allImg.forEach(item => item.remove());
                            const imgUrl = reader.result;
                            const img = document.createElement('img');
                            img.src = imgUrl;
                            imgArea.appendChild(img);
                            imgArea.classList.add('active');
                            imgArea.dataset.img = image.name;
                        }
                        reader.readAsDataURL(image);
                    } else {
                        alert("Image size more than 2MB");
                    }
                });
            </script>            
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="firstname" class="col-form-label">First name</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="lastname" class="col-form-label">Last name</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required>
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">   
                        <div class="col-md-6 mb-2">
                            <label for="status" class="col-form-label">Brgy. Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="status" name="position" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Punong Barangay" {{ old('position') === 'Punong Barangay' ? 'selected' : '' }}>Punong Barangay</option>
                                <option value="Barangay Kagawad" {{ old('position') === 'Barangay Kagawad' ? 'selected' : '' }}>Barangay Kagawad</option>
                                <option value="SK Chairman" {{ old('position') === 'SK Chairman' ? 'selected' : '' }}>SK Chairman</option>
                                <option value="Barangay Secretary" {{ old('position') === 'Barangay Secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                                <option value="Barangay Clerk" {{ old('position') === 'Barangay Clerk' ? 'selected' : '' }}>Barangay Clerk</option>
                                <option value="Barangay Record Keeper" {{ old('position') === 'Barangay Record Keeper' ? 'selected' : '' }}>Barangay Record Keeper</option>
                            </select>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-2">
                            <label for="status" class="col-form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Status</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="term_start" class="col-form-label">Term start</label>
                            <input type="date" class="form-control" id="term_start" name="term_start" required style="border: 1px solid #ddd;">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="term_end" class="col-form-label">Term end</label>
                            <input type="date" class="form-control" id="term_end" name="term_end" required style="border: 1px solid #ddd;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required style="border: 1px solid #ddd;">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="gender" class="col-form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="contact_number" class="col-form-label">Contact number</label>
                            <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{ old('contact_number') }}" required>
                            @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-end mt-3 gap-3">
                <a href="{{ route('admin.official') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Add Official</button>
            </div>
        </form>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    
    </script>
@endpush
