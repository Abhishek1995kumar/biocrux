@extends('layouts.admin')

@section('title', 'Add ' . (Request::get('type') == 'worker' ? 'Worker' : 'User'))

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Add {{Request::get('type') == 'worker' ? 'Woker':'User'}}</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        @if(Request::get('type') == 'worker')
        <a href="{{url('/admin/worker')}}" class="text-muted text-hover-primary">Workers</a>
        @else
        <a href="{{url('/admin/user')}}" class="text-muted text-hover-primary">Users</a>
        @endif
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Add {{Request::get('type') == 'worker' ? 'Woker':'User'}}</li>
</ul>
@endsection

@section('content')
<form action="{{url('/admin/user/add')}}" id="kt_modal_add_form" enctype="multipart/form-data" method="post" autocomplete="off">
    @csrf
    <input type="hidden" id="type" name="type" value="{{Request::get('type')}}">
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header">
                    <h3 class="card-title">Profile Image</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-center flex-column py-5">
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/blank.png')">
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/media/blank.png')"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change file">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel file">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove file">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                    </div>
                </div>
            </div>
            <div class="card mb-5 mb-xl-8">
                <div class="card-header">
                    <h3 class="card-title">Status</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <select class="form-select" data-control="select2" data-hide-search="true" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-lg-row-fluid ms-lg-15">
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'general' ? 'active' : ''}}" data-bs-toggle="tab" id="general" href="#generalTab" onclick="tabClicked('general')">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'address' ? 'active' : ''}}" data-bs-toggle="tab" id="address" href="#addressTab" onclick="tabClicked('address')">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'personal' ? 'active' : ''}}" data-bs-toggle="tab" id="personal" href="#personalTab" onclick="tabClicked('personal')">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'legal' ? 'active' : ''}}" data-bs-toggle="tab" id="legal" href="#legalTab" onclick="tabClicked('legal')">Legal</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'benefits' ? 'active' : ''}}" data-bs-toggle="tab" id="benefits" href="#benefitsTab" onclick="tabClicked('benefits')">Benefits</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'scrapyard' ? 'active' : ''}}" data-bs-toggle="tab" id="scrapyard" href="#scrapyardTab" onclick="tabClicked('scrapyard')">Scrapyard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'expertise' ? 'active' : ''}}" data-bs-toggle="tab" id="expertise" href="#expertiseTab" onclick="tabClicked('expertise')">Expertise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 disabled {{Request::get('tab') == 'documents' ? 'active' : ''}}" data-bs-toggle="tab" id="documents" href="#documentsTab" onclick="tabClicked('documents')">Documents</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade {{Request::get('tab') == 'general' ? 'show active' : ''}}" id="generalTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">

                                <!-- <div class="col-md-4 fv-row mb-3" id="uidDiv">
                                    <label class="required fs-6 fw-semibold mb-2">Registration Number</label>
                                    <input type="text" class="form-control " placeholder="Enter Id" id="uid" name="uid" onkeyup="uidValidation()" required />
                                    <span id="unamevalid" style="color: #f1416c; font-size: .925rem; margin-top: 0.5rem"></span>
                                </div> -->
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Name (Display name)</label>
                                    <input type="text" class="form-control textOnly" placeholder="Enter Employee Name" id="name" name="name" required />
                                    <span id="enamevalid" style="color: #f1416c; font-size: .925rem; margin-top: 0.5rem"></span>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Email </label>
                                    <input type="email" class="form-control " onkeyup="checkEmail()" placeholder="Enter Your Email" id="email" name="email" autocomplete="off" />
                                    <span id="emailTitle" style="color: #f1416c; font-size: .925rem; margin-top: 0.5rem"></span>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Phone Number </label>
                                    <input type="tel" class="form-control numOnly" onkeyup="checkPhone()" placeholder="Enter Phone Number" id="phone" name="phone" maxlength="10" required />
                                    <span id="phoneTitle" style="color: #f1416c; font-size: .925rem; margin-top: 0.5rem"></span>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Joining Date</label>
                                    <input type="date" class="form-control " id="joiningDate" name="joiningDate" max="{{date('Y-m-d')}}" required />
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <?php
                                    $dobLimit = date('Y-m-d', strtotime('-18 years'));
                                    ?>
                                    <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" max="{{$dobLimit}}" required />
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Gender</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-8 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2"> Languages spoken (seperate by comma) </label>
                                    <input type="text" class="form-control " placeholder="Languages Spoken" id="languagesSpoken" name="languagesSpoken" />
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="required fs-6 fw-semibold mb-2">Select Role </label>
                                        <a href="{{url('/admin/role')}}" target="_blank" class="badge badge-success ">+ Add New</a>
                                    </div>
                                    <select class="form-select " data-control="select2" data-placeholder="Select Role" data-hide-search="true" onchange="roleChanged()" name="role" id="role" required>
                                        <option value=""></option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->slug}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 fv-row mb-3" id="passwordDiv" style="display: none;">
                                    <label class="required fs-6 fw-semibold mb-2">Password</label>
                                    <input type="password" class="form-control " id="password" name="password" placeholder="Enter Password" autocomplete="off" />
                                </div>

                                <div class="col-md-6 fv-row mb-8" id="confirmPasswordDiv" style="display: none;">
                                    <label class="required fs-6 fw-semibold mb-2">Confirm Password</label>
                                    <input placeholder="Repeat Password" id="cpassword" onkeyup="confirmPassword()" type="password" autocomplete="off" class="form-control" autocomplete="off" />
                                    <span id="passwordTitle" style="color: #f1416c; font-size: .925rem; margin-top: 0.5rem"></span>
                                </div>

                                <div class="col-md-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Comments</label>
                                    <textarea type="text" class="form-control" placeholder="Enter Your Comments" id="comment" name="comment"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{Request::get('tab') == 'address' ? 'show active' : ''}}" id="addressTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!-- <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h2 class="mb-1">Assign Skills</h2>
                                <div class="fs-6 fw-semibold text-muted">Select the tests that the user can perform</div>
                            </div>
                        </div> -->
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Current Accommodation</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" onchange="accommodationChange()" name="accommodation" id="accommodation">
                                        <option value="Owned">Owned</option>
                                        <option value="Rented">Rented</option>
                                        <option value="Employer Provided (Inside Scrapyard)">Employer Provided (Inside Scrapyard)</option>
                                        <option value="Employer Provided (Outside Scrapyard)">Employer Provided (Outside Scrapyard)</option>
                                        <option value="Homeless">Homeless</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-8 fv-row mb-3" id="specifyDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Specify</label>
                                    <input type="text" class="form-control " placeholder="Specify if not mentioned" id="other" name="other" />
                                </div>
                                <hr class="my-5">
                            </div>

                            <!-- Current Address -->
                            <div class="" id="currentAddDiv">
                                <div class="row g-3">
                                    <div class="flex-column">
                                        <h2 class="mb-1">Current Address</h2>
                                        <div class="fs-6 fw-semibold text-muted">Enter the current address of the employee</div>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">Address Line 1</label>
                                        <input type="text" class="form-control address" placeholder="Enter Address Line 1" id="addressLine1Current" name="addressLine1Current" required />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                        <input type="text" class="form-control" placeholder="Enter Address Line 2" id="addressLine2Current" name="addressLine2Current" />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">State</label>
                                        <select class="form-select address" data-control="select2" data-hide-search="false" data-placeholder="Select State" name="stateCurrent" id="stateCurrent" required>
                                            <option value=""></option>
                                            @foreach ($states as $state)
                                            <option value="{{$state->state}}">{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">District</label>
                                        <input type="text" class="form-control address" placeholder="Enter District" id="districtCurrent" name="districtCurrent" required />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">City</label>
                                        <input type="text" class="form-control address" placeholder="Enter City" id="cityCurrent" name="cityCurrent" required />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">Pincode</label>
                                        <input type="tel" class="form-control address numOnly" placeholder="Enter Pincode" id="pincodeCurrent" name="pincodeCurrent" maxlength="6" required />
                                    </div>
                                    <hr class="my-5">
                                </div>
                            </div>

                            <!-- Original Address -->
                            <div class="" id="originalAddDiv">
                                <div class="row g-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-column">
                                            <h2 class="mb-1">Permanent Address</h2>
                                            <div class="fs-6 fw-semibold text-muted">Enter the permanent address of the employee</div>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid gap-3">
                                            <input class="form-check-input" type="checkbox" onchange="sameAsCurrentAddressChanged()" id="sameAsCurrent" name="sameAsCurrent" />
                                            <label class="form-check-label-active" for="sameAsCurrent">Same as Current Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">Address Line 1</label>
                                        <input type="text" class="form-control address" placeholder="Enter Address Line 1" id="addressLine1Permanent" name="addressLine1Permanent" required />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                        <input type="text" class="form-control" placeholder="Enter Address Line 2" id="addressLine2Permanent" name="addressLine2Permanent" />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">State</label>
                                        <select class="form-select address" data-control="select2" data-hide-search="false" data-placeholder="Select State" name="statePermanent" id="statePermanent" required>
                                            <option value=""></option>
                                            @foreach ($states as $state)
                                            <option value="{{$state->state}}">{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">District</label>
                                        <input type="text" class="form-control address" placeholder="Enter District" id="districtPermanent" name="districtPermanent" required />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">City</label>
                                        <input type="text" class="form-control address" placeholder="Enter City" id="cityPermanent" name="cityPermanent" required />
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-semibold mb-2 required">Pincode</label>
                                        <input type="tel" class="form-control address numOnly" placeholder="Enter Pincode" id="pincodePermanent" name="pincodePermanent" maxlength="6" required />
                                    </div>
                                    <hr class="my-5">
                                </div>
                            </div>

                            <!-- Emergency Contact -->
                            <div class="" id="emergencyContactDiv">
                                <div class="row g-3">
                                    <div class="flex-column">
                                        <h2 class="mb-1">Emergency Contact</h2>
                                        <div class="fs-6 fw-semibold text-muted">Enter the emergency contact details of the employee</div>
                                    </div>

                                    <!-- Emergency Contact 1 -->
                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="emergencyName1" name="emergencyName1" />
                                    </div>

                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Phone Number</label>
                                        <input type="number" class="form-control numOnly" placeholder="Enter Phone Number" id="emergencyPhone1" name="emergencyPhone1" />
                                    </div>

                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Relation</label>
                                        <input type="text" class="form-control" placeholder="Enter Relation" id="emergencyRelation1" name="emergencyRelation1" />
                                    </div>

                                    <!-- Emergency Contact 2 -->
                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="emergencyName2" name="emergencyName2" />
                                    </div>

                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Phone Number</label>
                                        <input type="number" class="form-control numOnly" placeholder="Enter Phone Number" id="emergencyPhone2" name="emergencyPhone2" />
                                    </div>

                                    <div class="col-md-4 fv-row mb-3">
                                        <label class="fs-6 fw-semibold mb-2">Relation</label>
                                        <input type="text" class="form-control" placeholder="Enter Relation" id="emergencyRelation2" name="emergencyRelation2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{Request::get('tab') == 'personal' ? 'show active' : ''}}" id="personalTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Marital Status</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" onchange="maritalStatusChange()" name="maritalStatus" id="maritalStatus">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widow/Widower">Widow/Widower</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 fv-row mb-3" id="specifyMaritalDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Specify</label>
                                    <input type="text" class="form-control " placeholder="Specify if not mentioned" id="otherMarital" name="otherMarital" />
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Highest Education</label>
                                    <input type="text" class="form-control " placeholder="Enter Highest Education" id="highestEducation" name="highestEducation" />
                                </div>
                                <hr class="my-5">
                            </div>
                            <div class="row g-3">
                                <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Number of Household Members in the Worker's Family</label>
                                    <input type="number" class="form-control" placeholder="Eg: 2" id="householdMembers" name="householdMembers" />
                                </div>

                                <!-- <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Number of Household Members of the Worker, working in Current Scrapyard - (Excluding the worker in question)</label>
                                    <input type="number" class="form-control" placeholder="Eg: 2" id="householdMembersCurrent" name="householdMembersCurrent" />
                                </div> -->

                                <div class="col-12 fv-row mb-3 children" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Number of Children of Worker</label>
                                    <input type="number" class="form-control" placeholder="Eg: 2" id="children" name="children" />
                                </div>

                                <div class="col-12 fv-row mb-3 children" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Number of Children Studying</label>
                                    <input type="number" class="form-control" placeholder="Eg: 2" id="childrenStudying" name="childrenStudying" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{Request::get('tab') == 'legal' ? 'show active' : ''}}" id="legalTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has Caste Certificate?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="casteCertificate" id="casteCertificate">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has any PF Account?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="pfAccount" id="pfAccount" onchange="pfAccountChanged()">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row mb-3" id="pfDiv">
                                    <label class="required fs-6 fw-semibold mb-2">PF Number</label>
                                    <input type="text" class="form-control" placeholder="Enter PF Number" id="pfAccountNumber" name="pfAccountNumber" />
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has Bank Account?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="bankAccount" id="bankAccount" onchange="bankAccountChange()">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row mb-3 bankDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Name with Bank</label>
                                    <input type="text" class="form-control bankAccount" placeholder="Enter Name" id="bankAccountName" name="bankAccountName" />
                                </div>
                                <div class="col-md-3 fv-row mb-3 bankDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Branch Name</label>
                                    <input type="text" class="form-control bankAccount" placeholder="Enter Branch Name" id="bankAccountBranch" name="bankAccountBranch" />
                                </div>
                                <div class="col-md-3 fv-row mb-3 bankDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Account Number</label>
                                    <input type="text" class="form-control bankAccount" placeholder="Enter Account Number" id="bankAccountNumber" name="bankAccountNumber" data-validation="bankAccountNumber" data-title="Account Number" />
                                </div>
                                <div class="col-md-3 fv-row mb-3 bankDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">IFSC Code</label>
                                    <input type="text" class="form-control bankAccount" placeholder="Enter IFSC Code" id="bankAccountIFSC" name="bankAccountIFSC" data-validation="bankAccountIFSC" data-title="IFSC Code" />
                                </div>

                                <!-- <div class="col-md-4 fv-row mb-3" id="occupationalDiv">
                                    <label class="fs-6 fw-semibold mb-2">If yes, Select Type</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="occupationalType" id="occupationalType">
                                        <option value="Formal">Formal</option>
                                        <option value="Informal Written">Informal Written</option>
                                        <option value="Informal Verbal">Informal Verbal</option>
                                    </select>
                                </div> -->

                                <!-- <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has a Ration Card?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="rationCard" id="rationCard">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>har
                                </div> -->
                                <!-- <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has Health Insurance?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="healthInsurance" id="healthInsurance">
                                        <option value="Yes, Pink Ration Card (Above Poverty Line)">Yes, Pink Ration Card (Above Poverty Line)</option>
                                        <option value="Yes, Pink Ration Card (Below Poverty Line)">Yes, Pink Ration Card (Below Poverty Line)</option>
                                        <option value="No">No</option>
                                    </select>
                                </div> -->
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Aadhar Card Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Aadhar Card Number" id="aadhar" name="aadhar" maxlength="12" data-validation="aadharNumber" data-title="Aadhar Number" validate />
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Pan Card Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Pan Card Number" maxlength="10" id="pan" name="pan" data-validation="panNumber" data-title="Pancard Number" validate />
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">UAN Number</label>
                                    <input type="text" class="form-control" placeholder="Enter UAN Number" id="UANNumber" name="UANNumber" />
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Government Benefit</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="govtBenefit" id="govtBenefit">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Has any Occupational Agreement?</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" name="occupationalAgreement" id="occupationalAgreement">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Caste</label>
                                    <select class="form-select " data-control="select2" data-hide-search="true" onchange="casteChange()" name="caste" id="caste">
                                        <option value="General">General</option>
                                        <option value="Scheduled Tribe">Scheduled Tribe</option>
                                        <option value="Scheduled Caste">Scheduled Caste</option>
                                        <option value="Other Backward Caste">Other Backward Caste</option>
                                        <option value="Not Aware">Not Aware</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row mb-3" id="specifyCastDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Specify</label>
                                    <input type="text" class="form-control " placeholder="Specify if not mentioned" id="otherCaste" name="otherCaste" />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Any other ID issued by Government to the Worker?</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select class="form-select " data-control="select2" data-hide-search="true" onchange="otherGovtIdChanged()" id="otherGovtIdFlag" name="otherGovtIdFlag">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-10" id="otherGovtIdDiv" style="display: none; gap: 10px;">
                                            <input type="text" class="form-control otherGovt" placeholder="Specify Document Name *" id="otherGovtDocName" name="otherGovtDocName" />
                                            <input type="text" class="form-control otherGovt" placeholder="Specify Document Number *" id="otherGovtDocNumber" name="otherGovtDocNumber" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row g-3">
                                <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">If there is any other ID card issued by Municipality/Local Body please mention the ID type?</label>
                                    <div class="" id="muncipaltyDiv" style="display: flex; gap: 10px;">
                                        <input type="text" class="form-control" placeholder="Specify Document type" id="muncipaltyType" name="muncipaltyType" />
                                        <input type="text" class="form-control" placeholder="Specify Document Number" id="muncipaltyNumber" name="muncipaltyNumber" />
                                    </div>
                                </div>
                            </div> -->
                            <hr>
                            <div class="row">
                                <div class="col-md-12 fv-row mt-3">
                                    <h3>Nominee Details</h3>
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Name</label>
                                    <input type="text" class="form-control " placeholder="Enter Name" id="nomineeName" name="nomineeName" />
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Relation</label>
                                    <input type="text" class="form-control " placeholder="Enter Relation" id="nomineeRelationship" name="nomineeRelationship" />
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Date of birth</label>
                                    <input type="date" max="{{date('Y-m-d')}}" class="form-control" id="nomineeDOB" name="nomineeDOB" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-pane fade {{Request::get('tab') == 'benefits' ? 'show active' : ''}}" id="benefitsTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Health Insuarance</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" onchange="healthInsuaranceChanged()" name="healthInsuarance" id="healthInsuarance">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-8 fv-row mb-3" id="insuaranceDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Type</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="insuaranceType" id="insuaranceType">
                                        <option value="Pays for my Treatment">Pays for my Treatment</option>
                                        <option value="Pays completely for my Insurance">Pays completely for my Insurance</option>
                                        <option value="Pays partially for my Insurance">Pays partially for my Insurance</option>
                                    </select>
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Maternity Leave</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" onchange="maternityChanged()" name="maternityLeave" id="maternityLeave">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4 fv-row mb-3" id="maternityTypeDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Maternity Leave Type</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="maternityLeaveType" id="maternityLeaveType">
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                    </select>
                                </div>
                                <div class="col-md-4 fv-row mb-3" id="maternityDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">How many Months</label>
                                    <input type="number" class="form-control" placeholder="Eg: 2" id="maternityMonth" name="maternityMonth" />
                                </div>
                                <div class="col-md-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Any other Support provided by the worker's Employer? Please specify. </label>
                                    <input type="text" class="form-control" placeholder="" id="otherSupport" name="otherSupport" />
                                </div>
                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Government Benefit</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" onchange="govtBenefitChanged()" name="govtBenefit" id="govtBenefit">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-8 fv-row mb-3" id="govtBenefitDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2">Specify</label>
                                    <input type="text" class="form-control" placeholder="" id="govtBenefitSpecify" name="govtBenefitSpecify" />
                                </div>
                                <div class="col-md-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2"> Total Cost of Support (other than Salary), the worker is getting per month (in Rupees) </label>
                                    <input type="text" class="form-control" placeholder="" id="totalCost" name="totalCost" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="tab-pane fade {{Request::get('tab') == 'scrapyard' ? 'show active' : ''}}" id="scrapyardTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">
                                <div class="col-md-6 fv-row mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="fs-6 fw-semibold mb-2">Registered with?</label>
                                        <a href="{{url('/admin/registeredwith')}}" target="_blank" class="badge badge-success ">+ Add New</a>
                                    </div>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="registeredWith" id="registeredWith" onchange="checkRegisteredWith()">
                                        @foreach ($registeredWiths as $registeredWith)
                                        <option value="{{$registeredWith->name}}">{{$registeredWith->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 fv-row mb-3" id="shgDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Select SHG (If a part)</label>
                                    <select class="form-select" data-control="select2" data-placeholder="Select SHG" data-hide-search="true" name="shgId" id="shgId">
                                        <option value=""></option>
                                        @foreach ($shgs as $shg)
                                        <option value="{{$shg->id}}">{{$shg->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 fv-row mb-3" id="contractorDiv" style="display: none;">
                                    <label class="fs-6 fw-semibold mb-2 required">Select Contractor</label>
                                    <select class="form-select" data-control="select2" data-placeholder="Select Contractor" data-hide-search="true" name="contractorId" id="contractorId">
                                        <option value=""></option>
                                        @foreach ($contractors as $contractor)
                                        <option value="{{$contractor->id}}">{{$contractor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 fv-row mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Select Scrapyard</label>
                                    <select class="form-select" data-control="select2" data-placeholder="Select Plant" data-hide-search="true" multiple name="scrapyardId[]" id="scrapyardId" required>
                                        @foreach ($plants as $plant)
                                        <option value="{{$plant->id}}" {{Session('plant.id') == $plant->id ? 'selected' : ''}}>{{$plant->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-8 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2"> Worker was referenced by (Organisation/Person Name)? </label>
                                    <input type="text" class="form-control textOnly" placeholder="Name of Organisation/Person" id="referencedBy" name="referencedBy" />
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Min Working Hours </label>
                                    <div class="position-relative mb-3" style="width: 100%;">
                                        <input type="number" class="form-control" step="0.1" placeholder="Ex: 8 or 10" id="minWorkingHours" name="minWorkingHours" required />
                                        <span style="font-size: 16px; background-color: var(--kt-input-group-addon-bg); border-radius: 5px; position: absolute; top: 1px; right: 1px; bottom: 1px; margin: auto; padding: 8px 15px;">/ day</span>
                                    </div>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 required fw-semibold mb-2">Salary Criteria</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" id="salaryCriteria" name="salaryCriteria" onchange="salaryCriteriaChanged(this)">
                                        <option value="fixed">Fixed</option>
                                        <option value="variable">Variable</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2 required"> Salary
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" id="salaryTooltip" data-bs-toggle="tooltip" title="For Variable crieteria enter the salary that is to be paid incase for weekly off or holiday "></i>
                                    </label>
                                    <div class="position-relative mb-3" style="width: 100%;">
                                        <span style="font-size: 16px; background-color: var(--kt-input-group-addon-bg); border-radius: 5px; position: absolute; top: 1px; left: 1px; bottom: 1px; margin: auto; padding: 8px 15px;">₹</span>
                                        <input type="number" class="form-control" step="0.1" style="text-indent: 35px;" placeholder="Ex: 10000" id="monthlyWage" name="monthlyWage" required />
                                        <div style="position:absolute; top:4px; right:1px; bottom: 1px;">
                                            <select class="form-select form-select-sm form-select-solid" data-control="select2" data-hide-search="true" id="salaryType" name="salaryType">
                                                <option value="Per Month">Per Month</option>
                                                <option value="Per Day">Per Day</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2"> Travel Allowance </label>
                                    <div class="position-relative mb-3" style="width: 100%;">
                                        <span style="font-size: 16px; background-color: var(--kt-input-group-addon-bg); border-radius: 5px; position: absolute; top: 1px; left: 1px; bottom: 1px; margin: auto; padding: 8px 15px;">₹</span>
                                        <input type="number" class="form-control" style="text-indent: 35px;" step="0.1" placeholder="Ex: 100" id="travelAllowance" name="travelAllowance" />
                                        <span style="font-size: 16px; background-color: var(--kt-input-group-addon-bg); border-radius: 5px; position: absolute; top: 1px; right: 1px; bottom: 1px; margin: auto; padding: 8px 15px;">/ day</span>
                                    </div>
                                </div>

                                <!-- <div class="col-md-4 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">How long working in sector</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true"  name="workingInSector" id="workingInSector">
                                        <option value="">Select</option>
                                        <option value="<2"> Less than 2 </option>
                                        <option value="2-5">2-5</option>
                                        <option value=">5">5 or Greater</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{Request::get('tab') == 'expertise' ? 'show active' : ''}}" id="expertiseTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h2 class="mb-1">Primary</h2>
                                <div class="fs-6 fw-semibold text-muted">Area of work</div>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="row g-5">
                                <input type="hidden" id="processes" name="processIds" value="">
                                @if (count($processes) > 0)
                                @foreach ($processes as $process)
                                <div class="col-sm-3 d-flex align-items-center" style="gap: 10px">
                                    <input type="checkbox" class="form-check-input" onclick="processCheckBoxClicked('{{$process->id}}')" />
                                    <span>{{$process->name}}</span>
                                </div>
                                @endforeach
                                @else
                                <div class="alert alert-danger d-flex justify-content-between align-items-center">
                                    <span>No Workarea Added Yet</span>
                                    <a href="{{url('/admin/workarea')}}" class="btn btn-sm btn-primary">Add Workarea</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{Request::get('tab') == 'documents' ? 'show active' : ''}}" id="documentsTab" role="tabpanel">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3">
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Aadhar Card</label>
                                    <input type="file" class="form-control" id="aadharCard" name="aadharCard" />
                                </div>
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Pan Card</label>
                                    <input type="file" class="form-control" id="panCard" name="panCard" />
                                </div>
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Bank Passbook</label>
                                    <input type="file" class="form-control" id="bankPassbook" name="bankPassbook" />
                                </div>
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Caste Certificate</label>
                                    <input type="file" class="form-control" id="casteCertificate" name="casteCertificate" />
                                </div>
                                <!-- <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Ration Card</label>
                                    <input type="file" class="form-control" id="rationCard" name="rationCard" />
                                </div>
                                <div class="col-12 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Health Insurance</label>
                                    <input type="file" class="form-control" id="healthInsurance" name="healthInsurance" />
                                </div> -->
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload Occupational Agreement</label>
                                    <input type="file" class="form-control" id="occupationalAgreement" name="occupationalAgreement" />
                                </div>
                                <div class="col-6 fv-row mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Upload PF Account</label>
                                    <input type="file" class="form-control" name="pfAccountImage" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="width: -webkit-fill-available; display: flex; justify-content: space-between; position: fixed; margin-right: 40px; bottom: 50px;">
                <div class="position-relative w-100">
                    <button style="position: absolute; bottom: 0; left: 10px;" type="button" class="btn btn-secondary" id="prevTab" onclick="prevvTab()" disabled>Previous</button>
                    <button style="position: absolute; bottom: 0; right: 10px;" type="button" class="btn btn-primary" id="nextTab" onclick="nexxtTab()">Next</button>
                    <button type="submit" class="btn btn-primary" id="kt_modal_add_submit" style="display: none;position: absolute; bottom: 0; right: 10px;">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Saving...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')

<script>
    function checkRegisteredWith() {
        var registeredWith = $('#registeredWith').val();
        if (registeredWith == 'SHG') {
            $('#shgDiv').css('display', 'block');
            $('#contractorDiv').css('display', 'none');
            $('#shgId').attr('required', true);
            $('#contractorId').attr('required', false);
        } else if (registeredWith == 'Contractor') {
            $('#contractorDiv').css('display', 'block');
            $('#shgDiv').css('display', 'none');
            $('#contractorId').attr('required', true);
            $('#shgId').attr('required', false);
        } else {
            $('#shgDiv').css('display', 'none');
            $('#contractorDiv').css('display', 'none');
            $('#shgId').attr('required', false);
            $('#contractorId').attr('required', false);
        }
    }
</script>

<script>
    function tabClicked(tab) {
        updateQueryStringParam('tab', tab);
    }
    var valid = true;

    function checkValidation(tabId, tabName) {
        valid = true
        var requiredInputFields = $('#' + tabId + 'Tab').find('input[required]');
        var requiredSelectFields = $('#' + tabId + 'Tab').find('select[required]');
        var validateInputFields = $('#' + tabId + 'Tab').find('input[validate]');

        requiredInputFields.each(function(i, item) {
            if ($(item).val() == '') {
                valid = false;
                $(item).addClass('is-invalid');
            } else if ($(item).data('validation') === 'bankAccountNumber') {
                var accountValue = $(item).val();
                var regex = /^[A-Za-z0-9]{6,20}$/;
                if (!regex.test(accountValue)) {
                    valid = false;
                    $(item).addClass('is-invalid');
                    toastr.error($(item).data('title') + ' is invalid. Please enter 6-20 alphanumeric characters.');
                } else {
                    $(item).removeClass('is-invalid');
                }
            } else if ($(item).data('validation') === 'bankAccountIFSC') {
                var ifscCode = $(item).val();
                var regex = /^[A-Z]{4}0[A-Z0-9]{6}$/;
                if (!regex.test(ifscCode)) {
                    valid = false;
                    $(item).addClass('is-invalid');
                    toastr.error($(item).data('title') + ' is invalid. Please enter 6-20 alphanumeric characters.');
                } else {
                    $(item).removeClass('is-invalid');
                }
            }
        });

        validateInputFields.each(function(i, item) {
            if ($(item).data('validation') === 'aadharNumber' && $(item).val() != '') {
                var aadharValue = $(item).val();
                var regexAadhar = /^\d{12}$/;
                if (!regexAadhar.test(aadharValue)) {
                    valid = false;
                    $(item).addClass('is-invalid');
                    toastr.error($(item).data('title') + ' is invalid. Please enter a 12-digit Aadhar number.');
                } else {
                    $(item).removeClass('is-invalid');
                }
            } else if ($(item).data('validation') === 'panNumber' && $(item).val() != '') {
                var panValue = $(item).val();
                var regexPAN = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
                if (!regexPAN.test(panValue)) {
                    valid = false;
                    $(item).addClass('is-invalid');
                    toastr.error($(item).data('title') + ' is invalid. Please enter a valid PAN number (e.g., ABCDE1234F).');
                } else {
                    $(item).removeClass('is-invalid');
                }
            }
        });

        requiredSelectFields.each(function(i, item) {
            if ($(item).val() == '') {
                valid = false;
                $(item).addClass('is-invalid');
                // trigger change
                $(item).select2()
            }
        });

        // var scrapyardSelect = document.getElementById('scrapyardId');
        // if (scrapyardSelect && scrapyardSelect.selectedOptions.length === 0) {
        //     valid = false;
        //     $(scrapyardSelect).addClass('is-invalid');
        //     toastr.error('Please select at least one scrapyard.');
        // } else {
        //     $(scrapyardSelect).removeClass('is-invalid');
        // }


        if (!valid) {
            toastr.error('Please fill all the required fields in ' + tabName + ' Tab');
            return
        }

    }

    function nexxtTab() {
        var currentTab = $(".nav-link.active");
        var currentTabId = currentTab.attr('id');
        console.log('Current Tab Id:' + currentTabId);
        var currentTabBody = $(".tab-pane.show.active");
        // remove all the is-invalid classes
        $('input').removeClass('is-invalid');
        // chech if in-valid class is present in select2
        if ($('select').hasClass('select2-hidden-accessible')) {
            $('select').next().find('.select2-selection').removeClass('is-invalid');
        }

        if (currentTabId == 'general') {
            checkValidation(currentTabId, 'General');

        }

        if (currentTabId == 'address') {
            checkValidation(currentTabId, 'Address');
        }

        if (currentTabId == 'personal') {
            checkValidation(currentTabId, 'Personal');
        }

        if (currentTabId == 'legal') {
            checkValidation(currentTabId, 'Legal');
        }

        if (currentTabId == 'scrapyard') {
            checkValidation(currentTabId, 'Scrapyard');
        }

        if (currentTabId == 'expertise') {
            checkValidation(currentTabId, 'Expertise');
        }

        if (currentTabId == 'documents') {
            checkValidation(currentTabId, 'Documents');
        }


        if (!valid) {
            return;
        }

        var nextTab = currentTab.parent().next().find(".nav-link");
        var nextTabId = nextTab.attr('id');
        console.log('Next Tab Id:' + nextTabId);
        var nextTabBody = currentTabBody.next();

        if (nextTab.length > 0) {
            currentTab.removeClass("active");
            currentTabBody.removeClass("show active");
            nextTab.addClass("active");
            nextTabBody.addClass("show active");
        }

        if (nextTab.parent().next().length > 0) {
            $('#nextTab').css('display', 'block');
            $('#kt_modal_add_submit').css('display', 'none');
        } else {
            $('#nextTab').css('display', 'none')
            $('#kt_modal_add_submit').css('display', 'block');
        }

        if (nextTab.parent().prev().length > 0) {
            $('#prevTab').prop('disabled', false);
        } else {
            $('#prevTab').prop('disabled', true);
        }
    }

    function prevvTab() {
        var currentTab = $(".nav-link.active");
        var currentTabBody = $(".tab-pane.show.active");

        var prevTab = currentTab.parent().prev().find(".nav-link");
        var prevTabBody = currentTabBody.prev();
        valid = true;

        if (prevTab.length > 0) {
            currentTab.removeClass("active");
            currentTabBody.removeClass("show active");
            prevTab.addClass("active");
            prevTabBody.addClass("show active");
        }

        if (prevTab.parent().prev().length > 0) {
            $('#prevTab').prop('disabled', false);
        } else {
            $('#prevTab').prop('disabled', true);
        }

        if (prevTab.parent().next().length > 0) {
            $('#nextTab').css('display', 'block')
            $('#kt_modal_add_submit').css('display', 'none');
        } else {
            $('#nextTab').css('display', 'none')
            $('#kt_modal_add_submit').css('display', 'block');
        }
    }

    function updateQueryStringParam(key, value) {
        var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
            urlQueryString = document.location.search,
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {
            keyRegex = new RegExp('([\?&])' + key + '[^&]*');

            // If param exists already, update it
            if (urlQueryString.match(keyRegex) !== null) {
                params = urlQueryString.replace(keyRegex, "$1" + newParam);
            } else { // Otherwise, add it to end of query string
                params = urlQueryString + '&' + newParam;
            }
        }
        window.history.replaceState({}, "", baseUrl + params);
    }
</script>

<!-- General Tab Script -->
<script>
    function registeredChanged() {
        var registered = $('#registered').val();
        if (registered === 'Yes') {
            $('#uid').attr('required', true);
            $('#uidDiv').css('display', 'block');
        } else {
            $('#uid').attr('required', false);
            $('#uidDiv').css('display', 'none');
        }
    }

    function checkEmail() {
        var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if ($('#email').val() == "") {
            $('#emailTitle').hide();
        } else if (!$('#email').val().match(emailPattern)) {
            $('#emailTitle').show();
            $('#emailTitle').html("Invalid Email");
            $('#email').css('border-color', '#ff0000');
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('/checkEmail')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': $('#email').val(),
                },
                dataType: "json",
                success: function(response) {
                    $('#emailTitle').html("Email is already taken");
                    $('#emailTitle').show();
                    $('#email').css('border-color', 'yellow');
                },
                error: function(response) {
                    $('#emailTitle').html("");
                    $('#emailTitle').show();
                    $('#email').css('border-color', '#00ff00');
                }
            });
        }
    }

    function checkPhone() {
        var phonePattern = /^[6789][0-9]{9}$/;

        if ($('#phone').val() == "") {
            $('#phoneTitle').hide();
        } else if (!$('#phone').val().match(phonePattern)) {
            $('#phoneTitle').show();
            $('#phoneTitle').html("Invalid Phone Number");
            $('#phone').css('border-color', '#ff0000');
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('/checkPhone')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': $('#phone').val(),
                },
                dataType: "json",
                success: function(response) {
                    $('#phoneTitle').html("Phone is already taken");
                    $('#phoneTitle').show();
                    $('#phone').css('border-color', 'yellow');
                },
                error: function(response) {
                    $('#phoneTitle').html("");
                    $('#phoneTitle').show();
                    $('#phone').css('border-color', '#00ff00');
                }
            });

        }
    }

    var roles = @json($roles);
    // get roles
    var panelRoles = roles.filter(role => role.panelFlag == 1).map(role => role.slug);

    console.log(panelRoles);

    function roleChanged() {
        var role = $('#role').val();
        if (panelRoles.includes(role)) {
            $('#passwordDiv').css('display', 'block');
            $('#confirmPasswordDiv').css('display', 'block');
            $('#password').attr('required', true);
            $('#cpassword').attr('required', true);
        } else {
            $('#passwordDiv').css('display', 'none');
            $('#confirmPasswordDiv').css('display', 'none');
            $('#password').attr('required', false);
            $('#cpassword').attr('required', false);
        }
    }

    function confirmPassword() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('cpassword').value;
        var passwordTitle = document.getElementById('passwordTitle');
        if (password != confirmPassword) {
            passwordTitle.innerHTML = "Password does not match";
            passwordTitle.style.display = "block";
            document.getElementById('kt_modal_add_submit').disabled = true;
        } else {
            document.getElementById('kt_modal_add_submit').disabled = false;
            passwordTitle.innerHTML = "Password matched";
            passwordTitle.style.color = '#00ff00';
            passwordTitle.style.display = "block";
        }
    }
