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
                            <h1>User <span class="table-project-n">Management</span></h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#insert"><i class="fa fa-plus"></i> Insert</button>
                                <button type="button" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                            </div>
                            <table id="table" data-url="{{ route('users.index') }}" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">User Id</th>
                                        <th data-field="name" data-editable="true">User Name</th>
                                        <th data-field="email" data-editable="true">User Email</th>
                                        <th data-field="roles">Roles</th>
                                        <!-- <th data-field="status">User Status</th> -->
                                        <th data-field="created_at" >Created</th>
                                        <!-- <th data-field="updated_at" >Last Modified</th> -->
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
                <h1 class="modal-title" id="exampleModalLabel">Add User</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addRole" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">User Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">User Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                        <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="roles" class="col-form-label">Roles</label>
                         <select class="form-control roles" multiple="multiple" name="roles[]" aria-describedby="helpBlock">
                        </select>
                        <span id="helpBlock" class="help-block">You can assign roles a user.</span>
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
          console.log(selectfetch(".roles", "{{ route('roles.index') }}" ));
        });
    </script>
@endsection