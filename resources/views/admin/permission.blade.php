@extends('layouts.admin')

@section('title','Permissions')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Permissions</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Permissions</li>
</ul>
@endsection

@section('content')

<div class="card card-flush">
    <div class="card-header mt-6">
        <div class="card-title">

        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                Add Permission
            </button>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-125px">Panel</th>
                    <th class="text-center min-w-125px">Display</th>
                    <th class="text-center min-w-125px">Tab</th>
                    <th class="text-center min-w-125px">Slug</th>
                    <th class="text-center min-w-125px">Created Date</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach ($permissions as $data)
                <tr>
                    <td class="text-center">{{$data->panel}}</td>
                    <td class="text-center">{{$data->displayName}}</td>
                    <td class="text-center">{{$data->tab}}</td>
                    <td class="text-center">{{$data->slug}}</td>
                    <td class="text-center">{{date('d M, Y', strtotime($data->created_at))}}, {{date('h:i a', strtotime($data->created_at))}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Add a Permission</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <form class="form" action="{{url('/admin/permission/add')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class=" required fs-6 fw-semibold form-label mb-2"> Panel Name </label>
                            <select class="form-select" data-control="select2" data-hide-search="true" required data-placeholder="Select a panel" name="panel">
                                <option value=""></option>
                                <option value="admin">Admin</option>
                                <option value="user">User Management</option>
                                <option value="master">Master</option>
                                <option value="stock">Stock</option>
                                <option value="trx">Transaction</option>
                                <option value="report">Report</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="required fs-6 fw-semibold form-label mb-2"> Display Name </label>
                            <input class="form-control" placeholder="Enter the Display Name" required name="display" />
                        </div>
                        <div class="col-12">
                            <label class="required fs-6 fw-semibold form-label mb-2"> Tab Url Prefix
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique."></i>
                            </label>
                            <input class="form-control" placeholder="Enter the Tab name" required name="name" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection