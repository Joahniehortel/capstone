@extends('components.user-components.layout')

@push('assets')
    <link rel="stylesheet" href="/css/user-css/complaint.css">
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
    @if($errors->any())
         <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="page-content">
        <x-user-components.page-title>COMPLAINT</x-user-components.page-title>
        <div class="complain-content">
            <h1 class="fs-3" style="font-weight: 600; color:">COMPLAINT FORM</h1>
            <p>Please provide a detailed description of your complaint, including any relevant information that can help us address your concerns promptly</p>
            <form action="{{ $complaint ? route('complaint.update.details', $complaint->id) : route('complaint.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="complain_title" class="col-form-label">Subject/Title of the Complaint</label>
                        <input class="form-control @error('complaint_title') is-invalid @enderror" type="text" id="complaint_title" placeholder="Complaint about..." name="complaint_title" value="{{old('complaint_title', $complaint->complaint_title ?? '') }}" style="border: black 1px solid">
                        @error('complain_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <p>Optional: You may upload an image to support your complaint.</p>
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="modal-container">
                        <div class="complaint-image-area" data-img="">
                            <input type="file" id="file1" name="complaint_image" hidden>
                            
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload File</h3>
                            <p>File size must be less than <span>100MB</span>. Supported formats: Images and Videos</p>                            
                        </div>
                            <progress id="uploadProgress" value="0" max="100" style="width: 100%; display: none;"></progress>
                            <div class="loading-indicator" style="display: none;">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        <button type="button" class="complaint-select-image">Upload File</button>
                    </div>   
                </div>
                <div class="loading-indicator" style="display: none;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <!-- Address -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="complaint_address">Address</label>
                        <input type="text" name="complaint_address" class="form-control @error('complaint_address') is-invalid @enderror" value="{{ old('complaint_address', $complaint->complaint_address ?? '') }}" style="border: black 1px solid">
                        @error('complaint_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            
                    <!-- Date Occurred -->
                    <div class="col-md-6 mb-3">
                        <label for="date_occured">Relevant Dates</label>
                        <input type="date" class="form-control @error('date_occured') is-invalid @enderror" name="date_occured" value="{{ old('date_occured', $complaint->date_occured ?? '') }}" style="border: black 1px solid">
                        @error('date_occured')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            
                <!-- Complaint Details -->
                <div class="com-md-6 mb-3">
                    <label for="complaint_detail" class="col-form-label">
                        Complaint Details
                        <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-placement="top" title="A detailed explanation of the issue"></i>
                    </label>
                    <textarea class="form-control @error('complaint_detail') is-invalid @enderror"
                    name="complaint_details" 
                    id="complaint_detail" 
                    rows="10" 
                    placeholder="Provide a detailed description of your complaint"
                    style="border: black 1px solid">{{ old('complaint_detail', $complaint->complaint_detail ?? '') }}</textarea>
          
                    @error('complaint_detail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end align-items-end">
                    <button type="submit" class="submit">{{ $complaint ? 'Submit' : 'Submit' }}</button>
                </div>
            </form>            
        </div>
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
    <script>
        const selectImage = document.querySelector('.complaint-select-image');  
        const inputFile = document.querySelector('#file1');
        const imgArea = document.querySelector('.complaint-image-area');
        const loadingIndicator = document.querySelector('.loading-indicator');
        const uploadProgress = document.getElementById('uploadProgress');

        selectImage.addEventListener('click', function() {
            inputFile.click();
        });

        inputFile.addEventListener('change', function() {
            const image = this.files[0];
            if (image.size < 100000000) { // Check for 100MB limit
                
                loadingIndicator.style.display = 'flex';
                uploadProgress.style.display = 'block';
                uploadProgress.value = 0; 

                const reader = new FileReader();
                
                reader.onprogress = (event) => {
                    if (event.lengthComputable) {
                        const percentComplete = (event.loaded / event.total) * 100;
                        uploadProgress.value = percentComplete;
                    }
                };

                reader.onloadstart = () => {
                    uploadProgress.value = 0; 
                };

                reader.onload = () => {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item => item.remove());
                    
                    const fileType = image.type;
                    let imgUrl;

                    if (fileType.startsWith('image/')) {
                        imgUrl = reader.result;
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        imgArea.appendChild(img);
                    } else if (fileType.startsWith('video/')) {
                        imgUrl = '/images/multimedia.png'; 
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        imgArea.appendChild(img);
                    } else if (fileType === 'application/pdf') {
                        // If it's a PDF, display a PDF icon
                        imgUrl = '/images/pdf.png'; 
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        imgArea.appendChild(img);
                    } else if (fileType === 'application/msword' || fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                        // Check for Word document file types (.doc or .docx)
                        const img = document.createElement('img');
                        imgUrl = '/images/word.jpg'; 
                        img.src = imgUrl;
                        imgArea.appendChild(img);
                    } else {
                        // For other file types, display a generic file icon
                        imgUrl = '/images/file-icon.png'; 
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        imgArea.appendChild(img);
                    }

                    // Add the select button event listener (for selecting files)
                    const selectButton = document.querySelector('.complaint-select-image');
                    selectButton.addEventListener('click', function() {
                        inputFile.click();
                    });
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;

                    loadingIndicator.style.display = 'none';
                    uploadProgress.style.display = 'none'; 
                };
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 100MB"); 
            }
        });
    </script> 
@endpush