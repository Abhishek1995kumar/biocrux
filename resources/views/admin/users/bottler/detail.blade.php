@extends('layouts.admin')

@section('title','Botler Details')

@section('header')
<style>
    .swal2-confirm {
        background-color: #66e089 !important;
    }
    .buttons-excel {
        margin-top:-5rem !important; 
        margin-left:80rem !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        height: 42px;
    }
</style>

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Botler Detaits</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/user/botler/list')}}" class="text-muted text-hover-primary">Botler Detaits</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Botler List</li>
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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
<div class="col-sm-12">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
</div>
@endif
    <div class="row">
        <div class="col-3">
            <div class="alert alert-success text-center border border-success">
                <h5 class="alert-heading">Botler Name</h5>
                <p class="mb-0" id="completeValue">{{ $botlerDetail->bottler_name }}</p>
            </div>
        </div>
        <div class="col-3">
            <div class="alert alert-success text-center border border-success">
                <h5 class="alert-heading">Company Name</h5>
                <p class="mb-0" id="completeValue">{{ $botlerDetail->company_name }}</p>
            </div>
        </div>
        <div class="col-2">
            <div class="alert alert-success text-center border border-success">
                <h5 class="alert-heading">Company URL</h5>
                <p class="mb-0" id="">{{ $botlerDetail->company_url }}</p>
            </div>
        </div>
        <div class="col-2">
            <div class="alert alert-success text-center border border-success">
                <h5 class="alert-heading">Added On</h5>
                <p class="mb-0" id="totalCatVaccinated">{{ \Carbon\Carbon::parse($botlerDetail->created_at)->format('F d Y') }}</p>
            </div>
        </div>
        <div class="col-2">
            <div class="alert alert-success text-center border border-success">
                <h5 class="alert-heading">Creator</h5>
                <p class="mb-0" id="totalCatVaccinated">{{ Auth::user()->name ?? 'GOPL' }}</p>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header border-0 pt-6">
            <ul class="nav nav-tabs ml-auto p-2">
                @if($botlerDetail->bottler_detail_type == 'machine')
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-bs-toggle="tab" data-id="{{ $botlerDetail->id }}">User</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-bs-toggle="tab" data-id="{{ $botlerDetail->id }}">Sub Botler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-bs-toggle="tab" data-id="{{ $botlerDetail->id }}">Assign Machine To Botler</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="#tab_1" data-bs-toggle="tab" data-id="{{ $botlerDetail->id }}">User</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-bs-toggle="tab" data-id="{{ $botlerDetail->id }}">Assign Machine To Botler</a></li>
                @endif
            </ul>
        </div>
        <div class="card-body create-role-btn">
            <div class="tab-content">
                <!-- Botler User -->
                <div class="tab-pane active" id="tab_1">
                    <div class="card-toolbar">
                        <div class="card-title">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserBotler" class="btn btn-primary" >
                            <i class="fa fa-plus"></i>Add Bottler User </button>
                            </button>
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_botler_table">
                            <thead>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    @foreach($botlerUserHeader as $user_botler)
                                        <th class="min-w-125px">{{ $user_botler }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($botlerUserList as $user_botler_data)
                                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">     
                                            <a href="{{ route('admin.user.botler.user-details', $user_botler_data->id) }}">{{ $user_botler_data->bottlerusers->bottler_name }}</a>
                                        </th>
                                        <th class="min-w-125px">{{ $user_botler_data->bottlerusers->company_name }}</th>
                                        <th class="min-w-125px">{{ $user_botler_data->email }}</th>
                                        <th class="min-w-125px">{{ \Carbon\Carbon::parse($user_botler_data->created_at)->format('F d Y') }}</th>
                                        <th class="min-w-125px">{{ (isset($user_botler_data->status) == 1) ? 'Active' : 'Inactive' }}</th>
                                        <th class="min-w-125px">
                                            <div class="d-flex flex-row">
                                                <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#sub_bottler_user_edit_modal" data-id="{{ $user_botler_data->id }}" data-profileImage="{{ $user_botler_data->profileImage }}" data-name="{{ $user_botler_data->name }}" data-phone="{{ $user_botler_data->phone }}" data-email="{{ $user_botler_data->email }}" data-password="{{ $user_botler_data->password }}" data-bottler_id="{{ $user_botler_data->bottler_id }}" data-sub_bottler_id="{{ $user_botler_data->sub_bottler_id }}" data-address="{{ $user_botler_data->address }}" data-dob="{{ $user_botler_data->dob }}" data-contact_no="{{ $user_botler_data->contact_no }}" data-personal_no="{{ $user_botler_data->personal_no }}" data-user_about="{{ $user_botler_data->user_about }}" data-role="{{ $user_botler_data->role }}" data-username="{{ $user_botler_data->username }}" data-status="{{ $user_botler_data->status }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#sub_bottler_user_delete_modal" data-id="{{ $user_botler_data->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                                @if($botlerUserList->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sub Botler -->
                <div class="tab-pane" id="tab_2">
                    <div class="card-toolbar">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="sub_botler_table">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubBotler">
                                <i class="fa fa-plus"></i> Add Sub Bottler
                            </button>
                            <thead>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    @foreach($subBotlerHeader as $sub_botler)
                                        <th class="min-w-125px">{{ $sub_botler }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($subBotlerList as $sub_botler_data)
                                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">
                                            <div class="w-100 d-flex justify-content-center align-items-center" style="height: 70px; overflow: hidden; border-radius: 10px; ">
                                                @php
                                                    $filePath = $sub_botler_data->company_logo ?? '';
                                                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                                @endphp
                                                @if (!empty($filePath))
                                                    <a href="{{ url($filePath) }}" target="_blank" rel="noopener noreferrer">
                                                        <div class="d-flex flex-column align-items-center">
                                                            @if (strtolower($extension) === 'pdf')
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" 
                                                                    alt="PDF File"
                                                                    width="70"
                                                                    height="70"
                                                                    class="img-fluid"
                                                                    style="max-width: 30%; max-height: 30%; object-fit: contain;">
                                                            @else
                                                                <img src="{{ url($filePath) }}" onerror="this.onerror=null; this.src='/assets/media/blank.png';"
                                                                    alt="Botler File" 
                                                                    width="70" 
                                                                    height="70"
                                                                    class="img-fluid" 
                                                                    style="max-width: 30%; max-height: 30%; object-fit: contain;">
                                                            @endif
                                                        </div>
                                                    </a>
                                                @else
                                                    <img src="{{ asset('assets/media/blank.png') }}"
                                                        alt="No File Available"
                                                        width="30"
                                                        height="30"
                                                        class="img-fluid"
                                                        style="max-width: 30%; max-height: 30%; object-fit: contain;">
                                                @endif
                                            </div>
                                        </th>
                                        <th class="min-w-125px">     
                                            <a href="{{ route('admin.user.sub-botler.user-list', $sub_botler_data->id) }}">{{ $sub_botler_data->sub_bottler_name }}</a>
                                        </th>
                                        <th class="min-w-125px">{{ $sub_botler_data->company_name }}</th>
                                        <th class="min-w-125px">{{ $sub_botler_data->company_url }}</th>
                                        <th class="min-w-125px">{{ $sub_botler_data->color_code }}</th>
                                        <th class="min-w-125px">{{ \Carbon\Carbon::parse($sub_botler_data->created_at)->format('F d Y') }}</th>
                                        <th class="min-w-125px">{{ (isset($sub_botler_data->status) == 1) ? 'Active' : 'Inactive' }}</th>
                                        <th class="min-w-125px">
                                            <div class="d-flex flex-row">
                                                <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#edit_sub_botler" data-id="{{ $sub_botler_data->id }}" data-bottler_id="{{ $sub_botler_data->bottler_id }}" data-group_id="{{ $sub_botler_data->group_id }}" data-sub_bottler_name="{{ $sub_botler_data->sub_bottler_name }}" data-company_logo="{{ $sub_botler_data->company_logo }}" data-machine_logo="{{ $sub_botler_data->machine_logo }}" data-bottle_logo="{{ $sub_botler_data->bottle_logo }}" data-color_code="{{ $sub_botler_data->color_code }}" data-company_url="{{ $sub_botler_data->company_url }}" data-company_name="{{ $sub_botler_data->company_name }}" data-status="{{ $sub_botler_data->status }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#sub_botler_delete" data-id="{{ $sub_botler_data->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                                @if($subBotlerList->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Assign Machine to Bottler -->
                <div class="tab-pane" id="tab_3">
                    <div class="card-toolbar">
                        <div class="card-title">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assign_machine_botler" class="btn btn-primary" >
                                <i class="fa fa-plus"></i>Assign Machine to Bottler</button>
                            </button>
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="assign_machine_botler_table">
                            <thead>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Sub Botler Name.</th>
                                    <th class="min-w-125px">Machine Number</th>
                                    <th class="min-w-125px">Location</th>
                                    <th class="min-w-125px">City</th>
                                    <th class="min-w-125px">State</th>
                                    <th class="min-w-125px">Installed</th>
                                    <th class="min-w-125px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($botlerMachines as $machine)
                                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#assign_machine_sub_botler_transaction" data-id="{{ $machine->subBotler->id }}">
                                                {{ $machine->subBotler->sub_bottler_name }}
                                            </a>
                                        </th>
                                        <th class="min-w-125px">{{ $machine->machine->machine_name }} - {{ $machine->machine->machine_number }}</th>
                                        <th class="min-w-125px">{{ $machine->machine->address }}</th>
                                        <th class="min-w-125px">{{ $machine->machine->city }}</th>
                                        <th class="min-w-125px">{{ $machine->machine->state }}</th>
                                        <th class="min-w-125px">{{ ($machine->machine->installed == 0) ? 'Not Assigned' : 'Assigned' }}</th>
                                        <th class="min-w-125px">
                                            <div class="d-flex flex-row">
                                                <!-- <button class="btn btn-sm btn-warning action-select" data-bs-toggle="modal" data-bs-target="#edit_sub_botler_machine_assign" data-id="{{ $machine->subBotler->id }}" >
                                                    <i class="fa fa-pencil"></i>
                                                </button> -->
                                                <button class="btn btn-sm btn-danger action-select"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_assign_sub_machine_modal"
                                                        data-id="{{ $machine->id }}"><i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </th>
                                    <tr>
                                @endforeach
                                @if($botlerMachines->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Sub Botler Management Start -->
    <!-- Create Sub Botler Start -->
        <div class="modal fade modal-lg" id="addSubBotler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Add Sub Bottler</h2>
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
                        <form id="subBotlerForm" action="{{ route('admin.user.sub-botler.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-6 " id="bottler_name_in_sub_bottler_create_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <select type="text" name="bottler_id" id="bottler_name_in_sub_bottler_create" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->bottler_name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6" id="sub_botler_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler Name</label>
                                                        <input type="text" name="sub_bottler_name" id="sub_bottler_name" class="form-control" placeholder="Enter Sub Botler Name" maxlength="50" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6 " id="company_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" maxlength="100" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6 " id="company_url_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                        <input type="text" name="company_url" id="company_url" class="form-control" placeholder="Enter Company Url" disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 mb-6 " id="color_picker_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                        <input type="color" name="color_code" id="color_picker" class="form-control" style="height: 3.3rem !important;">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-6 " id="status_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>
                                                        <select type="color" name="status" id="status" class="form-select"  data-control="select2" data-hide-search="true" data-placeholder="Select staus">
                                                            <option value="">Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_logo_sub_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                        <input type="file" name="company_logo" id="company_logo_sub" class="form-control" accept=".png, .jpg, .jpeg, .pdf">
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="company_logo_sub_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="machine_logo_sub_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                        <input type="file" name="machine_logo" id="machine_logo_sub" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="machine_logo_sub_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="bottle_logo_sub_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                        <input type="file" name="bottle_logo" id="bottle_logo_sub" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="bottle_logo_sub_preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="subBotlerSubmit">Add Sub Bottler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Create Sub Botler End -->

    <!-- Edit Sub Botler Start -->
        <div class="modal fade modal-lg" id="edit_sub_botler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="fw-bold">Edit Sub Bottler</h2>
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
                        <form id="subBotlerEditForm" action="{{ route('admin.user.sub-botler.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-6 " id="bottler_name_in_sub_bottler_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <select type="text" name="bottler_id" id="bottler_name_in_sub_bottler_edit" class="form-select"  data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->bottler_name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6" id="sub_botler_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler Name</label>
                                                        <input type="text" name="sub_bottler_name" id="sub_bottler_name_edit" class="form-control" placeholder="Enter Sub Botler Name" maxlength="50" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6 " id="company_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                        <input type="text" name="company_name" id="company_name_edit" class="form-control" placeholder="Enter Company Name" maxlength="100" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-6 " id="company_url_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                        <input type="text" name="company_url" id="company_url_edit" class="form-control" placeholder="Enter Company Url" disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 mb-6 " id="color_picker_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                        <input type="color" name="color_code" id="color_picker_edit" class="form-control" style="height: 3.3rem !important;">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-6 " id="status_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>
                                                        <select type="color" name="status" id="status_edit" class="form-select"  data-control="select2" data-hide-search="true" data-placeholder="Select staus">
                                                            <option value="">Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_logo_sub_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                        <input type="file" name="company_logo" id="company_logo_sub_edit" class="form-control" accept=".png, .jpg, .jpeg, .pdf">
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="company_logo_sub_preview_edit"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="machine_logo_sub_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                        <input type="file" name="machine_logo" id="machine_logo_sub_edit" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="machine_logo_sub_preview_edit"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="bottle_logo_sub_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                        <input type="file" name="bottle_logo" id="bottle_logo_sub_edit" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="bottle_logo_sub_preview_edit"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="editSubBotlerSubmit">Edit Sub Bottler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Edit Sub Botler End -->

    <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="sub_botler_delete" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <span>Are you sure you want to delete this machine?</span>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <input type="hidden" id="delete_sub_botler_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_sub_botler_delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Delete Confirmation Modal -->

    <!-- Filter Start -->
        <div class="modal fade modal-lg" id="createMachineFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createMissionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Search Bottler</h2>
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
                        <form id="filterBotlerDetails" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4" id="ngoCenterDiv">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Keyword</label>
                                                        <input name="keyword" id="keyword" class="form-control" placeholder="Enter keyword" type="text" maxlength="50" >
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
<!-- Sub Botler Management End -->


<!-- Botler User Management Start -->
    <!-- Create Botler Start -->
        <div class="modal fade modal-lg" id="createUserBotler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Add Botler User</h2>
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
                        <form id="createSubUserForm" action="{{ route('admin.user.botler.user.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 " id="role_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Role Name</label>
                                                        <select type="text" name="role" id="role_name" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select role name">
                                                            <option selected disabled value="">Select Role</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="bottler_name_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler</label>
                                                        <select type="text" name="bottler_id" id="bottler_name_user" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->bottler_name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="sub_bottler_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler </label>
                                                        <select type="text" name="sub_bottler_id" id="sub_bottler_user" class="form-select"  data-control="select2" data-hide-search="true" data-placeholder="Select sub botler name">
                                                            <option value="">Select Sub Bottler</option>
                                                            @foreach($subBotlerList as $sub_bottler)
                                                                <option value="{{ $sub_bottler->id }}">{{ $sub_bottler->sub_bottler_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="name_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Name</label>
                                                        <input type="text" name="name" id="name_user" class="form-control" placeholder="Enter Name" minlength="1" maxlength="50"  >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="email_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Email</label>
                                                        <input type="email" name="email" id="email_user" class="form-control" placeholder="Enter Email" minlength="1" maxlength="100"  >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="password_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Password</label>
                                                        <div class="input-group" style="display: flex; align-items: center;">
                                                            <input type="password" name="password" id="password_user" class="form-control" placeholder="Password" minlength="1" maxlength="30" style="flex: 1;">
                                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirm" style="margin-left: -60px; z-index: 1;">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="confirm_password_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Confirm Password</label>
                                                        <div class="input-group" style="display: flex; align-items: center;">
                                                            <input type="password" name="confirm_password" id="confirm_password_user" class="form-control" placeholder="Confirm Password" minlength="1" maxlength="30" style="flex: 1;">
                                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirmSecond" style="margin-left: -60px; z-index: 1;">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="contact_number_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Contact No</label>
                                                        <input type="text" name="contact_no" id="contact_number_user" class="form-control" placeholder="Enter Contact Number" oninput="machine_number_valid(this)"  >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="personal_contact_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Personal No</label>
                                                        <input type="text" name="personal_no" id="personal_contact_user" class="form-control" placeholder="Enter Personal Number" oninput="personal_number_valid(this)"  >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 mb-4 " id="birth_date_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Date of birth</label>
                                                        <input type="text" name="dob" id="birth_date_user" class="form-control" placeholder="Enter Date of birth" minlength="1" maxlength="100"  >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="status_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>
                                                        <select type="text" name="status" id="status_user" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select staus" >
                                                            <option value="">Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="about_me_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">About Me</label>
                                                        <textarea type="text" name="user_about" id="about_me_user" class="form-control" placeholder="Enter About Me" minlength="1" maxlength="100" rows="3" col="2" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="address_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Address</label>
                                                        <textarea type="text" name="address" id="address_user" class="form-control" placeholder="Enter About Me" minlength="1" maxlength="500" rows="3" col="2" ></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="create_sub_bottler_user_submit">Add Sub Bottler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Create Botler End -->

    <!-- Update Botler Start -->
        <div class="modal fade modal-lg" id="sub_bottler_user_edit_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="fw-bold">Edit Bottler User</h2>
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
                        <form id="userBotlerEditForm" action="{{ route('admin.user.botler.user.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="" id="edit_user_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 " id="role_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Role Name</label>
                                                        <select type="text" name="role_name" id="role_name_edit" class="form-select" placeholder="Enter Role Name" >
                                                            <option selected disabled value="">Select Role</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->name }}" >{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="bottler_name_user_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler</label>
                                                        <select type="text" name="bottler_id" id="bottler_name_user_edit" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->bottler_name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="sub_bottler_user_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler </label>
                                                        <select type="text" name="sub_bottler" id="sub_bottler_user_edit" class="form-select" placeholder="Select Status">
                                                            <option value="">Select Sub Bottler</option>
                                                            @foreach($subBotlerList as $sub_bottler)
                                                                <option value="{{ $sub_bottler->id }}">{{ $sub_bottler->sub_bottler_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="name_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Name</label>
                                                        <input type="text" name="name" id="name_user_edit" class="form-control" placeholder="Enter Name" minlength="1" maxlength="50" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="email_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Email</label>
                                                        <input type="email" name="email" id="email_user_edit" class="form-control" placeholder="Enter Email" minlength="1" maxlength="100" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="password_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Password</label>
                                                        <div class="input-group" style="display: flex; align-items: center;">
                                                            <input type="text" name="password" id="password_user_edit" class="form-control" placeholder="Password" minlength="1" maxlength="30" style="flex: 1;" >
                                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirmEdit" style="margin-left: -60px; z-index: 1;">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="confirm_password_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Confirm Password</label>
                                                        <div class="input-group" style="display: flex; align-items: center;">
                                                            <input type="text" name="confirm_password" id="confirm_password_user_edit" class="form-control" placeholder="Enter Confirm Password" minlength="1" maxlength="30" style="flex: 1;" >
                                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirmEditSecond" style="margin-left: -60px; z-index: 1;">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="contact_number_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Contact No</label>
                                                        <input type="text" name="contact_no" id="contact_number_user_edit" class="form-control" oninput="machine_number_valid(this)" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="personal_contact_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Personal No</label>
                                                        <input type="text" name="personal_no" id="personal_contact_user_edit" class="form-control" oninput="personal_number_valid(this)" >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 mb-4 " id="birth_date_edit_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Date of birth</label>
                                                        <input type="text" name="dob" id="birth_date_edit_user" class="form-control" placeholder="Enter Date of birth" minlength="1" maxlength="100" >
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="status_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>
                                                        <select type="text" name="status" id="status_user_edit" class="form-select" placeholder="Enter Company Url" >
                                                            <option value="">Select Status</option>
                                                            <option value="1" >Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-4 " id="about_me_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">About Me</label>
                                                        <textarea type="text" name="user_about" id="about_me_user_edit" class="form-control" placeholder="Enter About Me" minlength="1" maxlength="100" rows="3" col="2" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="address_user_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Address</label>
                                                        <textarea type="text" name="address" id="address_user_edit" class="form-control" placeholder="Enter About Me" minlength="1" maxlength="500" rows="3" col="2" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="edit_sub_bottler_user_submit" >Edit User</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Update Botler End -->

    <!-- Filter Start -->
        <div class="modal fade modal-lg" id="createMachineFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createMissionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Search Bottler</h2>
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
                        <form id="filterBotlerDetails" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4" id="ngoCenterDiv">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Keyword</label>
                                                        <input name="keyword" id="keyword" class="form-control" placeholder="Enter keyword" type="text" maxlength="50" >
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
        <div class="modal fade" id="sub_bottler_user_delete_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <span>Are you sure you want to delete this machine?</span>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <input type="hidden" id="delete_user_botler_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_user_bottler_delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Delete Confirmation Modal -->
<!-- Botler User Management End -->


<!-- Assign Machine to Sub Botler -->
    <!-- Create Botler Start -->
        <div class="modal fade modal-lg" id="assign_machine_botler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Add Sub Bottler</h2>
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
                        <form id="assignMachineToSubBotlerForm" action="{{ route('admin.user.botler.assign-sub-botler.save') }}" method="POST" enctype="multipart/form-data">
                            <input name="id" type="hidden">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4 " id="bottler_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <select type="text" name="bottler_id" id="assign_bottler_name" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->company_name }}</option>
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="sub_bottler_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler Name</label>
                                                        <select type="text" name="sub_bottler_id" id="assign_sub_bottler_name" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select sub bottler name">
                                                            <option selected disabled value="">Select Sub Botler</option>
                                                            @foreach($subBotlerList as $subBotler)
                                                                <option value="{{ $subBotler->id }}">{{ $subBotler->sub_bottler_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="machine_number_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Number </label>
                                                        <select type="text" name="machine_id" id="assign_machine_number" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select machine number">
                                                            <option value="">Select Machine Number</option>
                                                            @foreach($machineNotAssignedToSB as $botler)
                                                                @if($botler->machine)
                                                                    <option value="{{ $botler->machine->id }}">{{ $botler->machine->machine_name }} - {{ $botler->machine->machine_number }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="createAssigneMachineToSubBotler">Assign Machine</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Create Botler End -->

    <!-- Update Botler Start -->
        <div class="modal fade modal-lg" id="assign_machine_botler_update" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Edit Assign Machine To Bottler</h2>
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
                        <form id="editAssignMachineForm" action="" method="POST" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 " id="bottler_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <select type="text" name="bottler_id" id="assign_bottler_name_edit" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option value="{{ $botlerDetail->id }}">{{ $botlerDetail->company_name }}</option>
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="sub_bottler_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler</label>
                                                        <select type="text" name="sub_bottler_name" id="assign_sub_bottler_name_edit" class="form-select" placeholder="Enter Company Name">
                                                            <option value="">Select Sub Bottler</option>
                                                            <option value="1">Sub Bottler 1</option>
                                                            <option value="2">Sub Bottler 2</option>
                                                            <option value="3">Sub Bottler 3</option>
                                                            <option value="4">Sub Bottler 4</option>
                                                            <option value="5">Sub Bottler 5</option>
                                                            <option value="6">Sub Bottler 6</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="machine_number_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Number </label>
                                                        <select type="text" name="machine_number" id="assign_machine_number_edit" class="form-select" placeholder="Select Status">
                                                            <option value="">Select Machine Number</option>
                                                            <option value="1">Machine Number 1</option>
                                                            <option value="2">Machine Number 2</option>
                                                            <option value="3">Machine Number 3</option>
                                                            <option value="4">Machine Number 4</option>
                                                            <option value="5">Machine Number 5</option>
                                                            <option value="6">Machine Number 6</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="editAssigneMachine">Edit Sub Bottler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Update Botler End -->

    <!-- List Botler Start -->
        <div class="modal fade modal-lg" id="assign_machine_botler_view" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Transactions </h2>
                        <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="assign_machine_botler_view_table">
                            <thead>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">SR No.</th>
                                    <th class="min-w-125px">Mobile Numbe</th>
                                    <th class="min-w-125px">Coupon</th>
                                    <th class="min-w-125px">Number of bottles</th>
                                    <th class="min-w-125px">Barcode</th>
                                    <th class="min-w-125px">Date and Time</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">1</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">LS7628</th>
                                    <th class="min-w-125px">64</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">2</th>
                                    <th class="min-w-125px">9999999999</th>
                                    <th class="min-w-125px">FS7628</th>
                                    <th class="min-w-125px">53</th>
                                    <th class="min-w-125px"></th>
                                    <th class="min-w-125px">2022-01-31 00:00:00</th>
                                </tr>
                            </tbody>
                            <tfoot class="thead1">
                               
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- List Botler End -->

    <!-- Filter Start -->
        <div class="modal fade modal-lg" id="createMachineFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createMissionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Search Bottler</h2>
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
                        <form id="filterBotlerDetails" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4" id="ngoCenterDiv">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Keyword</label>
                                                        <input name="keyword" id="keyword" class="form-control" placeholder="Enter keyword" type="text" maxlength="50" >
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
        <div class="modal fade" id="delete_assign_sub_machine_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete_assign_sub_machine_modal_label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_assign_sub_machine_modal_label">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <span>Are you sure you want to delete this machine?</span>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <input type="hidden" id="delete_assigne_sub_machine_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_delete_assigne_sub_machine">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Delete Confirmation Modal -->
<!-- Assign Machine to Botler -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>

<script>
    $(document).ready(function(e) {
        let loadedTabData = {}; // Once load cache in first time, after didnt taken time
        $(".nav-link").on('click', function() {
            
        })
    })

    document.getElementById('togglePasswordConfirm').addEventListener('click', function () {
        const passwordField = document.getElementById('password_user');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('togglePasswordConfirmSecond').addEventListener('click', function () {
        const passwordField = document.getElementById('confirm_password_user');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ensure tabs work without changing the base URL
        const tabs = document.querySelectorAll('.nav-link[data-bs-toggle="tab"]');
        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                const tabContent = document.querySelector(target);
                if (tabContent) {
                    document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
                    tabContent.classList.add('active');
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
    });

    $(document).ready(function() {
        // role searching
        let table1 = $('#sub_botler_table').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": false,
            // "scrollX": true,
            "scrollCollapse": true,
            dom: 'Bfrtip',
            buttons: ['excel']
        });

        // permission searching
        let table2 = $('#user_botler_table').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": false,
            // "scrollX": true,
            "scrollCollapse": true,
            dom: 'Bfrtip',
            buttons: ['excel']
        });

        // breeder searching
        let table3 = $('#assign_machine_botler_table').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": false,
            // "scrollX": true,
            "scrollCollapse": true,
            dom: 'Bfrtip',
            buttons: ['excel']
        });

        // pet shop searching
        let table4 = $('#routePermissionTable').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": false,
            // "scrollX": true,
            "scrollCollapse": true,
            dom: 'Bfrtip',
            buttons: ['csv', 'excel', 'pdf', 'print']
        });

        // pet shop searching
        let table5 = $('#assign_machine_botler_view_table').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": false,
            // "scrollX": true,
            "scrollCollapse": true,
            dom: 'Bfrtip',
            buttons: []
        });
    });
