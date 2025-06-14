@extends('layouts.admin')

@section('title','Botler List')

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
    <div class="card-body">
        <div class="tab-content">
            <!-- Botler Management Start -->
            <div class="tab-pane active" id="tab_1">
                <div class="card-toolbar">
                    <div class="card-title d-flex ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubBotlerUser" class="btn btn-primary" >
                            Add Sub Botler User
                        </button>
                        <div class="d-flex align-items-center position-relative">
                            <a href="" class="btn btn-light p-3"><i class="fa fa-fw fa-refresh"></i>Refresh</a>
                        </div>
                    </div>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table">
                        <thead>
                            <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Sub Botler Name</th>
                                @foreach($botlerUserHeader as $header)
                                    <th class="min-w-125px">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Botler Management End -->

        </div>
    </div>
</div>


<!-- Botler User Management Start -->
    <!-- Create Botler Start -->
        <div class="modal fade modal-lg" id="addSubBotlerUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="addBotlerTitle" aria-hidden="true">
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
                        <form id="createSubUserForm" action="{{ route('admin.user.sub-botler.user-create') }}" method="POST" enctype="multipart/form-data">
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
                                                            <option></option>
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
                                                            <option value="{{ $users[0]->botler_id }}">{{ $users[0]->bottler_name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="sub_bottler_user_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler </label>
                                                        <select type="text" name="sub_bottler_id" id="sub_bottler_user" class="form-select"  data-control="select2" data-hide-search="true" data-placeholder="Select sub botler name">
                                                            <option value="{{ $users[0]->sub_botler_id }}">{{ $users[0]->sub_bottler_name }}</option>
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
                        <form id="userBotlerEditForm" action="" method="POST" enctype="multipart/form-data">
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
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 " id="sub_bottler_user_edit_div">
                                                    <div class="form-group">
                                                        <label class="required fs-6 fw-semibold mb-2">Sub Bottler </label>
                                                        <select type="text" name="sub_bottler" id="sub_bottler_user_edit" class="form-select" placeholder="Select Status">
                                                            <option value="">Select Sub Bottler</option>
                                                            
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

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kt_table').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "language": {
                "search": "",
                "zeroRecords": "No records found",
                "info": "",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
            },
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-secondary',
                }
            ],
            dom: '<"d-flex justify-content-between align-items-center"<"d-flex"f><"ml-auto"B>>rt<"d-flex justify-content-between align-items-center mt-3"p>',
        });

        $('#kt_table_filter input').attr('placeholder', 'Search...').addClass('form-control p-4 w-100').wrap('<div class="input-group"></div>');
        $('#kt_table_filter label').contents().filter(function() {
            return this.nodeType === 3;
        }).remove();
    });
</script>


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

    // User Create
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
            let passwordPattern = /^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{5,}$/;

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
                    error: function (xhr) {
                        let errMsg = 'Something went wrong!';
                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.error) {
                                // Custom error from backend
                                errMsg = xhr.responseJSON.error;
                            } else if (xhr.responseJSON.errors) {
                                // Laravel validation errors
                                errMsg = Object.values(xhr.responseJSON.errors).flat().join('\n');
                            } else if (xhr.responseJSON.message) {
                                errMsg = xhr.responseJSON.message;
                            }
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
    // End Sub Botler User
</script>
@endsection
