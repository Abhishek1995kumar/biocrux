@extends('layouts.admin')

@section('title','SMS Machine List')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Botler</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Bottler Details</li>
</ul>
@endsection

@section('content')
<!-- Alerts -->
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="col-sm-12">
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
</div>
@endif
@endforeach
@if ($errors->any())
<div class="col-sm-12">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
</div>
@endif

<!-- <div class="card">
    <div class="card-body p-0">
        <div class="card-px text-center pt-20 my-10">
            <h2 class="fs-2x fw-bold mb-10">No Request Found</h2>
            <p class="text-gray-400 fs-4 fw-semibold">Looks like you do not have any request here.
            </p>
            <a href="{{ route('admin.master.machine.create') }}" class="btn btn-primary">Add Machine</a>
        </div>
        <div class="text-center ">
            <img class="mw-300 mh-300px" alt="" src="/assets/media/logos/slider.jpg" />
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-3">
        <div class="alert alert-primary text-center border border-primary">
            <h5 class="alert-heading">Total Sub Botler</h5>
            <p class="mb-0" id="totalValue"></p>
        </div>
    </div>
    <div class="col-3">
        <div class="alert alert-warning text-center border border-warning">
            <h5 class="alert-heading">In Process</h5>
            <p class="mb-0" id="pendingValue"></p>
        </div>
    </div>
    <div class="col-3">
        <div class="alert alert text-center border border" style="background-color: #e8ddff; border-color: #8973b8 !important; ">
            <h5 class="alert-heading">Not Instalated</h5>
            <p class="mb-0" id="rejectedValue" ></p>
        </div>
    </div>
    <div class="col-3">
        <div class="alert alert-success text-center border border-success">
            <h5 class="alert-heading">Instalated</h5>
            <p class="mb-0" id="rejectedValue"></p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-0 pt-6" style="    justify-content: left !important;">
        <div class="card-title">
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addValidMobile" class="btn btn-primary" >
                    Add SMS Machine
                </button>
            </div>
        </div>
        <!-- <div class="card-title">
            <div class="d-flex align-items-center position-relative">
                <button class="btn btn-success p-3"><i class="fa fa-file-excel"></i>Export</button>
            </div>
        </div> -->
        <!-- <div class="card-title">
            <div class="d-flex align-items-center position-relative">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMachineFilter"><i class="fa fa-fw fa-filter"></i>Filter</button>
            </div>
        </div> -->
        
        <div class="card-title">
            <div class="d-flex align-items-center position-relative">
                <a href="{{ route('admin.master.sms.list') }}" class="btn btn-light p-3"><i class="fa fa-fw fa-refresh"></i>Refresh</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table">
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Botler Name.</th>
                    <th class="min-w-125px">Company</th>
                    <th class="min-w-125px">Logo</th>
                    <th class="min-w-125px">Url</th>
                    <th class="min-w-125px">Color</th>
                    <th class="min-w-125px">Added On</th>
                    <th class="min-w-125px">Status</th>
                    <th class="min-w-125px">Action</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <?php $parent = 1; ?>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Mahindra 42.</th>
                    <th class="min-w-125px">Mahindra</th>
                    <th class="min-w-125px">Model</th>
                    <th class="min-w-125px">07 April 2025</th>
                    <th class="min-w-125px">Lucknow</th>
                    <th class="min-w-125px">Uttar Pradesh</th>
                    <th class="min-w-125px">Bottler</th>
                    <th class="min-w-125px">
                        <select name="action" class="form-select action-select" data-id="{{ $parent }}" onchange="handleAction(this)">
                            <option value="">Operation</option>
                            <option value="view" data-id="{{ $parent }}">View Mobile</option>
                            <option value="edit" data-id="{{ $parent }}">Edit Mobile</option>
                            <option value="delete" data-id="{{ $parent }}">Delete Mobile</option>
                        </select>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Create Valid Mobile Start -->
    <div class="modal fade modal-lg" id="addValidMobile" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <h2 class="fw-bold">Create Botler</h2>
                    <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="leaderNameForm" action="{{ route('admin.master.sms.save') }}" method="POST" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="application_category_id" value="8">
                                        <div class="row">
                                            <div class="col-md-4 mb-4 " id="leaderNameDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                    <input type="text" name="leader_name" id="leaderNameId" class="form-control" placeholder="Enter Bottler Name" maxlength="30" >
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="memberCountDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" maxlength="200" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Status </label>
                                                    <input type="text" name="volunteer" id="volunteerId" class="form-control" placeholder="Select Status">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                    <input type="text" name="volunteer_contact" id="volunteerContactId" class="form-control" placeholder="Enter Company Url" minlength="1" maxlength="100"  >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                    <input type="color" name="color" id="colorPicker" class="form-control" style="height: 3.3rem !important;">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 " id="">
                                            </div>
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                    <input type="file" name="volunteer_contact" id="volunteerContactId" class="form-control" minlength="1" maxlength="10" oninput="mobileValidation(this)" >
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer modal-footer">
                                        <button type="submit" class="btn btn-primary" id="startMission">Create Botler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Create Valid Mobile End -->

