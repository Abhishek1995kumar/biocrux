@extends('layouts.admin')

@section('title', (Request::get('type') == 'worker' ? 'Worker' : 'User') . ' Permissions')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">{{$user->name}}'s Permission</h1>
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
    <li class="breadcrumb-item text-dark">{{$user->name}}'s Permission</li>
</ul>
@endsection

@section('content')
<form action="{{url('/admin/user/manage/assignPermission')}}" id="kt_modal_add_form" method="post">
    @csrf
    <input type="hidden" name="userId" value="{{Request::get('userId')}}">
    <input type="hidden" name="type" value="{{Request::get('type')}}">

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
                        <button type="submit" class="btn btn-primary" id="kt_modal_add_submit">Update Role</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($groupedPermissions as $key2=>$permission2)
        <div class="col-sm-3">
            <div class="card card-flush mb-6 mb-xl-9">
                <div class="card-body">
                    <div class="text-center" style="text-transform: uppercase;">{{$key2}}</div>
                    <hr>
                    @foreach($permission2 as $tab)
                    <?php
                    $checkView = in_array('view-' . $tab->slug, $userPermissions) ? 'checked' : '';
                    $checkAdd = in_array('add-' . $tab->slug, $userPermissions) ? 'checked' : '';
                    $checkUpdate = in_array('update-' . $tab->slug, $userPermissions) ? 'checked' : '';
                    $checkDelete = in_array('delete-' . $tab->slug, $userPermissions) ? 'checked' : '';

                    // check if any of the permission is checked

                    if ($checkView == 'checked' || $checkAdd == 'checked' || $checkUpdate == 'checked' || $checkDelete == 'checked') {
                        $checkStatus = 1;
                    } else {
                        $checkStatus = 0;
                    }

                    ?>
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible {{ $checkStatus ? '' : 'collapsed'}}" data-bs-toggle="collapse" href="#{{$tab->slug}}" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">{{$tab->displayName}}
                            <span class="ms-2 rotate-180">
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div id="{{$tab->slug}}" class="collapse {{ $checkStatus ? 'show' : ''}} ">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="view-{{$tab->slug}}" {{$checkView}} name="permissions[]" />
                                        <label class="form-check-label">View</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="add-{{$tab->slug}}" {{$checkAdd}} name="permissions[]" />
                                        <label class="form-check-label">Add</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="update-{{$tab->slug}}" {{$checkUpdate}} name="permissions[]" />
                                        <label class="form-check-label">Update</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fs-6 my-2 ">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="delete-{{$tab->slug}}" {{$checkDelete}} name="permissions[]" />
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