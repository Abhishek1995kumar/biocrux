@extends('layouts.admin')

@section('title')
Roles
@endsection

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Roles</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Roles</li>
</ul>
@endsection
@section('content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="col-sm-12">
    <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
        {{ Session::get('alert-' . $msg) }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
@if($roles->count() == 0)
<div class="card">
    <div class="card-body p-0">
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/5.png" />
        </div>
        <div class="card-px text-center py-20 my-10">
            <h2 class="fs-2x fw-bold mb-10">No Role Found</h2>
            <p class="text-gray-400 fs-4 fw-semibold mb-10">Looks like you do not have any role here.
                <br />If you want to add a role, click on the button below.
            </p>
            </p>
            
            <a href="{{url('/admin/role/showAdd')}}" class="btn btn-primary">
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>Create Role
            </a>
        </div>

    </div>
</div>
@else

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @foreach($roles as $data)
    @if(Auth::user()->role == 'gopl')
    @if($data->slug == 'hyplap')
    <div class="col-md-4">
        <div class="card card-flush h-md-100">
            <div class="card-header">
                <div class="card-title flex-column">
                    <h2>{{$data->name}}</h2>
                    <div class="fs-6 fw-semibold text-muted">Total users with this role: {{$data->user->count()}}

                    </div>
                </div>
            </div>
            <div class="card-body pt-1">
                <div class="fs-6 fw-semibold text-muted">Users Assigned:</div>
                <div style="max-height: 100px; overflow-y: auto;">
                    @foreach($data->user as $user)
                    @if($user->role == $data->slug)
                    <div class="d-flex flex-column text-gray-600">
                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>{{$user->name}}
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="card-footer flex-wrap pt-0">
                <a href="{{url('/admin/role/view')}}/{{$data->slug}}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                <a href="{{url('/admin/role/viewUpdate')}}/{{$data->slug}}" class="btn btn-light btn-active-light-primary my-1">Update Role</a>
            </div>
        </div>
    </div>
    @endif
    @endif
    @if($data->slug != 'hyplap')
    <div class="col-md-4">
        <div class="card card-flush h-md-100">
            <div class="card-header">
                <div class="card-title flex-column">
                    <h2>{{$data->name}}</h2>
                    <div class="fs-6 fw-semibold text-muted">Total users with this role: {{$data->user->count()}}
                    </div>
                </div>
            </div>
            <div class="card-body pt-1">
                <div class="fs-6 fw-semibold text-muted">Users Assigned:</div>
                <div style="max-height: 100px; overflow-y: auto;">
                    @foreach($data->user as $user)
                    @if($user->role == $data->slug)
                    <div class="d-flex flex-column text-gray-600">
                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>{{$user->name}}
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="card-footer flex-wrap pt-0">
                <a href="{{url('/admin/role/view')}}/{{$data->slug}}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                <a href="{{url('/admin/role/viewUpdate')}}/{{$data->slug}}" class="btn btn-light btn-active-light-primary my-1">Update Role</a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="col-md-4">
        <div class="card h-md-100">
            <div class="card-body d-flex flex-center">
                <a href="{{url('/admin/role/showAdd')}}" class="btn btn-clear d-flex flex-column flex-center">
                    <img src="{{asset('assets/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                    <div class="btn btn-primary btn-active-light-primary my-1">Add New Role</div>
                </a>
            </div>
        </div>
    </div>
</div>

@endif
@endsection

@section('scripts')

@endsection