</script>



<!-- Botler User Script -->
    <script>
        // create bottler user
            function handleSubBotlerUserAction(selectElement) {
                var action = selectElement.value;
                var id = selectElement.getAttribute('data-id');
                if (action === 'user_edit') {
                    $('#sub_bottler_user_edit_modal').modal('show');
                } else if (action === 'user_delete') {
                    $('#sub_bottler_user_delete_modal').modal('show');
                    $('#confirm_sub_bottler_user_delete').data('id', id);
                }
            }

            function machine_number_valid(num) {
                var value = num.value;
                var regex = /^[0-9]*$/;
                if (!regex.test(value)) {
                    num.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
                }
                if (num.value.length > 10) {
                    num.value = num.value.slice(0, 10); // Limit to 10 digits
                }
            }

            function personal_number_valid(num) {
                var value = num.value;
                var regex = /^[0-9]*$/;
                if (!regex.test(value)) {
                    num.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
                }
                if (num.value.length > 10) {
                    num.value = num.value.slice(0, 10); // Limit to 10 digits
                }
            }

            flatpickr("#birth_date_user", {
                maxDate: "today",
            });

            $('#create_sub_bottler_user_submit').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let role_name = $('#role_name').val();
                let bottler_name_user = $('#bottler_name_user').val();
                let sub_bottler_user = $('#sub_bottler_user').val();
                let name_user = $('#name_user').val();
                let email_user = $('#email_user').val();
                let password_user = $('#password_user').val();
                let confirm_password_user = $('#confirm_password_user').val();
                let contact_number_user = $('#contact_number_user').val();
                let personal_contact_user = $('#personal_contact_user').val();
                let birth_date_user = $('#birth_date_user').val();
                let about_me_user = $('#about_me_user').val();
                let status_user = $('#status_user').val();

                let namePattern = /^[a-zA-Z\s]{2,30}$/;
                let mobilePattern = /^[0-9]{10}$/;
                let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/; // At least 4 characters, at least one letter and one number

                let flag = false;

                function checkEmptyField(field, fieldName) {
                    if (field === '') {
                        flag = true;
                        Swal.fire({
                            title: 'Alert',
                            text: fieldName + " is required.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                }

                function checkPattern(field, pattern, fieldName, errorMessage) {
                    if (!pattern.test(field)) {
                        flag = true;
                        Swal.fire({
                            title: 'Alert',
                            text: fieldName + " " + errorMessage,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                }

                checkEmptyField(birth_date_user, 'Birth Date');

                checkEmptyField(personal_contact_user, 'Personal Contact Number');
                if (!flag) {
                    checkPattern(personal_contact_user, mobilePattern, 'Personal Contact Number', 'must be a valid 10-digit number.');
                }

                checkEmptyField(contact_number_user, 'Contact Number');
                if(!flag) {
                    checkPattern(contact_number_user, mobilePattern, 'Contact Number', 'must be a valid 10-digit number.');
                }

                checkEmptyField(confirm_password_user, 'Confirmed Password');
                if (password_user !== confirm_password_user) {
                    flag = true;
                    Swal.fire({
                        title: 'Alert',
                        text: "Password and Confirm Password do not match.",
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }

                checkEmptyField(password_user, 'Password');
                if(!flag) {
                    checkPattern(password_user, passwordPattern, 'Password', 'must be at least 5 characters long and contain at least one letter and one number.');
                }
                checkEmptyField(email_user, 'Email');
                if(!flag) {
                    checkPattern(email_user, emailPattern, 'Email', 'is not valid.');
                }
                checkEmptyField(name_user, 'Name');
                if(!flag) {
                    checkPattern(name_user, namePattern, 'Name', 'should only contain letters and spaces (2-30 characters).');
                }
                checkEmptyField(sub_bottler_user, 'Sub Bottler Name');
                checkEmptyField(bottler_name_user, 'Bottler Name');
                checkEmptyField(role_name, 'Role Name');
                if (!flag) {
                    $.ajax({
                        url: $("#createSubUserForm").attr('action'),
                        type: 'POST',
                        data: $("#createSubUserForm").serialize(),
                        success: function(response) {
                            if (response.error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.error,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'User created successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        },
                    });
                }
            });
        // create bottler user end

        // update bottler user
            flatpickr("#birth_date_edit_user", {
                maxDate: "today",
            });

            document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll('.action-select[data-bs-target="#sub_bottler_user_edit_modal"]');
                editButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const modal = document.querySelector('#sub_bottler_user_edit_modal');
                        modal.querySelector('input[name="id"]').value = this.getAttribute('data-id');
                        modal.querySelector('#name_user_edit').value = this.getAttribute('data-name');
                        modal.querySelector('#email_user_edit').value = this.getAttribute('data-email');
                        modal.querySelector('#password_user_edit').value = this.getAttribute('data-password');
                        modal.querySelector('#confirm_password_user_edit').value = this.getAttribute('data-password');
                        modal.querySelector('#contact_number_user_edit').value = this.getAttribute('data-contact_no');
                        modal.querySelector('#personal_contact_user_edit').value = this.getAttribute('data-personal_no');
                        modal.querySelector('#birth_date_edit_user').value = this.getAttribute('data-dob');
                        modal.querySelector('#about_me_user_edit').value = this.getAttribute('data-user_about');
                        modal.querySelector('#address_user_edit').value = this.getAttribute('data-address');
                        modal.querySelector('#role_name_edit').value = this.getAttribute('data-role');
                        modal.querySelector('#bottler_name_user_edit').value = this.getAttribute('data-bottler_id');
                        modal.querySelector('#sub_bottler_user_edit').value = this.getAttribute('data-sub_bottler_id');
                        modal.querySelector('#status_user_edit').value = this.getAttribute('data-status');
                    });
                });
            });

            $('#edit_sub_bottler_user_submit').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let name_user_edit = $('#name_user_edit').val();
                let email_user_edit = $('#email_user_edit').val();
                let password_user_edit = $('#password_user_edit').val();
                let confirm_password_user_edit = $('#confirm_password_user_edit').val();
                let contact_number_user_edit = $('#contact_number_user_edit').val();
                let personal_contact_user_edit = $('#personal_contact_user_edit').val();
                let birth_date_edit_user = $('#birth_date_edit_user').val();
                let about_me_user_edit = $('#about_me_user_edit').val();
                let address_user_edit = $('#address_user_edit').val();
                let role_name_edit = $('#role_name_edit').val();
                let bottler_name_user_edit = $('#bottler_name_user_edit').val();
                let sub_bottler_user_edit = $('#sub_bottler_user_edit').val();
                let status_user_edit = $('#status_user_edit').val();

                let namePattern = /^[a-zA-Z\s]{2,30}$/;
                let mobilePattern = /^[0-9]{10}$/;
                let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/; // At least 4 characters, at least one letter and one number
                let flag = false;
                function checkPattern(field, pattern, fieldName, errorMessage) {
                    if (!pattern.test(field)) {
                        flag = true;
                        Swal.fire({
                            title: 'Alert',
                            text: fieldName + " " + errorMessage,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                }
                if (!flag) {
                    checkPattern(personal_contact_user_edit, mobilePattern, 'Personal Contact Number', 'must be a valid 10-digit number.');
                }
                if(!flag) {
                    checkPattern(contact_number_user_edit, mobilePattern, 'Contact Number', 'must be a valid 10-digit number.');
                }
                if (password_user_edit !== confirm_password_user_edit) {
                    flag = true;
                    Swal.fire({
                        title: 'Alert',
                        text: "Password and Confirm Password do not match.",
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
                if(!flag) {
                    checkPattern(password_user_edit, passwordPattern, 'Password', 'must be at least 5 characters long and contain at least one letter and one number.');
                }
                if(!flag) {
                    checkPattern(email_user_edit, emailPattern, 'Email', 'is not valid.');
                }
                if (!flag) {
                    let form = $("#userBotlerEditForm");
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            if (response.error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.error,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'User updated successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong during update.',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    });
                }
            });
        // update bottler user end
        
        // delete sub bottler
            $('.action-select').on('click', function () {
                const id = $(this).data('id');
                $('#delete_user_botler_id').val(id);
            });

            // When modal's Delete button is clicked
            $('#confirm_user_bottler_delete').on('click', function () {
                const id = $('#delete_user_botler_id').val();
                $.ajax({
                    url: "{{ route('admin.user.botler.user.delete') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.error) {
                            Swal.fire("Error", response.error, "error");
                        } else {
                            Swal.fire("Deleted!", "Sub Bottler deleted successfully!", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function () {
                        Swal.fire("Error", "Something went wrong.", "error");
                    }
                });
            });
        // delete sub bottler end
    </script>
<!-- Botler User Script -->



<!-- Sub Botler Script -->
    <script>
        function handleSubBotlerAction(selectElement) {
            var action = selectElement.value;
            var id = selectElement.getAttribute('data-id');
            if (action === 'edit') {
                $('#editSubBotler').modal('show');
                // Pass the ID to the modal or perform any action
            } else if (action === 'delete') {
                $('#sub_botler_delete').modal('show');
                $('#confirm_sub_botler_delete').data('id', id);
            }
        }

        // Create Sub Botler
            document.getElementById('company_name').addEventListener('input', function() {
                document.getElementById('company_url').value = (this.value).toLowerCase().replace(/\s+/g, '-');
            });

            $("#company_logo_sub").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#company_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#company_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("#machine_logo_sub").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#machine_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#machine_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("#bottle_logo_sub").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#bottle_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#bottle_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            function previewFiles(inputId, previewContainerId) {
                let fileInput = document.getElementById(inputId);
                let previewContainer = document.getElementById(previewContainerId);

                fileInput.addEventListener("change", function(event) {
                    previewContainer.innerHTML = "";

                    let files = event.target.files;
                    if (files.length > 0) {
                        Array.from(files).forEach((file, index) => {
                            let previewWrapper = document.createElement("div");
                            previewWrapper.style.display = "inline-block";
                            previewWrapper.style.position = "relative";
                            previewWrapper.style.margin = "5px";

                            let removeBtn = document.createElement("button");
                            removeBtn.innerHTML = "&#10006;";
                            removeBtn.style.position = "absolute";
                            removeBtn.style.top = "5px";
                            removeBtn.style.right = "5px";
                            removeBtn.style.background = "red";
                            removeBtn.style.color = "white";
                            removeBtn.style.border = "none";
                            removeBtn.style.borderRadius = "50%";
                            removeBtn.style.width = "20px";
                            removeBtn.style.height = "20px";
                            removeBtn.style.cursor = "pointer";
                            removeBtn.style.display = "flex";
                            removeBtn.style.justifyContent = "center";
                            removeBtn.style.alignItems = "center";

                            removeBtn.addEventListener("click", function() {
                                previewWrapper.remove();
                                if (previewContainer.children.length === 0) {
                                    fileInput.value = "";
                                }
                            });

                            if (file.type.startsWith("image/")) {
                                let fileReader = new FileReader();
                                fileReader.onload = function(e) {
                                    let img = document.createElement("img");
                                    img.src = e.target.result;
                                    img.style.width = "100px";
                                    img.style.border = "1px solid #ccc";
                                    previewWrapper.appendChild(img);
                                    previewWrapper.appendChild(removeBtn);
                                    previewContainer.appendChild(previewWrapper);
                                };
                                fileReader.readAsDataURL(file);
                            } else if (file.type === "application/pdf") {
                                let fileURL = URL.createObjectURL(file);
                                let link = document.createElement("a");
                                link.href = fileURL;
                                link.target = "_blank";
                                link.style.display = "block";

                                let imgPath = document.createElement("img");
                                imgPath.src = "https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg"; // PDF icon
                                imgPath.style.width = "100px";
                                imgPath.style.height = "100px";
                                imgPath.style.display = "block";

                                link.appendChild(imgPath);
                                previewWrapper.appendChild(link);
                                previewWrapper.appendChild(removeBtn);
                                previewContainer.appendChild(previewWrapper);
                            }
                        });
                    }
                });
            }
            previewFiles("company_logo_sub", "company_logo_sub_preview");
            previewFiles("machine_logo_sub", "machine_logo_sub_preview");
            previewFiles("bottle_logo_sub", "bottle_logo_sub_preview");

            document.getElementById('company_name').addEventListener('input', function() {
                document.getElementById('company_url').value = (this.value).toLowerCase().replace(/\s+/g, '-');
            });

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

            $('#subBotlerSubmit').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let bottler_name_in_sub_bottler_create = $('#bottler_name_in_sub_bottler_create').val();
                let sub_bottler_name_sub = $('#sub_bottler_name').val();
                let company_name_sub = $('#company_name').val();
                let color_picker_sub = $('#color_picker').val();
                let status_sub = $('#status').val();
                let company_logo_sub = $('#company_logo').val();
                let flag = false;
                
                let form = $('#subBotlerForm')[0];
                let formData = new FormData(form);

                function checkEmptyField(field, fieldName) {
                    if (field === '') {
                        flag = true;
                        Swal.fire({
                            title: 'Alert',
                            text: fieldName + " is required.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                }

                checkEmptyField(bottler_name_in_sub_bottler_create, 'Bottler Name');
                checkEmptyField(sub_bottler_name_sub, 'Sub Bottler Name');
                checkEmptyField(company_name_sub, 'Company Name');
                checkEmptyField(color_picker_sub, 'Color Picker');
                checkEmptyField(status_sub, 'Status');
                checkEmptyField(company_logo_sub, 'Company Logo');

                if (!flag) {
                    $.ajax({
                        url: $("#subBotlerForm").attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.error,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Sub Bottler created successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        },
                    });
                }
            });
        // Create Sub Botler End

        // update sub bottler
            document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll('.action-select[data-bs-target="#edit_sub_botler"]');
                editButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const modal = document.querySelector('#edit_sub_botler');
                        modal.querySelector('input[name="id"]').value = this.getAttribute('data-id');
                        modal.querySelector('#bottler_name_in_sub_bottler_edit').value = this.getAttribute('data-bottler_id');
                        modal.querySelector('#sub_bottler_name_edit').value = this.getAttribute('data-sub_bottler_name');
                        modal.querySelector('#company_name_edit').value = this.getAttribute('data-company_name');
                        modal.querySelector('#company_url_edit').value = this.getAttribute('data-company_url');
                        modal.querySelector('#color_picker_edit').value = this.getAttribute('data-color_picker');
                        modal.querySelector('#status_edit').value = this.getAttribute('data-status');
                        modal.querySelector('#company_logo_sub_edit').value = this.getAttribute('data-company_logo');
                        modal.querySelector('#machine_logo_sub_edit').value = this.getAttribute('data-machine_logo');
                        modal.querySelector('#bottle_logo_sub_edit').value = this.getAttribute('data-bottle_logo');
                    });
                });
            });

            $("#company_logo_sub_edit").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#company_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#company_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("#machine_logo_sub_edit").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#machine_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#machine_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("#bottle_logo_sub_edit").on("change", function () {
                let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
                let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
                let file = this.files[0];
                // Reset preview initially
                $("#bottle_logo_sub_preview").attr("src", "").hide();
                if (file) {
                    let fileName = file.name;
                    let fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        Swal.fire({
                            title: 'Invalid File Type',
                            text: "Only PNG, JPG, JPEG, and PDF files are allowed.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    if (file.size > maxSizeInBytes) {
                        Swal.fire({
                            title: 'File Too Large',
                            text: "Company logo size should not exceed 2MB.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        $(this).val(""); // Clear input
                        return;
                    }

                    // Show preview only if valid
                    if (['png', 'jpg', 'jpeg', 'pdf'].includes(fileExtension)) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $("#bottle_logo_sub_preview").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            function previewFiles(inputId, previewContainerId) {
                let fileInput = document.getElementById(inputId);
                let previewContainer = document.getElementById(previewContainerId);

                fileInput.addEventListener("change", function(event) {
                    previewContainer.innerHTML = "";

                    let files = event.target.files;
                    if (files.length > 0) {
                        Array.from(files).forEach((file, index) => {
                            let previewWrapper = document.createElement("div");
                            previewWrapper.style.display = "inline-block";
                            previewWrapper.style.position = "relative";
                            previewWrapper.style.margin = "5px";

                            let removeBtn = document.createElement("button");
                            removeBtn.innerHTML = "&#10006;";
                            removeBtn.style.position = "absolute";
                            removeBtn.style.top = "5px";
                            removeBtn.style.right = "5px";
                            removeBtn.style.background = "red";
                            removeBtn.style.color = "white";
                            removeBtn.style.border = "none";
                            removeBtn.style.borderRadius = "50%";
                            removeBtn.style.width = "20px";
                            removeBtn.style.height = "20px";
                            removeBtn.style.cursor = "pointer";
                            removeBtn.style.display = "flex";
                            removeBtn.style.justifyContent = "center";
                            removeBtn.style.alignItems = "center";

                            removeBtn.addEventListener("click", function() {
                                previewWrapper.remove();
                                if (previewContainer.children.length === 0) {
                                    fileInput.value = "";
                                }
                            });

                            if (file.type.startsWith("image/")) {
                                let fileReader = new FileReader();
                                fileReader.onload = function(e) {
                                    let img = document.createElement("img");
                                    img.src = e.target.result;
                                    img.style.width = "100px";
                                    img.style.border = "1px solid #ccc";
                                    previewWrapper.appendChild(img);
                                    previewWrapper.appendChild(removeBtn);
                                    previewContainer.appendChild(previewWrapper);
                                };
                                fileReader.readAsDataURL(file);
                            } else if (file.type === "application/pdf") {
                                let fileURL = URL.createObjectURL(file);
                                let link = document.createElement("a");
                                link.href = fileURL;
                                link.target = "_blank";
                                link.style.display = "block";

                                let imgPath = document.createElement("img");
                                imgPath.src = "https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg"; // PDF icon
                                imgPath.style.width = "100px";
                                imgPath.style.height = "100px";
                                imgPath.style.display = "block";

                                link.appendChild(imgPath);
                                previewWrapper.appendChild(link);
                                previewWrapper.appendChild(removeBtn);
                                previewContainer.appendChild(previewWrapper);
                            }
                        });
                    }
                });
            }
            previewFiles("company_logo_sub_edit", "company_logo_sub_preview");
            previewFiles("machine_logo_sub_edit", "machine_logo_sub_preview");
            previewFiles("bottle_logo_sub_edit", "bottle_logo_sub_preview");

            document.getElementById('company_name_edit').addEventListener('input', function() {
                document.getElementById('company_url_edit').value = (this.value).toLowerCase().replace(/\s+/g, '-');
            });

            $('#editSubBotlerSubmit').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let bottler_name_in_sub_bottler_edit = $('#bottler_name_in_sub_bottler_edit').val();
                let sub_bottler_name_edit = $('#sub_bottler_name_edit').val();
                let company_name_edit = $('#company_name_edit').val();
                let color_picker_edit = $('#color_picker_edit').val();
                let status_edit = $('#status_edit').val();
                let flag = false;
                
                let form = $('#subBotlerEditForm')[0];
                let formData = new FormData(form);

                function checkEmptyField(field, fieldName) {
                    if (field === '') {
                        flag = true;
                        Swal.fire({
                            title: 'Alert',
                            text: fieldName + " is required.",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                }

                checkEmptyField(bottler_name_in_sub_bottler_edit, 'Bottler Name');
                checkEmptyField(sub_bottler_name_edit, 'Sub Bottler Name');
                checkEmptyField(company_name_edit, 'Company Name');
                checkEmptyField(color_picker_edit, 'Color Picker');
                checkEmptyField(status_edit, 'Status');

                if (!flag) {
                    $.ajax({
                        url: $("#subBotlerEditForm").attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.error,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Sub Bottler created successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        },
                    });
                }
            });
        // update sub bottler end

        // delete sub bottler
            $('.action-select').on('click', function () {
                const id = $(this).data('id');
                $('#delete_sub_botler_id').val(id);
            });

            // When modal's Delete button is clicked
            $('#confirm_sub_botler_delete').on('click', function () {
                const id = $('#delete_sub_botler_id').val();
                $.ajax({
                    url: "{{ route('admin.user.sub-botler.delete') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.error) {
                            Swal.fire("Error", response.error, "error");
                        } else {
                            Swal.fire("Deleted!", "Sub Bottler deleted successfully!", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function () {
                        Swal.fire("Error", "Something went wrong.", "error");
                    }
                });
            });
        // delete sub bottler end
    </script>
<!-- Sub Botler Script -->


<!-- Assign Machine To Bottler Start -->
    <script>
        function handleAssignMachineAction(selectedElement) {
            let action = selectedElement.value;
            let id = selectedElement.getAttribute('data-id');
            if(action === 'edit_assign_machine') {
                $('#assign_machine_botler_update').modal('show');
                
            } else if (action === 'view_assign_machine') {
                $('#assign_machine_botler_view').modal('show');

            } else if (action === 'delete_assign_machine') {
                $('#delete_assign_machine_modal').modal('show');
                $('#confirm_delete_assign_machine').data('id', id);
            }
        }

        $("#createAssigneMachineToSubBotler").on("click", function (e) {
            e.preventDefault();
            let assign_bottler_name = $("#assign_bottler_name").val();
            let assign_sub_bottler_name = $("#assign_sub_bottler_name").val();
            let assign_machine_number = $("#assign_machine_number").val();
            let flag = false;

            function checkEmptyField(field, fieldName) {
                if (field === '') {
                    flag = true;
                    Swal.fire({
                        title: 'Alert',
                        text: fieldName + " is required.",
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            }

            checkEmptyField(assign_bottler_name, 'Bottler Name');
            checkEmptyField(assign_sub_bottler_name, 'Sub Bottler Name');
            checkEmptyField(assign_machine_number, 'Machine Number');

            if (!flag) {
                let form = $("#assignMachineToSubBotlerForm")[0];
                let formData = new FormData(form);
                $.ajax({
                    url: $("#assignMachineToSubBotlerForm").attr('action'),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message || 'Failed to assign machine',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function (xhr) {
                        let errMsg = 'Something went wrong!';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Error',
                            text: errMsg,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            }

        });


        $(document).ready(function () {
            $(".action-select").on("click", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $("#delete_assigne_sub_machine_id").val(id);
            });

            $("#confirm_delete_assigne_sub_machine").on('click', function(e) {
                e.preventDefault();
                let deleted_id = $("#delete_assigne_sub_machine_id").val();
                $.ajax({
                    url: '/admin/user/botler/sub-botler-machine/delete/' + deleted_id,
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: deleted_id
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Deleted',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message || 'Failed to delete sub machine',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function(xhr) {
                        let errMsg = 'Something went wrong!';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Error',
                            text: errMsg,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            });
        });

    </script>
<!-- Assign Machine To Bottler End -->
@endsection

