@extends('layouts.app') 
@section('sidebar') 
    @include('partials.sidebar') 
@endsection 
@section('moblie') 
    @include('partials.moblie') 
@endsection 

@section('content')

<style type="text/css">
.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 56px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
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
                                        <!-- <th data-field="id">Role Id</th> -->
                                        <th data-field="name" data-editable="true">Role Name</th>
                                        <th data-field="status">Role Status</th>
                                        <th data-field="date" data-editable="true">Last Modification</th>
                                        <!-- <th data-field="phone" data-editable="true">Last Modification</th>
                                        <th data-field="complete">Completed</th>
                                        <th data-field="task" data-editable="true">Task</th>
                                        <th data-field="price" data-editable="true">Price</th>
                                        <th data-field="action">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <!-- <td>1</td> -->
                                        <td>Administrator</td>
                                        <td>
                                            <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                                <label class="onoffswitch-label" for="myonoffswitch">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Jun 6, 2013</td>

                                        <!-- <td>hasad@uth.com</td>
                                        <td>+8801962067301</td>
                                        <td class="datatable-ct"><span class="pie">2,7</span>
                                        </td>
                                        <td>15%</td>
                                        <td>Jun 6, 2013</td>
                                        <td>$4565656</td>
                                        <td class="datatable-ct"><i class="fa fa-check"></i>
                                        </td> -->
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
            <form id="add-new" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Role Name:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="message-text" name="msg"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
    var $table = $('#table')
    var $button = $('#button')
    var $remove = $('#remove')
    

    $(function() {
        $button.click(function() {
            var randomId = 100 + ~~(Math.random() * 100)
            $table.bootstrapTable('insertRow', {
                index: 0,
                row: {
                    id: randomId,
                    name: 'Item ' + randomId,
                    price: '$' + randomId
                }
            })
        })
    })

    $(function() {
        $remove.click(function() {
            var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                return row.id
            })
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })
        })
    })
</script>
<!-- $insert.submit(function(e) {
e.preventDefault(); // avoid to execute the actual submit of the form.
var form = $(this);
var url = form.attr('action');
var randomId = 100 + ~~(Math.random() * 100)
$table.bootstrapTable('insertRow', {
    index: 0,
        row: {
        id: randomId,
        name: 'Item ' + randomId,
        price: '$' + randomId
        }
    })
   }); -->

@endsection