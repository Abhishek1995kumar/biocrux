@extends('layouts.admin')

@section('title','Botler List')

@section('header')
<style>
    
.nosubmitForm {
  color: #555;
  display: flex;
  padding: 2px;
  border: 1px solid currentColor;
  border-radius: 5px;
}

.searchingButton[type="submit"]:focus,
.nosubmit[type="search"]:focus {
  box-shadow: 0 0 3px 0 #1183d6;
  border-color: #1183d6;
  outline: none;
}

form.nosubmit {
 border: none;
 padding: 0;
}

input.nosubmit {
  border: 1px solid #555;
  width: 100%;
  padding: 9px 4px 9px 40px;
   background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
}

</style>
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
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-3">
        <div class="alert alert-primary text-center border border-primary">
            <h5 class="alert-heading">Total Botler</h5>
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
    <div class="card-header border-0 pt-6">
        <ul class="nav nav-tabs ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-bs-toggle="tab">Botler List</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-bs-toggle="tab">Assign Machine To Botler</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <!-- Botler Management Start -->
            <div class="tab-pane active" id="tab_1">
                <div class="card-toolbar">
                    <div class="card-title d-flex ">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <form class="nosubmit nosubmitForm" id="searchForm">
                                        @csrf
                                        <input type="search" name="keyword" id="keyword" class="nosubmit form-control form-control-solid w-250px ps-14" placeholder="Search by keyword" value="{{ request('keyword') }}" />
                                    </form>
                                </div>
                                
                                <div class="mx-5 my-5">
                                    <a href="{{ route('admin.user.botler.list') }}" class="btn btn-light p-3"><i class="fa fa-fw fa-refresh"></i>Generate Excel</a>
                                </div>
                            </div>

                            <div >
                                <button type="button" class="btn btn-sm btn-success mx-5" data-bs-toggle="modal" data-bs-target="#addBotler">
                                    Add Botler
                                </button>
                            </div>
                        </div>

                        
                    </div>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table">
                        <thead>
                            <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                @foreach($botlerHeader as $header)
                                    <th class="min-w-125px">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach($botlerList as $botler)
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">
                                        <div class="w-100 d-flex justify-content-center align-items-center" style="height: 70px; overflow: hidden; border-radius: 10px; ">
                                            @php
                                                $filePath = $botler->company_logo ?? '';
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
                                        @if($botler->bottler_detail_type == '')
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#assignedMachineOrSubBotler" onclick="setBotlerId({{ $botler->id }})">{{ $botler->bottler_name }}</a>
                                        @else
                                            <a href="{{ url('admin/user/botler/detail', $botler->id) }}">{{ $botler->bottler_name }}</a>
                                        @endif
                                    </th>
                                    <th class="min-w-125px">{{ $botler->company_name }}</th>
                                    <th class="min-w-125px">{{ $botler->company_url }}</th>
                                    <th class="min-w-125px">{{ $botler->color_code }}</th>
                                    <th class="min-w-125px">{{ \Carbon\Carbon::parse($botler->created_at)->format('M d Y') }}</th>
                                    <th class="min-w-125px">{{ ($botler->status === 1) ? 'Enable' : 'Disable' }}</th>
                                    <th class="min-w-125px">
                                        <div class="d-flex flex-row">
                                            <button  class="btn btn-sm  btn-warning action-select edit_botler_form" data-id="{{ $botler->id }}" data-name="{{ $botler->bottler_name }}" data-company="{{ $botler->company_name }}" data-url="{{ $botler->company_url }}" data-status="{{ $botler->status }}" data-color="{{ $botler->color_code }}" data-company_logo="{{ $botler->company_logo }}" data-machine="{{ $botler->machine_logo }}" data-bottle="{{ $botler->bottle_logo }}"><i class="fa fa-pencil"></i></button>
                                            <button class="btn  btn-sm btn-danger action-select delete_botler_data" data-id="{{ $botler->id }}" data-name="{{ $botler->bottler_name }}" data-company="{{ $botler->company_name }}" data-url="{{ $botler->company_url }}" data-status="{{ $botler->status }}" data-color="{{ $botler->color_code }}" data-company_logo="{{ $botler->company_logo }}" data-machine="{{ $botler->machine_logo }}" data-bottle="{{ $botler->bottle_logo }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Botler Management End -->

            <!-- Assign Machine to Botler Start -->
            <div class="tab-pane" id="tab_2">
                <div class="card-toolbar">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assign_machine_botler" class="btn btn-primary" >
                            <i class="fa fa-plus"></i>Assign Machine to Bottler</button>
                        </button>
                    </div>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="assign_machine_botler_table">
                        <thead>
                            <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                @foreach($assineMachineHeader as $header)
                                    <th class="min-w-125px">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach($assignMachineList as $assign_machine_data)
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#assign_machine_botler_view" data-id="{{ $assign_machine_data->id }}">
                                            {{ $assign_machine_data->botler->bottler_name }}
                                        </a>
                                    </th>
                                    <th class="min-w-125px">{{ $assign_machine_data->machine->machine_name }}</th>
                                    <th class="min-w-125px">{{ $assign_machine_data->machine->machine_number }}</th>
                                    <th class="min-w-125px">{{ $assign_machine_data->machine->address }}</th>
                                    <th class="min-w-125px">{{ $assign_machine_data->machine->city }}</th>
                                    <th class="min-w-125px">{{ $assign_machine_data->machine->state }}</th>
                                    <th class="min-w-125px">{{ ($assign_machine_data->machine->installed == 1) ? 'Active' : 'Inactive' }}</th>
                                    <th class="min-w-125px">
                                        <div class="d-flex flex-row">
                                            <!-- <button class="btn btn-sm btn-warning action-select openEditModal" data-bs-toggle="modal" data-bs-target="#assign_machine_botler_update" data-id="{{ $assign_machine_data->id }}" data-machine_number="{{ $assign_machine_data->botler->bottler_name }}" data-machine_name="{{ $assign_machine_data->machine->machine_number }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>    -->
                                            <button class="btn btn-sm btn-danger action-select" data-bs-toggle="modal" data-bs-target="#delete_assign_machine_modal" data-id="{{ $assign_machine_data->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Assign Machine to Botler End -->
        </div>
    </div>
