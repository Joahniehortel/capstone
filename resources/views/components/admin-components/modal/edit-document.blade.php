@props(['modalId', 'document'])

<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Document</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.document.update', $document->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row-md-6">
                        <div class="col">
                            <label for="file_name" class="col-form-label">Document name</label>
                            <input class="form-control" type="text" value="{{ $document->file_name }}" id="file_name"
                                name="file_name">
                        </div>
                    </div>
                    <div class="row-md-6">
                        <label for="file_details" class="col-form-label">Document details</label>
                        <textarea class="form-control" name="file_details" id="file_details" cols="30" rows="10">{{ $document->file_details }}</textarea>
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
