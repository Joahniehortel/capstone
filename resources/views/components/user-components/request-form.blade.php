@props(['requestForm', 'modalId'])
<style>
    .btn.btn-primary{
        background-color: #6D4C41;
        transform: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        box-sizing: border-box;
        border: none;
        border-radius: 0px;
    }
</style>
<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.request.documentrequest', $requestForm->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $authUser->contact_no}}" name="contact_no">
                    <div class="mb-3">
                        <input type="hidden" value="TANGINANMOO" name="date_requested">
                        <p>{{ $requestForm->file_details }}</p>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Request Type</label>
                            <input type="text" value="{{ $requestForm->file_name }}" class="form-control @error('request_file_name') is-invalid @enderror" id="recipient-name" disabled>
                            <input type="hidden" value="{{ $requestForm->file_name }}" name="request_file_name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="number-copies" class="col-form-label">Number of copies</label>
                                <input type="number" class="form-control @error('number_copies') is-invalid @enderror" id="number-copies" name="number_copies">
                                @error('number_copies')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="preferred-date" class="col-form-label">Preferred Date (Optional)</label>
                                <input type="date" class="form-control @error('preferred_date')is-invalid @enderror" id="preferred-date" name="preferred_date">
                                @error('preferred_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="request-purpose" class="col-form-label">Purpose of request</label>
                        <textarea class="form-control @error('request_purpose')is-invalid @enderror" name="request_purpose" id="request-purpose" cols="30" rows="10"></textarea>
                        @error('request_purpose')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
