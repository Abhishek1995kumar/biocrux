@extends('layouts.admin')

@section('title','Add Role')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Add Role</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/role')}}" class="text-muted text-hover-primary">Roles</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Add Role</li>
</ul>
@endsection

@section('content')

<form action="{{url('/admin/role/add')}}" id="kt_modal_add_form" method="post">
    @csrf
    <div class="card card-flush mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-2">
                            <span class="required">Role name</span>
                        </label>
                        <input class="form-control textOnly" placeholder="Enter a role name" name="name" />
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-2">
                            <span class="required">Attendance</span>
                        </label>
                        <select name="attendanceFlag" class="form-select " data-control="select2" data-hide-search="true">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-2">
                            <span class="required">Allowed To Panel</span>
                        </label>
                        <select name="panelFlag" class="form-select " data-control="select2" data-hide-search="true">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-bold form-label mb-2">
                            <span class="required">Approval Authority</span>
                        </label>
                        <select name="approvalAuthorityFlag" class="form-select" data-control="select2" data-hide-search="true">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="card card-flush">
                <div class="card-header">
                    <div class="card-title">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" id="select-all">
                            <label class="form-check-label" for="userPermission">
                                Select All Permissions
                            </label>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-primary" id="kt_modal_add_submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($groupedPermissions as $key2=>$permission2)
        <div class="col-sm-3">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="text-center" style="text-transform: uppercase;">{{$key2}}</div>
                    <hr>
                    @foreach($permission2 as $tab)
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible collapsed" data-bs-toggle="collapse" href="#{{$tab->slug}}" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">{{$tab->displayName}}
                            <span class="ms-2 rotate-180">
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div id="{{$tab->slug}}" class="collapse">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="view-{{$tab->slug}}" name="permissions[]" />
                                        <label class="form-check-label">View</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="add-{{$tab->slug}}" name="permissions[]" />
                                        <label class="form-check-label">Add</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="update-{{$tab->slug}}" name="permissions[]" />
                                        <label class="form-check-label">Update</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="delete-{{$tab->slug}}" name="permissions[]" />
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>
</form>
@endsection

@section('scripts')

<script>
    $('.adminpermission').change(function(e) {
        e.preventDefault();
        console.log(documnent.getElementById('adminpermission').value);
    });
</script>

<script>
    var KTModalAdd = function() {
        var t, e, o, n, r, i;
        return {
            init: function() {
                r = document.querySelector("#kt_modal_add_form"),
                    t = r.querySelector("#kt_modal_add_submit"),
                    n = FormValidation.formValidation(r, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "Role name is required",
                                    },

                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    }), t.addEventListener("click", (function(e) {
                        e.preventDefault(), n && n.validate().then((function(e) {

                            console.log("validated!"), "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                                t.removeAttribute("data-kt-indicator")
                                e.isConfirmed && (t.disabled = !1)

                                // Submit form
                                r.submit();

                            }), 2e3)) : Swal.fire({
                                text: "Sorry, looks like there are some missing fields, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            })
                        }))
                    }))
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTModalAdd.init()
    }));
</script>

<script>
    $('#select-all').click(function(e) {
        var checkboxes = document.getElementsByName('permissions[]');
        if (this.checked) {
            alert('Caution! You are about to grant all permissions to this user.');
            for (var checkbox of checkboxes) {
                checkbox.checked = true;

            }
        } else {
            alert('Caution! You are about to remove all permissions from this user.');
            for (var checkbox of checkboxes) {
                checkbox.checked = false;
            }
        }
    });
</script>

@endsection