@props(['resident', 'modalId'])

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-view-residents-profile.css">
@endpush

<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h1 class="modal-title fs-5" id="{{ $modalId }}Label">Resident's Profile</h1>
            </div>
            <div class="modal-body">
                <div class="form-content">
                    <div class="left">
                        <div class="row">
                            <div class="col">
                                <div class="modal-container">
                                    <input type="file" id="file" name="image" hidden>
                                    <div class="img-area" data-img="">
                                        <i class='bx bxs-cloud-upload icon'></i>
                                        @if($resident->image != null)
                                            <img class="image" src="{{ Storage::url($resident->image) }}" alt="Supporting File" />
                                        @else
                                            @if($resident->gender == 'Male')
                                                <img class="image" src="/images/man.jpg" alt="">
                                            @elseif($resident->gender == 'Female')
                                                <img class="image" src="/images/user-women.png" alt="">
                                            @endif
                                        @endif
                                    
                                        <h3>Upload Image</h3>
                                        <p>Image size must be less than <span>2MB</span></p>
                                    </div>
                                </div>
                                <script>
                                    const selectImage = document.querySelector('.select-image');
                                    const inputFile = document.querySelector('#file');
                                    const imgArea = document.querySelector('.img-area');
        
                                    selectImage.addEventListener('click', function() {
                                        inputFile.click();
                                    });
        
                                    inputFile.addEventListener('change', function() {
                                        const image = this.files[0];
                                        if (image.size < 2000000) {
                                            const reader = new FileReader();
                                            reader.onload = () => {
                                                const allImg = imgArea.querySelectorAll('img');
                                                allImg.forEach(item => item.remove());
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
                                    });
                                </script>
                            </div>
                            <div class="col">
                                <h4>IN CASE OF EMERGENCY</h4>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="full_name" class="label-group">Full name</label>
                                        <input type="text" id="full_name" class="form-control @error('ice_fullname') is-invalid @enderror" value="{{ $resident->ice_fullname}}" name="ice_fullname" disabled>
                                        @error('ice_fullname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label for="Address" class="label-group">Address</label>
                                        <input type="text" id="Address" class="form-control @error('ice_address') is-invalid @enderror" value="{{ $resident->ice_address }}" name="ice_address" disabled>
                                        @error('ice_address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="row-mb-6 mb-3">
                                        <div class="col mb-3">
                                            <label for="Relationship" class="label-group">Relationship</label>
                                            <input type="text" id="Relationship" class="form-control @error('ice_relationship') is-invalid @enderror" value="{{ $resident->ice_relationship }}" name="ice_relationship" disabled>
                                            @error('ice_relationship')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="contact_number" class="label-group">Contact number</label>
                                            <input type="text" id="contact_number" class="form-control  @error('ice_contactNumber') is-invalid @enderror" value="{{ $resident->ice_contactNumber }}" name="ice_contactNumber" disabled>
                                            @error('ice_contactNumber')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        @csrf
                        <h4>PERSONAL INFORMATION</h4>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="label-group" for="firstname">First name</label>
                                <input class="form-control @error('firstName') is-invalid @enderror" type="text" value="{{ $resident->firstName }}" name="firstName" id="firstname" disabled>
                                @error('firstName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="middlename">Middle name</label>
                                <input class="form-control @error('middleName') is-invalid @enderror" type="text" value="{{ $resident->middleName }}" name="middleName" id="lastname" disabled>
                                @error('middleName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="lastname">Last name</label>
                                <input class="form-control  @error('lastName') is-invalid @enderror" value="{{ $resident->lastName }}" type="text" name="lastName" id="lastname" disabled>
                                @error('lastName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="label-group" for="birth_date">Birth Date</label>
                                <input class="form-control @error('birthDate') is-invalid @enderror" type="date" value="{{ $resident->birthDate }}" name="birthDate" id="birth_date" disabled>
                                @error('birthDate')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="age">Age</label>
                                <input class="form-control @error('age') is-invalid @enderror" value="{{ $resident->age }}" type="number" name="age" id="birth_date" disabled>
                                @error('age')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="Birth place">Birth place</label>
                                <input class="form-control @error('birthPlace') is-invalid @enderror" value="{{ $resident->birthPlace }}" type="text" name="birthPlace" id="birth_date" disabled>
                                @error('birthPlace')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="cars">Select Gender</label>
                                <select id="cars" name="gender" class="form-select @error('gender') is-invalid @enderror" disabled>
                                    <option value="Male" {{ $resident->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $resident->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>                        
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="address" class="label-group">Adress</label>
                                <input class="form-control @error('address') is-invalid @enderror" value="{{ $resident->address }}" type="text" name="address" id="address" disabled>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="purokNumber" class="label-group">Purok #</label>
                                <input class="form-control @error('purokNumber') is-invalid @enderror" value="{{ $resident->purokNumber }}" type="text" name="purokNumber" id="purokNumber" disabled>
                                @error('purokNumber')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="totalHousehold" class="label-group">Total Household</label>
                                <input class="form-control @error('totalHousehold') is-invalid @enderror" value="{{ $resident->totalHousehold }}" type="text" name="totalHousehold" id="totalHousehold" disabled>
                                @error('totalHousehold')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="label-group" for="voter">Voter</label>
                                <select id="voter" name="voter" class="form-control @error('voter') is-invalid @enderror" disabled>
                                    <option value="Yes" {{ $resident->voter == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $resident->voter == 'No' ? 'selected' : '' }}>No</option>
                                </select>                        
                                @error('voter')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="maritalStatus">Marital Status</label>
                                <select id="maritalStatus" name="maritalStatus" class="form-control @error('maritalStatus') is-invalid @enderror" disabled>
                                    <option value="single" {{ $resident->maritalStatus == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ $resident->maritalStatus == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ $resident->maritalStatus == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="separated" {{ $resident->maritalStatus == 'separated' ? 'selected' : '' }}>Separated</option>
                                </select>                        
                                @error('maritalStatus')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="nationality">Nationality</label>
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" value="{{ $resident->nationality }}" name="nationality" id="nationality" disabled>
                                @error('nationality')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="label-group" for="Religion">Religion</label>
                                <input type="text" class="form-control @error('religion') is-invalid @enderror" value="{{ $resident->religion == null ? 'None' : $resident->religion }}" name="religion" id="Religion" disabled>
                            </div>
                            @error('religion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label class="label-group" for="PWD">PWD</label>
                                        <select id="PWD" name="pwd" class="form-control @error('pwd') is-invalid @enderror" disabled>
                                            <option value="Yes" {{ $resident->pwd == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $resident->pwd == 'No' ? 'selected' : '' }}>No</option>
                                        </select>                                
                                        @error('religion')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="ethnicity" class="label-group">Ethnicity</label>
                                        <input type="text" class="form-control @error('ethnicity') is-invalid @enderror" value="{{ $resident->ethnicity == null ? 'None'  : $resident->ethnicity }}" name="ethnicity" id="ethnicity" disabled>
                                        @error('ethnicity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="occupation" class="label-group">Occupation</label>
                                        <input type="text" class="form-control" name="occupation @error('occupation') is-invalid @enderror" value="{{ $resident->occupation == null ? 'None' : $resident->occupation }}" id="occupation" disabled>
                                        @error('occupation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="MonthlyIncome" class="label-group">Monthly Income</label>
                                        <input type="text" class="form-control @error('MonthlyIncome') is-invalid @enderror" value="{{ $resident->MonthlyIncome == null ? 'None' : $resident->MonthlyIncome }}" name="MonthlyIncome" id="MonthlyIncome" disabled>
                                        @error('MonthlyIncome')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
