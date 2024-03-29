@extends('layouts.app')
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('moblie')
    @include('partials.moblie')
@endsection

@section('content')
<!-- Dynamic Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Role <span class="table-project-n">Management</span></h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#insert"><i class="fa fa-plus"></i> Insert</button>
                                <button type="button" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                            </div>
                            <table id="table" data-url="{{ route('roles.index') }}" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">Role Id</th>
                                        <th data-field="name">Role Name</th>
                                        <th data-field="description">Role Description</th>
                                        <th data-field="permissions">Permissions</th>
                                        <th data-field="status">Role Status</th>
                                        <th data-field="created_at">Created</th>
                                        <th data-field="updated_at">Last Modified</th>
                                        <th data-field="operate">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dynamic Table End -->
<!-- Modal Start -->
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insert" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Add Role</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addModel" method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Role Name:</label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Role Description:</label>
                        <textarea class="form-control" name="description" required autofocus></textarea>
                    </div>
                    <div class="form-group">
                        <label for="permissions" class="col-form-label">Role's Permissions</label>
                         <select class="form-control permissions" multiple="multiple" name="permissions[]" aria-describedby="helpBlock" required autofocus>
                        </select>
                        <span id="helpBlock" class="help-block">You can assign permissions to a role.</span>
                    </div>   
                    <div class="form-group">
                        <label for="status" class="col-form-label">Role Status</label>
                        <select name="status" class="form-control">
                            <option value="0"selected>Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End -->
<!-- Modal Edit Start -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="update" aria-hidden="true">
</div>
<!-- Modal Edit End -->

<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2020 <a href="#">Cyberia</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
    @include('partials.footer')
    <script>
        $(document).ready(function() {
            console.log(selectfetch(".permissions", "{{ route('permissions.index') }}" ));
        });
    </script>
@endsection