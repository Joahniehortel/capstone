@push('assets')
    <link rel="stylesheet" href="/css/user-css/user-profile.css">
@endpush
@auth
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
    <div class="modal fade" id="view-profile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('user.profile.update', $authUser->id )}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">User's Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                    aria-selected="true" style="border-radius: 0px;"> My Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false" style="border-radius: 0px;">My
                                    Request</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false" style="border-radius: 0px;">My
                                    Complaint</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                {{-- <div class="mt-3 d-flex justify-content-end">
                                        <button id="editButton" class="btn btn-primary">Edit Profile</button>
                                    </div> --}}
                                    <div class="mb-3 mt-3 text-center">
                                        <img src="/images/gif.gif" class="modal-profile-image" style="width: 150px">
                                        <p> {{ $authUser->email }}</p>
                                        @if ($authUser->status == 'to verify')
                                            <span class="badge text-bg-warning fs-6 mb-3" >
                                                <i class='bx bx-shield-x'></i> {{ $authUser->request_status }} Verifying
                                            </span>
                                        @elseif ($authUser->status == 'verified')
                                            <span class="badge text-bg-primary fs-6 mb-3">
                                                <i class='bx bxs-check-shield'></i> {{ $authUser->request_status }} Verified
                                            </span>
                                        @elseif($authUser->status == 'unverified')
                                            <span style="cursor: pointer" class="badge text-bg-danger fs-6 mb-3" data-bs-toggle="modal" data-bs-target="#verifyAccountModal2">
                                                <i class='bx bx-shield-x'></i> {{ $authUser->request_status }} Unverified
                                            </span>
                                        @endif
                                    </div>
                                <div class="details text-start mt-3">
                                    <div class="row-mb-6 mb-2">
                                        <label for="firstname">First name</label>
                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $authUser->firstname) }}">
                                        @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row-mb-6 mb-2">
                                        <label for="lastname">Last name</label>
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $authUser->lastname) }}">
                                        @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row-mb-6 mb-2">
                                        <label for="contact_no">Contact no.</label>
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $authUser->contact_no) }}" maxlength="12">
                                        @error('contact_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    @if($authUser->google_id == '')
                                        <div class="row-md-6">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="row-md-6 mb-3">
                                            <label for="new_password">New Password</label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                            @error('new_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row-md-6 mb-3">
                                            <label for="confirm_new_password">Confirm New Password</label>
                                            <input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password">
                                            @error('confirm_new_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif                                  
                                    <div class="d-flex justify-content-end align-items-end">
                                        <button id="showButton" type="submit" class="btn btn-success" style="border-radius: 0px">Save Changes</button>
                                    </div>  
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
    
                                @if(!$documentRequests->isEmpty())
                                    @foreach ($documentRequests as $documentRequest)
                                        <div class="request_list mb-1">
                                            <div class="row requested_container" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px; padding:5px">
                                                <span class="document_type">{{ $documentRequest->request_file_name }}</span>
                                                <span><i class='bx bx-check-square'></i> {{ $documentRequest->request_status }}</span>
                                                <span class="document_requested_date"><i class='bx bxs-calendar-event'></i> {{ \Carbon\Carbon::parse($documentRequest->created_at)->format('F j, Y') }}</span>
                                                <div class="d-flex justify-content-end gap-2">
                                                    @if( $documentRequest->request_status == 'Pending' || $documentRequest->request_status == 'Processing' )
                                                        <button class="btn-update " type="button" data-bs-toggle="modal" data-bs-target="#modal-{{ $documentRequest->id }}">Update</button>
                                                        <form action="{{ route('user.documentRequest.destroy', $documentRequest->id )}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-cancel" type="submit">Cancel</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center mt-3">
                                        <img style="width: 100px" src="/images/folder.png" alt="">
                                        <p style="opacity: 0.5">No Request Found</p>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                                tabindex="0">
                                @if(!$complaints->isEmpty())
                                    @foreach ($complaints as $complaint)
                                        <div class="request_list">
                                            <div class="row">
                                                <div class="col-4 text-center" style="background-color: #1B2124">
                                                    <img src="/images/dc.png" alt="" style="width: 100px">
                                                </div>
                                                <div class="col-8">
                                                    @switch($complaint->complaint_status)
                                                        @case('Pending')
                                                            <span class="badge text-bg-secondary">{{ $complaint->complaint_status }}</span>
                                                        @break

                                                        @case('In Review')
                                                            <span class="badge text-bg-info">{{ $complaint->complaint_status }}</span>
                                                        @break

                                                        @case('Resolved')
                                                            <span class="badge text-bg-success">{{ $complaint->complaint_status }}</span>
                                                        @break

                                                        @case('Escalated')
                                                            <span class="badge text-bg-danger">{{ $complaint->complaint_status }}</span>
                                                        @break

                                                        @case('Rejected')
                                                            <span class="badge text-bg-dark">{{ $complaint->complaint_status }}</span>
                                                        @break
                                                    @default
                                                        <span class="badge text-bg-warning">Unknown Status</span>
                                                    @endswitch
                                                    <p>{{ $complaint->complaint_title}}</p>
                                                    <div class="d-flex justify-content-end">
                                                        @if( $complaint->complaint_status == 'Pending' || $complaint->complaint_status == 'Processing' )
                                                            <form action="{{ route('complaint.edit.details', $complaint->id ) }}" method="GET">
                                                                @csrf
                                                                <button type="submit">Update</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="text-center mt-3">
                                    <img style="width: 100px" src="/images/folder.png" alt="">
                                    <p style="opacity: 0.5">No Complaints Found</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <x-admin-components.modal.verify-account />
    @isset($documentRequests)
        @foreach ($documentRequests as $documentRequest)
            <x-user-components.edit-request :requestForm="$documentRequest" modalId="{{ $documentRequest->id }}" />
        @endforeach
    @endisset
@endauth
