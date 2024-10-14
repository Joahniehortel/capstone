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
    <div class="user">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <!-- Font Awesome icon -->
                <strong>Something went wrong.</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <!-- Font Awesome success icon -->
                <strong>Success:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-container w-100 d-flex justify-content-center">
                <div>
                    <input type="file" id="file" name="complaint_image" hidden>
                    <div class="img-area" data-img="">
                        <i class='bx bxs-cloud-upload icon'></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    <button type="button" class="select-image">Select Image</button>
                </div>
            </div>
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
                <div class="col-md-6 mb-3">
                    <label for="number-copies" class="col-form-label">First name</label>
                    <input class="form-control" type="text" name="firstname" placeholder="First Name" required style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="col-form-label">Last name</label>
                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last Name"
                        required style="border: 1px solid black">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email address" required style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="password" class="col-form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                        required style="border: 1px solid black">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="contact" class="col-form-label">Contact number</label>
                    <input class="form-control" type="text" id="contact" name="contact_number" placeholder="Contact number" required style="border: 1px solid black">
                </div>
                <div class="col d-flex justify-content-end align-items-end gap-3">
                    <button class="btn btn-light" onclick="window.location.href='{{ route('admin.user') }}'">Back</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </form>
    </div>
@endsection
