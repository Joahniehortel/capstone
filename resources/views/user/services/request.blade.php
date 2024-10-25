@extends('components.user-components.layout')

@push('assets')
    <link rel="stylesheet" href="/css/user-css/request.css">
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
    @if(session('error-toast'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error-toast') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="page-content">
        <x-user-components.page-title>REQUEST</x-user-components.page-title>
        <div class="card-list">
            @if(isset($documents) && count($documents) > 0)
                @foreach ($documents as $document)
                <div class="card" style="width: 18rem;" style="display: flex; justify-content:center">
                    @if (empty($document->image))
                        <img src="/images/dc.png" alt="Failed to load image" class="card-img-top">
                        @else
                            <img src="images/image.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <div class="details" style="height: 100px">
                                <h5 class="card-title">{{ $document->file_name }}</h5>
                                <p class="card-text">{{ Str::limit($document->file_details, 75, '...') }}</p>
                            </div>
                            @if (Auth::check())
                                @csrf
                                <div class="d-flex justify-content-end align-items-end">
                                    <button class="request-btn" data-bs-toggle="modal" data-bs-target="#requestForm-{{ $document->id }}">Proceed 
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </button>
                                </div>
                                <x-user-components.request-form :requestForm="$document"
                                    modalId="requestForm-{{ $document->id }}"/>
                            @else
                                <a href="{{ route('login') }}">Login to request this document</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-announcements-container text-center">
                    <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" alt="" style="width: 300px">
                    <p>There are no documents available for request right now. Please revisit us later for updates</p>
                </div>
            @endif
        </div>
        <img class="image" src="/images/building.png" alt="">
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
