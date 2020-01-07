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
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">Role Name</th>
                                        <th data-field="name" data-editable="true">IDK</th>
                                        <th data-field="description" data-editable="true">IDK</th>
                                        <th data-field="status">IDK</th>
                                        <th data-field="created_at" >IDK</th>
                                        <th data-field="updated_at" >IDK</th>
                                        <th data-field="operate" data-events="operateEvents">IDK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="delete" data-id=" $role->id " data-href=" route('roles.update',$role->id) "> Field </td>
                                        <td> Field </td>
                                        <td> Field </td>
                                        <td>
                                            <label class="switch">
                                                <input class="switch-input" type="checkbox" />
                                                <span class="switch-label" data-on="active" data-off="inactive"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </td>
                                        <td> Field </td>
                                        <td> Field </td>
                                    <td><button type="button" class="btn btn-danger btn-sm delete" title="Delete" data-href=" url " data-id=" id "><i class="glyphicon glyphicon-trash"></i></button></td>
                                    </tr>
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
                <h1 class="modal-title" id="exampleModalLabel">Role's Permissions</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addRolePermission" method="post" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role" class="col-form-label">Roles</label>
                        <select class="js-example-basic-single" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach   
                        </select>
                    </div>
                    <div class="form-group form-group-row">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="permissions Name" class="col-form-label">Permissions Name</label>
                                <input type="test" class="form-control input-xs" id="permissions Name" placeholder="Permission Name" name="permissionsPartfirst">
                            </div>
                            <div class="col-xs-6">
                                <label for="permissionsType[]" class="col-form-label">Permissions Type</label>
                                <select class="form-control js-example-basic-single" multiple="multiple" name="permissionsType[]">
                                    <option value='create'>Create</option>
                                    <option value='edit'>Edit</option>
                                    <option value='delete'>Delete</option>
                                    <option value='lock'>Lock</option>                                    
                                </select>
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
         $('.js-example-basic-single').select2({width: '100%'});
     });

    </script>
@endsection


