@props(['documentRequest', 'modalId'])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
aria-labelledby="{{ $modalId }}Label">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('documentRequest.update', $documentRequest->id ) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Request Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="firstname">First name</label>
                            <input type="text" value="{{ $documentRequest->firstname }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="firstname">Last name</label>
                            <input type="text" value="{{ $documentRequest->lastname }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="contact_no">Contact Number</label>
                            <input type="text" value="{{ $documentRequest->contact_no }}" id="contact_no" class="form-control" disabled>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email">Email</label>
                            <input type="text" value="{{ $documentRequest->email }}" id="email" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="documentRequest" class="col-form-label">Requested</label>
                            <input type="text" value="{{ $documentRequest->request_file_name }}" class="form-control" id="documentRequest" name="documentRequest" placeholder="First Name" disabled>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="number_copies" class="col-form-label">No. of copies</label>
                            <input type="text" class="form-control" value="{{ $documentRequest->number_copies }}" name="number_copies" placeholder="No. of copies" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="documentRequest" class="col-form-label">Preffered date</label>
                            <input type="text" value="{{ $documentRequest->preferred_date }}" class="form-control" id="preferred_date" name="preferred_date" placeholder="Preferred date" disabled>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="lastname" class="col-form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="Pending" {{ $documentRequest->request_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Processing" {{ $documentRequest->request_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Ready for pick up" {{ $documentRequest->request_status == 'Ready for pick up' ? 'selected' : '' }}>Ready to pick up</option>
                                <option value="Completed" {{ $documentRequest->request_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Rejected" {{ $documentRequest->request_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="request_purpose" class="col-form-label">Reason sof request</label>
                        <textarea class="form-control" name="request_purpose" id="request_purpose" cols="10" rows="5" disabled>{{ $documentRequest->request_purpose}}</textarea>
                    </div>
                    @if($documentRequest->request_status != 'Completed' && $documentRequest->request_status != 'Ready for pick up')
                        <div>
                            <label for="additional_message" class="col-form-label">Note</label>
                            <textarea class="form-control" name="additional_message" id="additional_message" cols="10" rows="5"></textarea>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
