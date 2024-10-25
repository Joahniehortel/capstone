
@props(['modalId', 'announcement'])
<style>
    .announcement_image{
        width: 150px;
    }
</style>
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
                    <img class="barangay_logo mb-3" src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
                    <div class="details" style="line-height: 0.3">
                    <div class="details" style="line-height: 0.3">
                        <p>Republic of the Philippines</p>
                        <p>Province of Davao del Sur</p>    
                        <p>Municipality of Davao City</p>
                        <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                    </div>
                </div>
                <div class="text-start mt-5 mb-3">
                    <h1 class="text-center" style="font-size: 24px">{{ $announcement->title }}</h1>
                    <div class="d-flex justify-content-center">
                        <img class="announcement_image" src="{{ Storage::url($announcement->image_path) }}" alt="Supporting File" style="width: 500px; height:250px" />
                    </div>
                    <p>{!! $announcement->content !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
