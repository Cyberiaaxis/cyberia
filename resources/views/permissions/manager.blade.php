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
                                <button type="button" class="btn btn-sm btn-primary"  data-url="{{ route('roles.store') }}" data-toggle="modal" data-target="#insert"><i class="fa fa-plus"></i> Add Role's Permissions</button>
                                <!-- <button type="button" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button> -->
                            </div>
                            <table id="table" data-url="{{ route('permissions.index') }}" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name">Name</th>
                                        <th data-field="created_at" >Created</th>
                                        <th data-field="updated_at" >Modified</th>
                                        <th data-field="operate" data-events="operateEvents">Actions</th>
                                    </tr>
                                </thead>
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
                <h1 class="modal-title" id="exampleModalLabel">Role's Permissions</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addRolePermission" method="post" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role_id" class="col-form-label">Roles</label>
                        <select class="js-example-basic-single" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach   
                        </select>
                    </div>
                    <div class="form-group form-group-row">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="Permissions Name" class="col-form-label">Permissions Name</label>
                                <input type="text" class="form-control input-xs" id="Permissions Name" placeholder="Permission Name" name="name">
                            </div>
                            <div class="col-xs-6">
                                <label for="permissionsType" class="col-form-label">Permissions Type</label>
                                
                                <select class="form-control js-example-basic-single" multiple="multiple" name="permissions[]" aria-describedby="helpBlock">
                                    <option value='create'>Create</option>
                                    <option value='edit'>Edit</option>
                                    <option value='delete'>Delete</option>
                                    <option value='lock'>Lock</option>                                    
                                </select>
                                <span id="helpBlock" class="help-block">New permission addition is possible at selection permissions.</span>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary addRolePermission" >Save</button>
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
            var url = $('table').attr('data-url');
         $('.js-example-basic-single').select2({
             width: '100%',
             tags: true,
             ajax: {
                url: url,
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
         });
     });

    </script>
@endsection


<!-- https://examples.bootstrap-table.com/index.html#view-source -->