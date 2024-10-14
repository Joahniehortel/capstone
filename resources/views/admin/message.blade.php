
@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-message.css">
@endpush

@section('content')

    <div class="table-header">
        <div class="col">
            <x-admin-components.admin-page-title>Send Message</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Send Message</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="page-content">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> 
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
        <form action="{{ route('admin.message.sms') }}" method="POST">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="mobile_number" class="col-form-label">Send to</label>
                <input class="form-control" type="text" name="mobile_number" id="mobile_number" placeholder="Type a phone number">
            </div>
            <div class="row-md-6 mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea style="border-radius: 0px;" class="form-control w-100" name="sms_message" id="exampleFormControlTextarea1" rows="3" placeholder="Type your message here..."></textarea>
            </div>
            <div class="d-flex justify-content-end align-items-end"><button class="btn btn-primary" type="submit">Send Message</button></div>
        </form>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush
