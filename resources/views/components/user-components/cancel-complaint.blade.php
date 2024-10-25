@props(['complaintForm', 'modalId'])

<div class="modal fade" id="cancel-complaint-{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header d-flex align-items-center">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Cancel Complaint</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this complaint?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#view-profile" data-bs-toggle="modal">Close</button>
                <form action="{{ route('complaint.destroy', $complaintForm->id )}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
