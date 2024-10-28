

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/complaint.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo e(session('success')); ?>

                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
         <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="page-content">
        <?php if (isset($component)) { $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><span class="fs-1">EDIT COMPLAINT</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $attributes = $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $component = $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
        <div class="complain-content">
            <h1 class="fs-3" style="font-weight: 600; color:">COMPLAINT FORM</h1>
            <p>Please provide a detailed description of your complaint, including any relevant information that can help us address your concerns promptly</p>
            <form action="<?php echo e($complaint ? route('complaint.update.details', $complaint->id) : route('complaint.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="complain_title" class="col-form-label">Subject/Title of the Complaint</label>
                        <input class="form-control <?php $__errorArgs = ['complaint_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="complaint_title" placeholder="Complaint about..." name="complaint_title" value="<?php echo e(old('complaint_title', $complaint->complaint_title ?? '')); ?>" style="border: black 1px solid">
                        <?php $__errorArgs = ['complain_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                </div>
                <p>Optional: You may upload an image to support your complaint.</p>
                <div class="row d-flex justify-content-center aling-center">
                    <div class="modal-container d-flex justify-content-center flex-column" style="width: 100%">
                        <div class="complaint-image-area d-flex justify-content-center flex-column align-items-center" data-img="">
                            <?php if($complaint->complaint_image): ?>
                                <?php
                                    $fileExtension = pathinfo($complaint->complaint_image, PATHINFO_EXTENSION);
                                ?>
                                <?php if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                    <img src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" alt="Complaint Image" style="width: 100%;">
                                    <p class="file_name" style="word-break: break-all;"><?php echo e(basename($complaint->complaint_image)); ?></p>
                                <?php elseif($fileExtension === 'pdf'): ?>
                                    <div class="default" style="width: 100%; height: 100%;">
                                        <iframe src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" style="width: 100%; height:100%"></iframe>
                                    </div>
                                    <p class="file_name" style="word-break: break-all;"><?php echo e(basename($complaint->complaint_image)); ?></p>
                                <?php elseif(in_array($fileExtension, ['mp4', 'avi', 'mov', 'wmv'])): ?>
                                    <div class="video-container">
                                        <video controls>
                                            <source src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" type="video/<?php echo e($fileExtension); ?>">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <p class="file_name" style="word-break: break-all;"><?php echo e(basename($complaint->complaint_image)); ?></p>
                                <?php elseif($fileExtension === 'mp3'): ?>
                                    <audio class="default" controls style="width: 100%;">
                                    <source src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <p class="file_name" style="word-break: break-all;"><?php echo e(basename($complaint->complaint_image)); ?></p>
                                <?php else: ?>
                                    <p>Unsupported file type.                                    <i class='bx bx-file'></i></p>
                                <?php endif; ?>
                            <?php else: ?>
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload File</h3>
                                <p>File size must be less than <span>100MB</span>. Supported formats: Images, Videos, and PDFs</p>
                            <?php endif; ?>
                            <input type="file" id="file1" name="complaint_image" hidden>
                        </div>
                        <div class="updated-container">
                        </div>                        
                        <div class="file-area" style="width: 100%">
                        </div>
                            <progress id="uploadProgress" value="0" max="100" style="width: 100%; display: none;"></progress>
                            <div class="loading-indicator" style="display: none;">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="complaint-select-image" style="width: 100%">Upload File</button>
                        </div>
                    </div>   
                </div>
                <div class="loading-indicator" style="display: none;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <!-- Address -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="complaint_address">Address</label>
                        <input type="text" name="complaint_address" class="form-control <?php $__errorArgs = ['complaint_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('complaint_address', $complaint->complaint_address ?? '')); ?>" style="border: black 1px solid">
                        <?php $__errorArgs = ['complaint_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
            
                    <!-- Date Occurred -->
                    <div class="col-md-6 mb-3">
                        <label for="date_occured">Relevant Dates</label>
                        <input type="date" class="form-control <?php $__errorArgs = ['date_occured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_occured" value="<?php echo e(old('date_occured', $complaint->date_occured ?? '')); ?>" style="border: black 1px solid">
                        <?php $__errorArgs = ['date_occured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            
                <!-- Complaint Details -->
                <div class="com-md-6 mb-3">
                    <label for="complaint_detail" class="col-form-label">
                        Complaint Details
                        <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-placement="top" title="A detailed explanation of the issue"></i>
                    </label>
                    <textarea class="form-control <?php $__errorArgs = ['complaint_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="complaint_details" 
                    id="complaint_detail" 
                    rows="10" 
                    placeholder="Provide a detailed description of your complaint"
                    style="border: black 1px solid"><?php echo e(old('complaint_detail', $complaint->complaint_detail ?? '')); ?></textarea>
          
                    <?php $__errorArgs = ['complaint_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="d-flex justify-content-end align-items-end">
                    <button type="submit" class="submit"><?php echo e($complaint ? 'Submit' : 'Submit'); ?></button>
                </div>
            </form>            
        </div>
    </div>  
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
            <script>
                const selectButton = document.querySelector('.complaint-select-image');
                const inputFile = document.querySelector('#file1');
                const imgArea = document.querySelector('.complaint-image-area');
                const fileArea = document.querySelector('.file-area');
                const loadingIndicator = document.querySelector('.loading-indicator');
                const uploadProgress = document.getElementById('uploadProgress');
                const complaintImageArea = document.querySelector('.complaint-image-area');
                const imageContent = document.querySelector('.image-content');
                const updatedContent = document.querySelector('.updated-container');
                const file_name = document.querySelector('.file_name');

                function handleFileSelection(image) {
                    if (image.size < 100000000) { // Check for 100MB limit
                        file_name.style.display = 'none';
                        loadingIndicator.style.display = 'flex';
                        uploadProgress.style.display = 'block';
                        uploadProgress.value = 0;
        
                        const reader = new FileReader();
        
                        reader.onprogress = (event) => {
                            if (event.lengthComputable) {
                                const percentComplete = (event.loaded / event.total) * 100;
                                uploadProgress.value = percentComplete;
                            }
                        };
        
                        reader.onloadstart = () => {
                            uploadProgress.value = 0;
                        };
        
                        reader.onload = () => {
                        const allContent = imgArea.querySelectorAll('img, iframe, audio'); // Remove existing images/iframes/audios
                        allContent.forEach(item => item.remove());
        
                        const fileType = image.type;
        
                    if (fileType.startsWith('image/')) { // For image files

                        file_name.style.display = 'none';
                        complaintImageArea.style.display = 'block';
                        const img = document.createElement('img');
                        img.src = reader.result; // Display the image
                        img.width = '100%';
                        img.height = '200px';
                        imgArea.appendChild(img);
                        const fileNameDisplay = document.createElement('p');
                        fileNameDisplay.innerText = image.name; // Use image.name for file name
                        fileNameDisplay.style.textAlign = 'center';
                        imgArea.appendChild(fileNameDisplay); // Append name to file area
                    } else if (fileType === 'application/pdf') { // For PDF files 
                        file_name.style.display = 'none';
                        const iframe = document.createElement('iframe');
                        iframe.src = reader.result; // Display the PDF in iframe
                        iframe.width = '100%';
                        iframe.height = '500px';
                        imgArea.appendChild(iframe);
        
                        const fileNameDisplay = document.createElement('p');
                        fileNameDisplay.innerText = image.name; // Use image.name for file name
                        fileNameDisplay.style.textAlign = 'center';
                        imgArea.appendChild(fileNameDisplay); // Append name to file area
                    }
                    else if (fileType === 'audio/mpeg') { // For MP3 files
                        file_name.style.display = 'none';
                        const audio = document.createElement('audio');
                        audio.src = reader.result; 
                        audio.controls = true;
                        audio.style.width = '100%'; 
                        imgArea.appendChild(audio);
                        const fileNameDisplay = document.createElement('p');
                        fileNameDisplay.innerText = image.name; // Use image.name for file name
                        fileNameDisplay.style.textAlign = 'center';
                        imgArea.appendChild(fileNameDisplay); // Append name to file area
                    }
                    else if (fileType.startsWith('video/')) { // Video files
        
                        // Create and style the video element
                        file_name.style.display = 'none';
                        const video = document.createElement('video');
                        video.controls = true; 
                        video.style.width = '100%';
                        video.style.height = '300px';
        
                        const source = document.createElement('source');
                        source.src = reader.result; 
                        source.type = fileType;
        
                        video.appendChild(source); 
                        imgArea.appendChild(video); // Append video to file area
        
                        // Display the file name
                        const fileNameDisplay = document.createElement('p');
                        fileNameDisplay.innerText = image.name; // Use image.name for file name
                        fileNameDisplay.style.textAlign = 'center';
                        imgArea.appendChild(fileNameDisplay); // Append name to file area
        
                        // Hide loading indicator
                        loadingIndicator.style.display = 'none';
                    }
                    else {
                        const unsupportedMsg = document.createElement('p');
                        unsupportedMsg.innerText = 'Unsupported file type.';
                        imgArea.appendChild(unsupportedMsg);
                    }
        
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
        
                    loadingIndicator.style.display = 'none';
                    uploadProgress.style.display = 'none';
                };
        
                reader.readAsDataURL(image); // Read the file as data URL
                    } else {
                        alert("File size is more than 100MB."); // Error for files larger than 100MB
                    }
                }
                // Open the file dialog on button click
                selectButton.addEventListener('click', function () {
                    inputFile.value = ''; // Reset the input value to allow re-selection of the same file
                    inputFile.click();
                });
        
                // Process the selected file when it changes
                inputFile.addEventListener('change', function () {
                    const file = this.files[0]; // Get the selected file
                    if (file) {
                        handleFileSelection(file); // Process the selected file
                    }
                });
            </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('components.user-components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/user/services/complaint-edit.blade.php ENDPATH**/ ?>