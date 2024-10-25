
@props(['modalId', 'announcement'])
<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ANNOUNCEMENT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="announcement-logo text-center mb-4">
                    <img src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
                    <div class="details" style="line-height: 0.3">
                    <div class="details" style="line-height: 0.3">
                        <p>Republic of the Philippines</p>
                        <p>Province of Davao del Sur</p>    
                        <p>Municipality of Davao City</p>
                        <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <div class="text-start w-100">
                        <h1 style="font-size: 24px" class="text-center">{{ $announcement->title }}</h1>
                        <div class="w-100 text-center">
                            <img class="image" style="width: 300px" src="{{ Storage::url($announcement->image_path) }}" alt="Supporting File" />
                        </div>
                        <p>{!! $announcement->content !!}</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
