@props(['announcement', 'modalId'])

@push('assets')
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3); 
        }
    </style>
@endpush

<div class="modal fade" id="delete{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h1 class="modal-title fs-5" id="{{ $modalId }}Label">Confirm Deletion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('admin.announcement.destroy', $announcement->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
