@extends('layouts.admin.master')

@section('title')
    Menus
    {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Menus</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item">Users Management</li>
                        <li class="breadcrumb-item active">Menus</li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    
                <!-- Bookmark Start-->
                @if($access['create'] == 1)
                    <div class="bookmark">
                        <ul>
                            <li>
                                <button class="btn btn-primary" type="button" id="btn_insert"><i class="fa fa-plus-square"></i> Menu</button>
                            </li>
                        </ul>
                    </div>
                @endif
                <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
	                        <table class="display datatables" id="dataTableMenus">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Name</th>
	                                    <th>Prefix</th>
	                                    <th>Url</th>
                                        <th>Icon</th>
                                        <th>Order Num</th>
                                        <th>Status</th>
                                        <th>Action</th>
	                                </tr>
	                            </thead>
	                        </table>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="form-menus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form" method="post">
                <input type="hidden" name="postType" id="postType">
                <input type="hidden" name="id" id="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select class="form-select" name="parent_id" id="parent_id">
                                <option value="0">Parent</option>
                                <?php foreach($menus as $menu):?>
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Prefix Url</label> <small>( optional )</small>
                            <input type="text" class="form-control" name="prefix" placeholder="Enter Prefix" id="prefix" required>
                        </div>
                        <div class="form-group">
                            <label for="">Url</label>
                            <input type="text" class="form-control" name="url" placeholder="Enter Url" id="url" required>
                        </div>
                        <div class="form-group">
                            <label for="">Icon</label>  <small>( optional )</small>
                            <input type="text" class="form-control" name="icon" placeholder="Enter icon" id="icon" required>
                        </div>
                        <div class="form-group">
                            <label for="">Order Num</label>
                            <input type="number" class="form-control" name="order_num" placeholder="Enter Order Num" id="order_num" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn_close">Close</button>
                        <button class="btn btn-secondary" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    @include('services.menus.menus')
    @endpush

@endsection