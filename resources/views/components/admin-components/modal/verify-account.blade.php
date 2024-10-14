<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
.modal-body-verify {
	display: flex;
	justify-content: center;
	align-items: center;
	background: white;
}
.modal-container {
	max-width: 400px;
	width: 100%;
	background: #fff;
	padding: 30px;
	border-radius: 30px;
}
.img-area {
	position: relative;
	width: 100%;
	height: 240px;
	background: #f2f2f2;
	margin-bottom: 30px;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.img-area .icon {
	font-size: 100px;
}
.img-area h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
}
.img-area p {
	color: #999;
}
.img-area p span {
	font-weight: 600;
}
.img-area img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area::before {
	content: attr(data-img);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, .5);
	color: #fff;
	font-weight: 500;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: center;
	pointer-events: none;
	opacity: 0;
	transition: all .3s ease;
	z-index: 200;
}
.img-area.active:hover::before {
	opacity: 1;
}
.select-image {
	display: block;
	width: 100%;
    padding: 5px 10px;
	background: var(--blue);
	color: #fff;
	font-weight: 500;
	font-size: 16px;
	border: none;
	cursor: pointer;
	transition: all .3s ease;
}
.select-image:hover {
	background: #443636;
}
</style>
<div class="modal fade" id="verifyAccountModal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="verifyAccountModalLabel">Verify Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.verify.account') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body-verify">
                    <div class="modal-container">
                        <div>Upload any supporting document</div>
                        <input type="file" id="file" name="image" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image mb-3">Select Image</button>
                        <button type="submit" class="w-100 btn btn-success">Submit</button>      
                    </div>         
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view-profile">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        const selectImage = document.querySelector('.select-image');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function () {
            inputFile.click();
        })

        inputFile.addEventListener('change', function () {
            const image = this.files[0]
            if(image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = ()=> {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item=> item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                }
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 2MB");
            }
        })
    </script>
@endpush