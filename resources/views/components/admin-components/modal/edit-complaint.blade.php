@props(['modalId', 'complaint'])
@push('assets')
    <style>
        .image {
            width: 50%;
        }

        .no-file {
            width: 150px
        }

        .default-complaint {
            padding: 20px;
            text-align: center;
        }

        .default-complaint p {
            font-size: 16px
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
            @if (!empty($complaint->complaint_image))
                @isset($complaint)
                    @if (!empty($complaint->complaint_image))
                        @php
                            $extension = pathinfo($complaint->complaint_image, PATHINFO_EXTENSION);
                        @endphp
                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                            <div class="text-center">
                                <img src="{{ Storage::url($complaint->complaint_image) }}" alt="Complaint Image" width="50%" />
                                <div class="mt-2">
                                    <a href="{{ asset($complaint->complaint_image) }}" download class="btn btn-primary">
                                        Download Image
                                    </a>
                                </div>
                            </div>
                        @elseif ($extension === 'pdf')
                            <div style="padding: 20px">
                                <iframe src="{{ Storage::url($complaint->complaint_image)}}" width="100%"
                                    height="300px"></iframe>
                            </div>
                        @elseif (in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'mkv']))
                            <div style="padding: 20px">
                                <video controls width="100%">
                                    <source src="{{ Storage::url($complaint->complaint_image)}}"
                                        type="video/{{ pathinfo($complaint->complaint_image, PATHINFO_EXTENSION) }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @elseif (in_array($extension, ['mp3', 'wav', 'ogg']))
                            <div style="padding: 20px; display:flex; justify-content:center">
                                <audio controls>
                                    <source src="{{ Storage::url($complaint->complaint_image)}}"
                                        type="audio/{{ pathinfo($complaint->complaint_image, PATHINFO_EXTENSION) }}">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @else
                            <p class="text-center mt-3 mt-5">Unsupported file type.</p>
                        @endif
                    @endif
                @endif
            @else
                <div class="default-complaint d-flex flex-column align-items-center justify-content-center">
                    <img class="no-file mb-3" src="/images/attachment.png" alt="">
                    <p>No file submitted</p>
                </div>
            @endif
            <form action="{{ route('complaint.update', $complaint->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
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
                                        {{ $complaint->complaint_status == 'Resolved' ? 'selected' : '' }}>Resolved
                                    </option>
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
                        <div class="row-md-6">
                            <label for="">Note</label>
                            <textarea class="form-control" name="additional_message" id="" cols="15" rows="5"></textarea>
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
