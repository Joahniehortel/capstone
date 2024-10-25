@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-announcement.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
@endpush

@section('content')
    <div class="page-title" style="margin-bottom: 30px; margin-top:30px">
        <div class="col">
            <x-admin-components.admin-page-title>Add Announcement</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/announcements">Announcements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Announcement</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="main-container mb-3">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> 
                <strong>Something went wrong.</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('admin.announcement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="announcement-logo text-center mb-4">
                <img src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
                <div class="details" style="line-height: 0.3">
                    <div class="details mb-5" style="line-height: 0.3">
                        <p>Republic of the Philippines</p>
                        <p>Province of Davao del Sur</p>
                        <p>Municipality of Davao City</p>
                        <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="title" placeholder="Title" class="title form-control mb-3 {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="modal-container">
                        <input type="file" id="file" name="image" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image mb-3">Select Image</button>
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
                            if (image.size < 10000000) {
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
                </div>
                <textarea id="editor" name="content" rows="10" placeholder="Write something..." class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <div class="d-flex justify-content-end align-items-end">
                    <button class="btn btn-primary mt-3" type="submit" style="font-size: 12px">Publish</button>
                </div>
        </form>
    </div>
    <br>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush

@push('scripts')
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';
        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
    </script>
    </body>
@endpush
