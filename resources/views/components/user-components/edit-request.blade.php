@props(['requestForm', 'modalId'])

<div class="modal fade" id="modal-{{ $modalId }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.request.documentrequest.update', $requestForm->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Request Type</label>
                        <input type="text" value="{{ $requestForm->request_file_name }}" class="form-control"
                            id="recipient-name" disabled>
                        <input type="hidden" value="{{ $requestForm->request_file_name }}" name="request_file_name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="number-copies" class="col-form-label">Number of copies</label>
                            <input type="number" class="form-control @error('number_copies') is-invalid @enderror"
                                id="number-copies" value="{{ old('number_copies', $requestForm->number_copies) }}"
                                name="number_copies" required>
                            @error('number_copies')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="preferred-date" class="col-form-label">Preferred Date (Optional)</label>
                            <input type="date" class="form-control @error('preferred_date') is-invalid @enderror"
                                id="preferred-date" value="{{ old('preferred_date', $requestForm->preferred_date) }}"
                                name="preferred_date">
                            @error('preferred_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="request-purpose" class="col-form-label">Purpose of request</label>
                        <textarea class="form-control @error('request_purpose') is-invalid @enderror" name="request_purpose"
                            id="request-purpose" cols="30" rows="10" required>{{ old('request_purpose', $requestForm->request_purpose) }}</textarea>
                        @error('request_purpose')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-target="#{{ $modalId }}" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-submit btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
