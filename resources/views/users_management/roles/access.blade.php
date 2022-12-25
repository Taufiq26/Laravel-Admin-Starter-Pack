@extends('layouts.admin.master') 
@section('title') Roles Access
{{ $title }}
@endsection 

@push('css') 

@endpush 

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Roles Access</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">Users Management</li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item active">Roles Access</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('roles-access-post', $role_id) }}"
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="col">No</th>
                                        <th class="col">Menu</th>
                                        <th class="col">Url</th>
                                        <th class="col">Prefix</th>
                                        <th class="col">View</th>
                                        <th class="col">Create</th>
                                        <th class="col">Updated</th>
                                        <th class="col">Deleted</th>
                                        <th class="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyRoleAccess">
                                    
                                </tbody>
                            </table>

                            <div style="margin-top: 30px; float: right;">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="role_id" value="{{ $role_id }}" id="role_id">
    <input type="hidden" name="notif" value="{{ Session::get('success') }}" id="notif">

    @push('scripts')
        @include('services.roles.roles_access')
    @endpush

@endsection