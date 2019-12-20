@extends('layouts.app')
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('moblie')
    @include('partials.moblie')
@endsection

@section('content')

<style type="text/css">
.switch {
    position: relative;
    display: block;
    vertical-align: top;
    width: 100px;
    height: 30px;
    padding: 3px;
    margin: 0 10px 10px 0;
    background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
    background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
    border-radius: 18px;
    box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
    cursor: pointer;
    box-sizing:content-box;
}
.switch-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    box-sizing:content-box;
}
.switch-label {
    position: relative;
    display: block;
    height: inherit;
    font-size: 10px;
    text-transform: uppercase;
    background: #eceeef;
    border-radius: inherit;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
    box-sizing:content-box;
}
.switch-label:before, .switch-label:after {
    position: absolute;
    top: 50%;
    margin-top: -.5em;
    line-height: 1;
    -webkit-transition: inherit;
    -moz-transition: inherit;
    -o-transition: inherit;
    transition: inherit;
    box-sizing:content-box;
}
.switch-label:before {
    content: attr(data-off);
    right: 11px;
    color: #aaaaaa;
    text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
    content: attr(data-on);
    left: 11px;
    color: #FFFFFF;
    text-shadow: 0 1px rgba(0, 0, 0, 0.2);
    opacity: 0;
}
.switch-input:checked ~ .switch-label {
    background: purple;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
    opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
    opacity: 1;
}
.switch-handle {
    position: absolute;
    top: 4px;
    left: 4px;
    width: 28px;
    height: 28px;
    background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
    background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
    border-radius: 100%;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-handle:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -6px 0 0 -6px;
    width: 12px;
    height: 12px;
    background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
    background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
    border-radius: 6px;
    box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
}
.switch-input:checked ~ .switch-handle {
    left: 74px;
    box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

/* Transition
========================== */
.switch-label, .switch-handle {
    transition: All 0.3s ease;
    -webkit-transition: All 0.3s ease;
    -moz-transition: All 0.3s ease;
    -o-transition: All 0.3s ease;
}
</style>

<!-- Static Table Start -->
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
                                        <th data-field="id">Role Id</th>
                                        <th data-field="name" data-editable="true">Role Name</th>
                                        <th data-field="description" data-editable="true">Role Description</th>
                                        <th data-field="status">Role Status</th>
                                        <th data-field="created_at" >Created</th>
                                        <th data-field="updated_at" >Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)
                                    <tr>
                                        <td></td>
                                        <td data-href="{{ route('roles.update',$role->id) }}">{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            <label class="switch">
                                                <input class="switch-input" type="checkbox" @if($role->status) checked @endif />
                                                <span class="switch-label" data-on="active" data-off="inactive"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </td>
                                        <td>{{ $role->updated_at->format('F d, Y h:i a') }}</td>
                                        <td>{{ $role->created_at->format('F d, Y h:i a') }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insert" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Add Role</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form id="addRole" method="post" enctype="multipart/form-data"> -->
                <div class="modal-body">
                    <input type="text" id="_method" value="put" hidden>
                    <div class="form-group">
                        <label for="roleName" class="col-form-label">Role Name:</label>
                        <input type="text" class="form-control" id="roleName">
                    </div>
                    <div class="form-group">
                        <label for="roleDescription" class="col-form-label">Role Description:</label>
                        <textarea class="form-control"  id="roleDescription"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="roleStatus" class="col-form-label">Role Status</label>
                    <select id="roleStatus" class="form-control">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary addRole" >Save</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- Static Table End -->
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
$(function() {

const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

function processRequest(data) {
    let method = (data.method) ? data.method : 'get';
    let url = (data.url) ? data.url : '/staff/roles';
    fetch(url,{
        method: method,
        body: JSON.stringify(data),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            "X-CSRF-Token": csrfToken
        }
    })
    .then(response => {
        return response.text();
    })
    .then(text => {
        return console.log(text);
    })
    .catch(error => console.error(error));
}


let $table = $('table').bootstrapTable();


$table.on('editable-save.bs.table', function(e,field, row, oldValue, $el){

    processRequest({action: 'update',method: 'put',url : row._id_data.href,'name': row.name,'desc':row.description,'status' : row.status});
});
$('.addRole').on('click', function(event){
    console.log($('#_method').val());
    processRequest({action: 'update',method: 'post',name: $('#roleName').val(), desc: $('#roleDescription').val(), status: $('#roleStatus').val()});
});




});
</script>
@endsection