<!-- Edit Valid Mobile Start -->
    <div class="modal fade modal-lg" id="editSMSModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <h2 class="fw-bold">Create Botler</h2>
                    <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="leaderNameForm" action="{{ route('admin.master.sms.save') }}" method="POST" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="application_category_id" value="8">
                                        <div class="row">
                                            <div class="col-md-4 mb-4 " id="leaderNameDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                    <input type="text" name="leader_name" id="leaderNameId" class="form-control" placeholder="Enter Bottler Name" maxlength="30" >
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="memberCountDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" maxlength="200" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Status </label>
                                                    <input type="text" name="volunteer" id="volunteerId" class="form-control" placeholder="Select Status">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                    <input type="text" name="volunteer_contact" id="volunteerContactId" class="form-control" placeholder="Enter Company Url" minlength="1" maxlength="100"  >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                    <input type="color" name="color" id="colorPicker" class="form-control" style="height: 3.3rem !important;">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 " id="">
                                            </div>
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                    <input type="file" name="volunteer_contact" id="volunteerContactId" class="form-control" minlength="1" maxlength="10" oninput="mobileValidation(this)" >
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer modal-footer">
                                        <button type="submit" class="btn btn-primary" id="startMission">Create Botler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Create Valid Mobile End -->

<!-- View Valid Mobile Start -->
    <div class="modal fade modal-lg" id="viewSMSModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <h2 class="fw-bold">Create Botler</h2>
                    <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="leaderNameForm" action="{{ route('admin.master.sms.save') }}" method="POST" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="application_category_id" value="8">
                                        <div class="row">
                                            <div class="col-md-4 mb-4 " id="leaderNameDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                    <input type="text" name="leader_name" id="leaderNameId" class="form-control" placeholder="Enter Bottler Name" maxlength="30" >
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="memberCountDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" maxlength="200" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Status </label>
                                                    <input type="text" name="volunteer" id="volunteerId" class="form-control" placeholder="Select Status">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                    <input type="text" name="volunteer_contact" id="volunteerContactId" class="form-control" placeholder="Enter Company Url" minlength="1" maxlength="100"  >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                    <input type="color" name="color" id="colorPicker" class="form-control" style="height: 3.3rem !important;">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 " id="">
                                            </div>
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                    <input type="file" name="application_images" id="application_images" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                    <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4 " id="volunteerContactDiv">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                    <input type="file" name="volunteer_contact" id="volunteerContactId" class="form-control" minlength="1" maxlength="10" oninput="mobileValidation(this)" >
                                                    <div class="invalid-feedback d-none">Upload Photo Second required</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer modal-footer">
                                        <button type="submit" class="btn btn-primary" id="startMission">Create Botler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Create Valid Mobile End -->

<!-- Filter Start -->
    <div class="modal fade modal-lg" id="createMachineFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createMissionTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <h2 class="fw-bold">Search Mobile</h2>
                    <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="filterMobileDetails" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-4" id="mobile_number_div">
                                                <div class="form-group">
                                                    <label class="required fs-6 fw-semibold mb-2">Mobile Number</label>
                                                    <input name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter keyword" type="text" maxlength="10" oninput="machine_number_valid(this)" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer modal-footer">
                                        <button type="submit" class="btn btn-primary" id="submitFilter">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Filter End -->


<!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this machine?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
<!-- Delete Confirmation Modal -->

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    function handleAction(selectElement) {
        var action = selectElement.value;
        var id = selectElement.getAttribute('data-id');

        if (action === 'view') {
            $('#viewSMSModal').modal('show');
            // Pass the ID to the modal or perform any action
        } else if (action === 'edit') {
            $('#editSMSModal').modal('show');
            // Pass the ID to the modal or perform any action
        } else if (action === 'delete') {
            $('#deleteConfirmationModal').modal('show');
            $('#confirmDelete').data('id', id);
        }
    }
    // $(document).on('change', '.action-select', function () {
    //     var action = $(this).val();
    //     var id = $(this).data('id');
    //     if (action === 'edit') {
    //         window.location.href = '/admin/master/machine/edit/' + id;
    //     } else if (action === 'delete') {
    //         $('#deleteConfirmationModal').modal('show');
    //         $('#confirmDelete').data('id', id);
    //     }
    // });

    // $(document).on('click', '#confirmDelete', function () {
    //     var id = $(this).data('id');
    //     // Perform delete operation here (e.g., AJAX request)
    //     alert('Machine with ID ' + id + ' will be deleted.');
    //     $('#deleteConfirmationModal').modal('hide');
    // });
</script>

<script>
    var KTAppEcommerceCategories = function() {
        var n = () => {

        };
        return {
            init: function() {
                (t = document.querySelector("#kt_table")) && ((e = $(t).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,

                })).on("draw", (function() {
                    n()
                })), document.querySelector('[data-kt-table-filter="search"]').addEventListener("keyup", (function(t) {
                    e.search(t.target.value).draw()
                })), n())
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTAppEcommerceCategories.init()
    }));
</script>

<script>
    function machine_number_valid(num) {
        var value = num.value;
        var regex = /^[a-zA-Z0-9]*$/;
        if (!regex.test(value)) {
            num.value = value.replace(/[^a-zA-Z0-9]/g, '');
            Swal.fire({
                title: 'Alert',
                text: "Only alphanumeric characters are allowed. No spaces or special characters..",
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        }
    }

    $("#submitFilter").on("click", function(e) {
        e.preventDefault();
        let mobile_number = $("#mobile_number").val();

        if(mobile_number == '' || mobile_number == null) {
            Swal.fire({
                title: 'Alert',
                text: "Please enter valid mobile number.",
                icon: 'error',
                confirmButtonText: 'Ok'
            });
            return;
        }

        $("#filterMobileDetails").submit();
    })

</script>

<script>
    $(function () {
        $('#dateRange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear',
                applyLabel: 'Apply'
            }
        });

        $('#dateRange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            $('#filterForm').submit(); // Auto-submit the form
        });

        $('#dateRange').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
            $('#filterForm').submit(); // Auto-clear the filter
        });
    });
</script>
@endsection
