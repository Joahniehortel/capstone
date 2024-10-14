@extends('components.user-components.layout')

@section('content')
    <style>
        .page-content {
            background-color: #fff;
            background-image: url('/images/building.png');
        }

        .content {
            padding-left: 8rem;
            padding-right: 8rem;
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .nav-pills .nav-link {
            background-color: transparent;
            color: #000;
            border: none;
        }

        .nav-pills .nav-link.active {
            background-color: rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .nav-pills .nav-link {
            background-color: transparent;
            color: #000;
            border: none;
            border-radius: 0px;
            /* Remove border-radius */
        }
        .request_list{
            width:100%;
        }
        .tab-content{
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            padding: 25px
        }
        .image {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 120px;
            width: 100%;
            height: 100%;
            object-fit: cover;  
            z-index: -1; 
            opacity: 0.2; 
        }
    </style>
    <div class="page-content">
        <img class="image" src="/images/building.png" alt="">
        <x-user-components.page-title>PROFILE</x-user-components.page-title>
        <div class="content">
            <h3 style="font-size: 24px">Profile Details</h3>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                        type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">Request</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false">Complaints</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="col text-center">
                            <div class="mb-3">
                                <img src="/images/profile-picture.png" class="modal-profile-image" style="width: 25%">
                                <p>{{ $authUser->email }}</p>
                            </div>
                            @if ($authUser->status == 'to verify')
                                <span class="badge text-bg-warning fs-6 mb-3">
                                    <i class='bx bx-shield-x'></i> {{ $authUser->status }}
                                </span>
                            @elseif ($authUser->status == 'verified')
                                <span class="badge text-bg-primary fs-6 mb-3">
                                    <i class='bx bxs-check-shield'></i> {{ $authUser->status }}
                                </span>
                            @endif
                        </div>
                        <div class="details text-start mt-3">
                            <div class="row-mb-6 mb-2">
                                <label for="firstname">First name</label>
                                <input type="text" class="form-control" value="{{ $authUser->firstname }}">
                            </div>
                            <div class="row-mb-6 mb-2">
                                <label for="lastname">Last name</label>
                                <input type="text" class="form-control" value="{{ $authUser->lastname }}">
                            </div>
                            <div class="row-mb-6 mb-2">
                                <label for="firstname">Contact no.</label>
                                <input type="text" class="form-control" value="{{ $authUser->contact_no }}">
                            </div>
                            @if (empty($authUser->google_id))
                                <div class="row-mb-6 mb-3">
                                    <label for="password">New Password</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                            @endif
                            <div class="d-flex justify-content-end align-items-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">
                    @foreach ($documentRequests as $documentRequest)
                        <div class="request_list">
                            <div class="row">
                                <div class="col-4 text-center" style="background-color: #1B2124">
                                    <!-- Left column with 30% width -->
                                    <img src="/images/dc.png" alt="" style="width: 100px">
                                </div>
                                <div class="col-8">
                                    @switch($documentRequest->request_status)
                                        @case('Pending')
                                            <span class="badge text-bg-secondary">{{ $documentRequest->request_status }}</span>
                                        @break

                                        @case('Processing')
                                            <span class="badge text-bg-primary">{{ $documentRequest->request_status }}</span>
                                        @break

                                        @case('Ready for pick up')
                                            <span class="badge text-bg-success">{{ $documentRequest->request_status }}</span>
                                        @break

                                        @case('Rejected')
                                            <span class="badge text-bg-danger">{{ $documentRequest->request_status }}</span>
                                        @break

                                        @case('Cancelled')
                                            <span class="badge text-bg-info">{{ $documentRequest->request_status }}</span>
                                        @break

                                        @default
                                            <span>Unknown Status</span>
                                    @endswitch
                                    <p class="document_type">{{ $documentRequest->request_file_name }}</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="request-btn" data-bs-toggle="modal"
                                            data-bs-target="#requestEditForm-{{ $documentRequest->id }}">Proceed
                                            <i class='bx bx-right-arrow-alt'></i>
                                        </button>
                                        <x-user-components.edit-request :requestForm="$documentRequest"
                                            modalId="#{{ $documentRequest->id }}" />

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                                                myModal.show();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                    tabindex="0">...</div>
            </div>
        </div>
    </div>
@endsection