</div>

<!-- Botler Management -->
    <!-- Create Botler Start -->
        <div class="modal fade modal-lg" id="addBotler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
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
                        <form id="bottlerForm" action="{{ route('admin.user.botler.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 " id="bottler_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <input type="text" name="bottler_name" id="bottler_name" class="form-control text-capitalize" placeholder="Enter Bottler Name" maxlength="30" >
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control text-capitalize" placeholder="Enter Company Name" maxlength="200" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_url_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                        <input type="text" name="company_url" id="company_url" class="form-control" disabled >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="status_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status </label>
                                                        <select type="text" name="status" id="status" class="form-select" data-placeholder="Select Status">
                                                            <option selected disabled value=""></option>
                                                            <option value="1">Enable</option>
                                                            <option value="0">Disable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="color_code_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                        <input type="color" name="color_code" id="color_code" class="form-control" style="height: 3.3rem !important;" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="">
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_logo_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                        <input type="file" name="company_logo" id="company_logo" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="company_logo_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="machine_logo_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                        <input type="file" name="machine_logo" id="machine_logo" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="machine_logo_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="bottle_logo_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                        <input type="file" name="bottle_logo" id="bottle_logo" class="form-control" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="bottle_logo_preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="createBotlerSubmit">Edit Botler</button>
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
        <div class="modal fade modal-lg" id="editBotler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="editBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h2 class="fw-bold">Edit Botler</h2>
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
                        <form id="editBotlerForm" action="{{ route('admin.user.botler.update') }}" method="POST" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="editBotlerId" value="{{ $botler->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="application_category_id" value="8">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 " id="bottler_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <input type="text" name="bottler_name" id="bottler_name_edit" class="form-control" placeholder="Enter Bottler Name" maxlength="30" value="{{ $botler->bottler_name }}" >
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_name_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Name</label>
                                                        <input type="text" name="company_name" id="company_name_edit" class="form-control" placeholder="Enter Company Name" maxlength="200" value="{{ $botler->company_name }}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_url_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Url</label>
                                                        <input type="text" name="company_url" id="company_url_edit" class="form-control" placeholder="Enter Company Url" value="{{ $botler->company_url }}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="status_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Status </label>
                                                        <select type="text" name="status" id="status_edit" class="form-select">
                                                            <option value="1" {{ $botler->status === 1 ? 'selected' : '' }}>Enable</option>
                                                            <option value="0" {{ $botler->status === 0 ? 'selected' : '' }}>Disable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="color_code_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Choose Color</label>
                                                        <input type="color" name="color_code" id="color_code_edit" class="form-control" style="height: 3.3rem !important;" value="{{ $botler->color_code }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="">
                                                </div>
                                                <div class="col-md-4 mb-4 " id="company_logo_edit">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Company Logo (.png)</label>
                                                        <input type="file" name="company_logo" id="company_logo_edit" class="form-control" accept=".png, .jpg, .jpeg, .pdf" value="{{ $botler->company_logo }}">
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="company_logo_edit_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="machine_logo_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Logo (.png)</label>
                                                        <input type="file" name="machine_logo" id="machine_logo_edit" class="form-control" accept=".png, .jpg, .jpeg, .pdf" value="{{ $botler->machine_logo }}" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="machine_logo_edit_preview"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 " id="bottle_logo_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottle Logo (.png)</label>
                                                        <input type="file" name="bottle_logo" id="bottle_logo_edit" class="form-control" value="{{ $botler->bottle_logo }}" accept=".png, .jpg, .jpeg, .pdf" >
                                                        <span class="text-muted">Support only png/jpg/jpeg/pdf file and file size less than 2 mb</span>
                                                        <div class="previewContainer" id="bottle_logo_edit_preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="editBotlerSubmit">Edit Botler</button>
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
        <div class="modal fade modal-md" id="createMachineFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createMissionTitle" aria-hidden="true">
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
                                            <input type="hidden" name="application_category_id" value="8">
                                            <div class="row">
                                                <div class="col-md-12 mb-4" id="ngoCenterDiv">
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
    <!-- Create Mission End -->

    <!-- Assigned Machine Or Sub Botler Confirmation Modal -->
        <div class="modal fade" id="assignedMachineOrSubBotler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="assignedMachineOrSubBotlerLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignedMachineOrSubBotlerLabel">Confirm Assign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <form id="assignedFormId" action="" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id="assignedBotlerId" value="">
                                                <div class="col-md-12 mb-4 " id="bottler_name_delete_div">
                                                    <div class="form-group">
                                                        <label class="fs-6 fw-semibold mb-2">Assigned Machine Type</label>
                                                        <select class="form-select" id="bottler_detail_type">
                                                            <option selected disabled value="">Select Assigned Machine Type</option>
                                                            <option value="sub_botler">Sub Botler</option>
                                                            <option value="machine">Machine</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="assignBotler">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Delete Confirmation Modal -->

    <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-4 " id="bottler_name_delete_div">
                                                <div class="form-group">
                                                    <label class=" fs-6 fw-semibold mb-2">Bottler Name</label>
                                                    <input class="form-control" value="{{ $botler->bottler_name }}" disabled >
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 " id="company_name_delete_div">
                                                <div class="form-group">
                                                    <label class=" fs-6 fw-semibold mb-2">Company Name</label>
                                                    <input class="form-control" value="{{ $botler->company_name }}" disabled >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div style="text-align: center;">
                            <span style="">Are you sure you want to delete this machine?</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Delete Confirmation Modal -->