</script>

<!-- Address Tab Script -->
<script>
    function accommodationChange() {
        var accommodation = $('#accommodation').val();
        console.log(accommodation);
        if (accommodation === 'Other') {
            $('#specifyDiv').css('display', 'block');
            $('#other').attr('required', true);
        } else {
            $('#specifyDiv').css('display', 'none');
            $('#other').attr('required', false);
        }

        if (accommodation === 'Homeless') {
            $('#currentAddDiv').css('display', 'none');
            $('#originalAddDiv').css('display', 'none');
            $('.address').attr('required', false);
        } else {
            $('#currentAddDiv').css('display', 'block');
            $('#originalAddDiv').css('display', 'block');
            $('.address').attr('required', true);
        }
    }

    function sameAsCurrentAddressChanged() {
        var sameAsCurrentAddress = $('#sameAsCurrent');
        // if the checkbox is checked then copy the current address to original address
        if (sameAsCurrentAddress.is(':checked')) {
            $('#addressLine1Permanent').val($('#addressLine1Current').val());
            $('#addressLine2Permanent').val($('#addressLine2Current').val());
            $('#statePermanent').val($('#stateCurrent').val()).change();
            $('#districtPermanent').val($('#districtCurrent').val());
            $('#cityPermanent').val($('#cityCurrent').val());
            $('#pincodePermanent').val($('#pincodeCurrent').val());
        } else {
            $('#addressLine1Permanent').val('');
            $('#addressLine2Permanent').val('');
            $('#statePermanent').val(null).change();
            $('#districtPermanent').val('');
            $('#cityPermanent').val('');
            $('#pincodePermanent').val('');
        }

    }
