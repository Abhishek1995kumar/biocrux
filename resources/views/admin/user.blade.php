@extends('layouts.admin')

@section('title')
Office Users
@endsection

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Office User</h1>

@endsection

@section('content')

<!--Excel Modal-->
<div class="modal fade" id="importModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import User Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/user/addUserExcel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">Select Excel File <span style="color: red;">&#42</span></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="file" class="form-control" name="excel" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">
                                    Download Format
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{url('storage/ExcelFiles/User/UserExcelFormat.xlsx')}}" id="download" download class="btn btn-success">
                                    <lord-icon src="https://cdn.lordicon.com/xhdhjyqy.json" trigger="hover" colors="primary:#FFFFFF" target="#download" style="width:25px;height:25px">
                                    </lord-icon>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer m-0 p-0 pt-3">
                        <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                        <button type="submit" id="addExcel" class="btn btn-primary font-weight-bold">
                            <lord-icon src="https://cdn.lordicon.com/mecwbjnp.json" trigger="hover" target="#addExcel" colors="primary:#FFFFFF,secondary:#FFFFFF" style="width:25px;height:25px">
                            </lord-icon>
                            Add Excel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

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

<!-- user table -->
@if($users->count() == 0)
<div class="card">
    <div class="card-body p-0">
        <div class="card-px text-center py-20 my-10">
            <h2 class="fs-2x fw-bold mb-10">No Users Found</h2>
            <p class="text-gray-400 fs-4 fw-semibold mb-10">Looks like you do not have any users here.
                <br />If you want to add a User, click on the button below.
            </p>
            </p>
            <a href="{{url('/admin/user/add?tab=general')}}" class="btn btn-primary">Add User</a>
        </div>
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/5.png" />
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15" placeholder="Search Office Users" />
            </div>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <a href="{{url('/admin/user/add?tab=general')}}" class="btn btn-primary">Add User</a>
            </div>
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                <div class="fw-bold me-5">
                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
            </div>
        </div>
    </div>
    <div class="card-body pt-0" id="tableDiv">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-25px">#</th>
                    <th class="text-center min-w-25px">Profile Image</th>
                    <th class="text-center min-w-125px">Name</th>
                    <th class="text-center min-w-125px">Email</th>
                    <th class="text-center min-w-125px">Phone</th>
                    <th class="text-center min-w-125px">Role</th>
                    <th class="text-center min-w-125px">Status</th>
                    <th class="text-center min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach ($users as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">
                        <div class="symbol symbol-50px">
                            <img src="{{$data->profileImage}}" onerror="this.src='assets/media/blank.png'" />
                        </div>
                    </td>
                    <td class="text-center">{{ $data->name }}</td> 
                    <td class="text-center">{{ $data->email }}</td>
                    <td class="text-center">{{ $data->phone }}</td>
                    <td class="text-center">{{ $data->rolee->name }} <br>
                        <a href="{{url('/admin/user/manage/permissions?userId=' . Crypt::encrypt($data->id) )}}" class="badge badge-light-primary">View Permissions</a>
                    </td>
                    <td class="text-center">
                        @if($data->status == 1)
                        <div class="badge badge-light-success">Active</div>
                        @else
                        <div class="badge badge-light-danger">Inactive</div>
                        @endif
                    </td>
                    <td class="">
                        <a class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="{{url('/admin/user/update?userId='.Crypt::encrypt($data->id).'&tab=general')}}" class="menu-link px-3">Update Details</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 text-danger" onclick="openDeleteModal('{{$data->id}}')" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif

<!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form" action="{{url('/admin/user/delete')}}" method="POST" id="kt_modal_add_form" data-kt-redirect="">
                @csrf
                <input type="hidden" name="hiddenId" id="deleteHiddenId">
                <input type="hidden" name="type" value="temporary">
                <input type="hidden" name="table" value="users">

                <div class="modal-header" id="kt_modal_add_header">
                    <h2 class="fw-bold">Confirmation</h2>
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
                    <div class="row">
                        <div class="col-12 fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Are you sure you want to delete? Action cannot be reverted.</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openDeleteModal(id) {
        $('#deleteHiddenId').val(id);
    }
</script>

<script>
    var KTAppEcommerceCategories = function() {
        var n = () => {

        };
        return {
            init: function() {
                (t = document.querySelector("#kt_customers_table")) && ((e = $(t).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,

                })).on("draw", (function() {
                    n()
                })), document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener("keyup", (function(t) {
                    e.search(t.target.value).draw()
                })), n())
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTAppEcommerceCategories.init()
    }));
</script>
@endsection