<!-- Botler Management -->


<!-- Assign Machine to Botler -->
    <!-- Create Botler Start -->
        <div class="modal fade modal-lg" id="assign_machine_botler" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="fw-bold">Assign Machine To Bottler</h2>
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
                        <form id="assignMachineToBotlerForm" action="{{ route('admin.user.botler.assign-machine.save') }}" method="POST" enctype="multipart/form-data">
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
                                                            <option selected disabled value="">Select Bottler</option>
                                                            @foreach($botlerList as $botler)
                                                                <option value="{{ $botler->id }}">{{ $botler->bottler_name }}</option>
                                                            @endforeach
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="machine_number_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Number </label>
                                                        <select type="text" name="machine_id" id="assign_machine_number" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select machine number">
                                                            <option selected disabled value="">Select Machine Number</option>
                                                            @foreach($machines as $machine)
                                                                <option value="{{ $machine->id }}">{{ $machine->machine_name }} - {{ $machine->machine_number }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="createAssigneMachineToBotler">Assign Machine</button>
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
                       <form id="editAssignMachineToBotlerForm" action="{{ route('admin.user.botler.assign-machine.edit') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <input name="id" type="hidden" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4 " id="bottler_name_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Bottler Name</label>
                                                        <select type="text" name="bottler_id" id="assign_bottler_name" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select bottler name">
                                                            <option selected disabled value="">Select Bottler Name</option>
                                                            @foreach($botlerList as $botler)
                                                                <option value="{{ $botler->id }}" {{ (isset($assign_machine_data) && $assign_machine_data->bottler_id == $botler->id) ? 'selected' : '' }}>{{ $botler->bottler_name }}</option>
                                                            @endforeach
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4 " id="machine_number_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Machine Number </label>
                                                        <!-- <select type="text" name="machine_id" id="assign_machine_number" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select machine number">
                                                            <option selected disabled value="">Select Machine Number</option>
                                                            @foreach($machines as $machine)
                                                                <option value="{{ $machine->id }}" {{ (isset($assign_machine_data) && $assign_machine_data->machine_id == $machine->id) ? 'selected' : '' }}>{{ $machine->machine_name }} - {{ $machine->machine_number }}</option>
                                                            @endforeach
                                                        </select> -->
                                                        <select name="machine_id" id="assign_machine_number" class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select machine number">
                                                            <option selected disabled value="">Select machine</option>
                                                        </select>       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer modal-footer">
                                            <button type="submit" class="btn btn-primary" id="editAssigneMachineToBotler">Assign Machine</button>
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
        <div class="modal fade" id="delete_assign_machine_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete_assign_machine_modal_label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_assign_machine_modal_label">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <span>Are you sure you want to delete this machine from botler?</span>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <input type="hidden" id="delete_assigne_machine_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_delete_assigne_machine">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Delete Confirmation Modal -->
<!-- Assign Machine to Botler -->



@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#kt_table').DataTable({
    //         "order": [[ 0, "desc" ]],
    //         "pageLength": 10,
    //         "lengthMenu": [10, 25, 50, 100],
    //         "language": {
    //             "search": "",
    //             "zeroRecords": "No records found",
    //             "info": "",
    //             "infoEmpty": "No records available",
    //             "infoFiltered": "(filtered from _MAX_ total records)",
    //         },
    //         buttons: [
    //             {
    //                 extend: 'excelHtml5',
    //                 text: 'Excel',
    //                 className: 'btn btn-secondary',
    //             }
    //         ],
    //         dom: '<"d-flex justify-content-between align-items-center"<"d-flex"f><"ml-auto"B>>rt<"d-flex justify-content-between align-items-center mt-3"p>',
    //     });

    //     $('#kt_table_filter input').attr('placeholder', 'Search...').addClass('form-control p-4 w-100').wrap('<div class="input-group"></div>');
    //     // Hide the search label
    //     $('#kt_table_filter label').contents().filter(function() {
    //         return this.nodeType === 3;
    //     }).remove();
    // });

    // Search Botler Data Start from here
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            searchForm();
        });

        document.getElementById('keyword').addEventListener('change', function(e) {
            e.preventDefault();
            searchForm();
        });

        function searchForm() {
            try {
                let keyword = document.getElementById('keyword').value;
                alert("Searching for: " + keyword); // Debugging line to check keyword value
                let url = "{{ route('admin.user.botler.list') }}";

                if(!keyword) {
                    return false; // Prevent submission if keyword is empty
                } else {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        data: {
                            _token: '{{ csrf_token() }}',
                            keyword: keyword
                        },
                        success: function(response) {
                            alert("Search completed successfully!");
                            if (response.success) {
                                // Update the table or UI with the new data
                                $('#kt_table').DataTable().clear().rows.add(response.data).draw();
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        },
                    })
                }

            } catch (error) {
                console.error("Error in searchForm function:", error);
            }
        }
    // Search Botler Data End from here