</script>

<!-- Personal Tab Script -->
<script>
    function maritalStatusChange() {
        var maritalStatus = $('#maritalStatus').val();
        if (maritalStatus === 'Other') {
            $('#specifyMaritalDiv').css('display', 'block');
            $('#otherMarital').attr('required', true);
        } else {
            $('#specifyMaritalDiv').css('display', 'none');
            $('#otherMarital').attr('required', false);
        }

        if (maritalStatus === 'Single') {
            $('.children').css('display', 'none');
        } else {
            $('.children').css('display', 'block');
        }
    }
</script>

<!-- Legal Tab Script -->
<script>
    function casteChange() {
        var caste = $('#caste').val();
        if (caste === 'Other') {
            $('#specifyCastDiv').css('display', 'block');
            $('#otherCaste').attr('required', true);
        } else {
            $('#specifyCastDiv').css('display', 'none');
            $('#otherCaste').attr('required', false);
        }
    }

    function occupationalChanged() {
        var occupational = $('#occupationalAgreement').val();
        if (occupational === '1') {
            $('#occupationalDiv').css('display', 'block');
            $('#occupationalType').attr('required', true);
        } else {
            $('#occupationalDiv').css('display', 'none');
            $('#occupationalType').attr('required', false);
        }
    }

    function bankAccountChange() {
        console.log('Bank Account Changed');
        var bankAccount = $('#bankAccount').val();
        if (bankAccount === '1') {
            $('.bankDiv').css('display', 'block');
            $('.bankAccount').attr('required', true);
        } else {
            $('.bankDiv').css('display', 'none');
            $('.bankAccount').attr('required', false);
        }
    }

    function pfAccountChanged() {
        var pfAccount = $('#pfAccount').val();
        if (pfAccount === '1') {
            $('#pfDiv').css('display', 'block');
            $('#pfAccountNumber').attr('required', true);
        } else {
            $('#pfDiv').css('display', 'none');
            $('#pfAccountNumber').attr('required', false);
        }
    }
    pfAccountChanged();

    function otherGovtIdChanged() {
        var otherGovtIdFlag = $('#otherGovtIdFlag').val();
        if (otherGovtIdFlag === '1') {
            $('#otherGovtIdDiv').css('display', 'flex');
            $('#otherGovtDocName').attr('required', true);
            $('#otherGovtDocNumber').attr('required', true);
        } else {
            $('#otherGovtIdDiv').css('display', 'none');
            $('#otherGovtDocName').attr('required', false);
            $('#otherGovtDocNumber').attr('required', false);
        }
    }
