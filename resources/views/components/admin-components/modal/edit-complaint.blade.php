@props(['modalId', 'complaint'])
@push('assets')
    <style>
        .image {
            width: 50%;
        }
    </style>
@endpush
<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Complaint</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('complaint.update', $complaint->id ) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="text-center">
                        <img class="image" src="{{ asset('storage/' . $complaint->complaint_image) }}"
                            alt="" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date_submitted">Date submitted</label>
                            <input type="text"
                                value="{{ \Carbon\Carbon::parse($complaint->created_at)->format('F j, Y, g:i A') }}"
                                class="form-control" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <select class="form-select" aria-label="Default select example" name="complaint_status">
                                <option value="Pending"
                                    {{ $complaint->complaint_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Review"
                                    {{ $complaint->complaint_status == 'In Review' ? 'selected' : '' }}>In Review
                                </option>
                                <option value="Resolved"
                                    {{ $complaint->complaint_status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="Escalated"
                                    {{ $complaint->complaint_status == 'Escalated' ? 'selected' : '' }}>Escalated
                                </option>
                                <option value="Rejected"
                                    {{ $complaint->complaint_status == 'Rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row-md-6 mb-3">
                        <label for="about" class="form-col-label">Complaint title</label>
                        <input type="text" class="form-control" id="about"
                            value="{{ $complaint->complaint_title }}" @disabled(true)>
                    </div>
                    <div class="row-md-6">
                        <label for="">Complaint detail</label>
                        <textarea class="form-control" name="" id="" cols="15" rows="5" @disabled(true)>{{ $complaint->complaint_detail }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