</script>

<script>
    // $(document).ready(function() {
        //     $('#kt_table').DataTable({
        //         "order": [[ 0, "desc" ]],
        //         "pageLength": 10,
        //         "lengthMenu": [10, 25, 50, 100],
        //         "language": {
        //             "lengthMenu": "Display _MENU_ records per page",
        //             "zeroRecords": "No records found",
        //             "info": "Showing page _PAGE_ of _PAGES_",
        //             "infoEmpty": "No records available",
        //             "infoFiltered": "(filtered from _MAX_ total records)"
        //         }
        //     });
    // });

    // $(document).on('click', '#confirmDelete', function () {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '/admin/user/botler/delete/' + id,
        //         type: 'DELETE',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function (response) {
        //             $('#deleteConfirmationModal').modal('hide');
        //             location.reload();
        //         },
        //         error: function (xhr) {
        //             console.log(xhr.responseText);
        //         }
        //     });
    // });

    // $(document).on('change', '.action-select', function () {
        //     var action = $(this).val();
        //     var el = $(this);
        //     var id = el.data('id');

        //     if (action === 'edit') {
        //         // Populate text fields
        //         $('#editBotler input[name="id"]').val(id);
        //         $('#bottler_name_edit').val(el.data('name') || '');
        //         $('#company_name_edit').val(el.data('company') || '');
        //         $('#company_url_edit').val(el.data('url') || '');
        //         $('#status_edit').val(el.data('status'));
        //         $('#color_code_edit').val(el.data('color') || '');

        //         // Show existing uploaded file names as text or preview
        //         // You can update UI like below each file input:
        //         $('#company_logo_edit').closest('.form-group').find('.file-preview').remove();
        //         $('#company_logo_edit').after(`<div class="file-preview mt-2">Current: ${el.data('company_logo')}</div>`);

        //         $('#machine_logo_edit').closest('.form-group').find('.file-preview').remove();
        //         $('#machine_logo_edit').after(`<div class="file-preview mt-2">Current: ${el.data('machine')}</div>`);

        //         $('#bottle_logo_edit').closest('.form-group').find('.file-preview').remove();
        //         $('#bottle_logo_edit').after(`<div class="file-preview mt-2">Current: ${el.data('bottle')}</div>`);

        //         // Update form action
        //         $('#editBotlerForm').attr('action', '/admin/user/botler/update/' + id);

        //         // Show modal
        //         $('#editBotler').modal('show');
        //     } else if (action === 'delete') {
        //         $('#deleteConfirmationModal').modal('show');
        //         $('#confirmDelete').data('id', id);
        //     }
        //     // Reset dropdown after action
        //     $(this).val('');
    // });

    $("#company_logo").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#company_logo_preview").attr("src", "").hide();
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
                    $("#company_logo_preview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#machine_logo").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#machine_logo_preview").attr("src", "").hide();
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
                    $("#machine_logo_preview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#bottle_logo").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#bottle_logo_preview").attr("src", "").hide();
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
                    $("#bottle_logo_preview").attr("src", e.target.result).show();
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
    previewFiles("company_logo", "company_logo_preview");
    previewFiles("machine_logo", "machine_logo_preview");
    previewFiles("bottle_logo", "bottle_logo_preview");

    document.getElementById('company_name').addEventListener('input', function() {
        document.getElementById('company_url').value = (this.value).toLowerCase().replace(/\s+/g, '-');
    });

    $("#createBotlerSubmit").on('click', function(e) {
        e.preventDefault();
        let bottlerName = $("#bottler_name").val();
        let companyName = $("#company_name").val();
        let companyUrl = $("#company_url").val();
        let status = $("#status").val();
        let colorCode = $("#color_code").val();
        let companyLogoInput = $("#company_logo").val();
        let machineLogo = $("#machine_logo").val();
        let bottleLogo = $("#bottle_logo").val();
        let flag = false;
        
        function checkEmptyFieldBotler(field, fieldName, isFile = false) {
            if (isFile) {
                if (!field || field.length === 0) {
                    flag = true;
                    Swal.fire({
                        title: 'Alert',
                        text: fieldName + " is required.",
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            } else if (field === '') {
                flag = true;
                Swal.fire({
                    title: 'Alert',
                    text: fieldName + " is required.",
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        }
        
        checkEmptyFieldBotler($("#company_logo")[0] && $("#company_logo")[0].files ? $("#company_logo")[0].files.length : 0, "Company Logo", true);
        checkEmptyFieldBotler($("#bottle_logo")[0] && $("#bottle_logo")[0].files ? $("#bottle_logo")[0].files.length : 0, "Bottle Logo", true);
        checkEmptyFieldBotler($("#machine_logo")[0] && $("#machine_logo")[0].files ? $("#machine_logo")[0].files.length : 0, "Machine Logo", true);
        checkEmptyFieldBotler(colorCode, "Color Code");
        checkEmptyFieldBotler(status, "Status");
        checkEmptyFieldBotler(companyUrl, "Company Url");
        checkEmptyFieldBotler(companyName, "Company Name");
        checkEmptyFieldBotler(bottlerName, "Bottler Name");

        if (flag) {
            return;
        }
       
        $("#bottlerForm").submit();
    });
</script>

<script>
    let selectedBotlerId = null;
    // Open Edit Modal
    $(document).on('click', '.edit_botler_form', function () {
        const data = $(this).data();
        $('#editBotlerId').val(data.id);
        $('#bottler_name_edit').val(data.name);
        $('#company_name_edit').val(data.company);
        $('#company_url_edit').val(data.url || ''); // fix for empty or missing url
        // $('#status_edit').val(String(data.status)); // fix for selected option mismatch
        $('#status_edit').val(); // fix for selected option mismatch
        $('#color_code_edit').val(data.color);
        $('#editBotler').modal('show');
    });

    $("#company_logo_edit").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#company_logo_edit_preview").attr("src", "").hide();
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
                    $("#company_logo_edit_preview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#machine_logo_edit").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#machine_logo_edit_preview").attr("src", "").hide();
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
                    $("#machine_logo_edit_preview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#bottle_logo_edit").on("change", function () {
        let allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        let maxSizeInBytes = 1 * 1024 * 1024; // 2MB
        let file = this.files[0];
        // Reset preview initially
        $("#bottle_logo_edit_preview").attr("src", "").hide();
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
                    $("#bottle_logo_edit_preview").attr("src", e.target.result).show();
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
    previewFiles("company_logo_edit", "company_logo_edit_preview");
    previewFiles("machine_logo_edit", "machine_logo_edit_preview");
    previewFiles("bottle_logo_edit", "bottle_logo_edit_preview");

    document.getElementById('company_name_edit').addEventListener('input', function() {
        document.getElementById('company_url_edit').value = (this.value).toLowerCase().replace(/\s+/g, '-');
    });
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

    function setBotlerId(id) {
        $('#assignedBotlerId').val(id);
    }

    $("#assignBotler").on('click', function(e) {
        e.preventDefault();
        let bottlerDetailType = $("#bottler_detail_type").val();
        let bottlerId = $("#assignedBotlerId").val();
        let flag = false;

        function checkEmptyFieldBotler(field, fieldName) {
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
        checkEmptyFieldBotler(bottlerDetailType, "Assigned Type");

        if (!flag) {
            $.ajax({
                url: '/admin/user/botler/assign/' + bottlerId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    bottler_detail_type: bottlerDetailType
                },
                success: function(response) {
                    Swal.fire({
                        title: response.success ? 'Success' : 'Error',
                        text: response.message,
                        icon: response.success ? 'success' : 'error',
                        confirmButtonText: 'Ok'
                    });
                    if (response.success) {
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
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
</script>

<script>
    $(document).on('click', '.delete_botler_data', function () {
        selectedBotlerId = $(this).data('id');
        $('#deleteConfirmationModal').modal('show');
        $('#confirmDelete').off('click').on('click', function () {
            $.ajax({
                url: "{{ route('admin.user.botler.delete') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: selectedBotlerId
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Deleted',
                            text: response.message,
                            imageUrl: 'https://cdn-icons-png.flaticon.com/512/1214/1214428.png', // trash icon URL
                            imageWidth: 50,
                            imageHeight: 50,
                            showCancelButton: false,
                            confirmButtonText: 'Ok'
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        alert('Failed to delete');
                    }
                },
                error: function () {
                    alert('Error deleting botler');
                }
            });
        });
    });
</script>



<!-- Assign Machin To Botler Start Script -->
<script>
    $("#createAssigneMachineToBotler").on('click', function(e) {
        e.preventDefault();
        let flag = false;
        let bottlerId = $("#assign_bottler_name").val();
        let machineId = $("#assign_machine_number").val();

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

        checkEmptyField(machineId, "Machine Number");
        checkEmptyField(bottlerId, "Bottler Name");

        if (!flag) {
            let form = $("#assignMachineToBotlerForm")[0];
            let formData = new FormData(form);

            $.ajax({
                url: $("#assignMachineToBotlerForm").attr('action'),
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


    // Update Machine Number
        // $('.openEditModal').on('click', function () {
        //     let id = $(this).data('id');
        //     let bottler_id = $(this).data('bottler_id');
        //     let machine_id = $(this).data('machine_id');

        //     // Set hidden input value
        //     $('input[name="id"]').val(id);

        //     // Set selected values in dropdowns
        //     $('#assign_bottler_name').val(bottler_id).trigger('change');
        //     $('#assign_machine_number').val(machine_id).trigger('change');

        //     $.ajax({
        //         url: '/admin/user/botler/get-edit-machine-options/' + id,
        //         type: 'GET',
        //         success: function (response) {
        //             if(response) {
        //                 let options = `<option disabled>Select machine</option>`;
        //                 response.machine_options.forEach(function(machine) {
        //                     options += `<option value="${machine.id}" ${(machine.id === response.assigned_machine_id) ? 'selected' : ''}>
        //                         ${machine.machine_name} - ${machine.machine_number}
        //                     </option>`;
        //                 });
        //                 $('#assign_machine_number').html(options).trigger('change');
        //             } else {
        //                 Swal.fire({
        //                     title: 'Error',
        //                     text: response.message || 'Failed to fetch machine details',
        //                     icon: 'error',
        //                     confirmButtonText: 'Ok'
        //                 });
        //             }
        //         }
        //     });
        // });

        $('.openEditModal').on('click', function () {
            let id = $(this).data('id');
            let bottler_id = $(this).data('bottler_id');

            // set hidden ID
            $('input[name="id"]').val(id);
            $('#assign_bottler_name').val(bottler_id).trigger('change');

            // Wait for modal to fully show before populating dropdown
            $('#assign_machine_botler_update').on('shown.bs.modal', function () {
                $.ajax({
                    url: '/admin/user/botler/get-edit-machine-options/' + id,
                    type: 'GET',
                    success: function (response) {
                        let options = `<option disabled value="">Select machine</option>`;
                        response.machine_options.forEach(function (machine) {
                            options += `<option value="${machine.id}" ${machine.id == response.assigned_machine_id ? 'selected' : ''}>
                                ${machine.machine_name} - ${machine.machine_number}
                            </option>`;
                        });

                        let select = $('#assign_machine_number');
                        select.html(options); // update options
                        select.val(response.assigned_machine_id).trigger('change'); // set selected & refresh select2
                    }
                });
            });

            // Open the modal
            $('#assign_machine_botler_update').modal('show');
        });

        // $('.openEditModal').on('click', function () {
        //     let id = $(this).data('id');
        //     let bottler_id = $(this).data('bottler_id');

        //     $('input[name="id"]').val(id);
        //     $('#assign_bottler_name').val(bottler_id).trigger('change');

        //     $.ajax({
        //         url: '/admin/user/botler/get-edit-machine-options/' + id,
        //         type: 'GET',
        //         success: function (response) {
        //             if (response.success) {
        //                 $('#assign_machine_number').html(response.options_html).trigger('change');
        //                 $('#assign_machine_botler_update').modal('show');
        //             }
        //         }
        //     });
        // });


        $("#editAssigneMachineToBotler").on("click", function(e) {
            e.preventDefault();
            let form = $("#editAssignMachineToBotlerForm")[0];
            let formData = new FormData(form);
            $.ajax({
                url: $("#editAssignMachineToBotlerForm").attr('action'),
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
        })
    // End Update Machine Number

    // Delete Machine Number
        $(".action-select").on("click", function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            $("#delete_assigne_machine_id").val(id);
        })
        $("#confirm_delete_assigne_machine").on("click", function(e) {
            let id = $("#delete_assigne_machine_id").val();
            $.ajax({
                url: '/admin/user/botler/delete/' + id,
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function (response) {
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
                            text: response.message || 'Failed to delete assigned machine',
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
        })
    // End Delete Machine Number

</script>
<!-- Assign Machin To Botler End Script -->
@endsection