</script>

<!-- Benefits Tab Script -->
<!-- <script>
    function healthInsuaranceChanged() {
        var healthInsuarance = $('#healthInsuarance').val();
        if (healthInsuarance === '1') {
            $('#insuaranceDiv').css('display', 'block');
            $('#insuaranceType').attr('required', true);
        } else {
            $('#insuaranceDiv').css('display', 'none');
            $('#insuaranceType').attr('required', false);
        }
    }

    function maternityChanged() {
        var maternity = $('#maternityLeave').val();
        if (maternity === '1') {
            $('#maternityTypeDiv').css('display', 'block');
            $('#maternityMonth').attr('required', true);
            $('#maternityDiv').css('display', 'block');
            $('#maternityType').attr('required', true);
        } else {
            $('#maternityTypeDiv').css('display', 'none');
            $('#maternityMonth').attr('required', false);
            $('#maternityDiv').css('display', 'none');
            $('#maternityType').attr('required', false);
        }
    }

    function govtBenefitChanged() {
        var govtBenefit = $('#govtBenefit').val();
        if (govtBenefit === '1') {
            $('#govtBenefitDiv').css('display', 'block');
            $('#govtBenefitSpecify').attr('required', true);
        } else {
            $('#govtBenefitDiv').css('display', 'none');
            $('#govtBenefitSpecify').attr('required', false);
        }
    }
</script> -->

<!-- Scrapyard Tab Script -->
<script>
    function salaryCriteriaChanged(e) {
        var salaryType = $(e).val();
        if (salaryType === 'fixed') {
            // $('#monthlyWage').attr('required', true);
            // // add required class to monthly wage label
            // $('#monthlyWage').parent().prev().addClass('required');
            // $('#monthlyWage').parent().parent().show();
            $('#salaryTooltip').hide();
        } else {
            // $('#monthlyWage').attr('required', false);
            // // remove required class to monthly wage label
            // $('#monthlyWage').val('');
            // $('#monthlyWage').parent().prev().removeClass('required');
            // $('#monthlyWage').parent().parent().hide();
            $('#salaryTooltip').show();
        }
    }
</script>

<!-- Expertise -->
<script>
    function processCheckBoxClicked(processId) {
        var processes = $('#processes').val();
        if (processes === '') {
            $('#processes').val(processId);
        } else {
            var processesArray = processes.split(',');
            if (processesArray.includes(processId)) {
                var index = processesArray.indexOf(processId);
                if (index > -1) {
                    processesArray.splice(index, 1);
                }
            } else {
                processesArray.push(processId);
            }
            $('#processes').val(processesArray.join(','));
        }
    }
</script>
@endsection