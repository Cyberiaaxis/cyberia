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

                            <h1>Role <span class="table-project-n">Management <q>{{ $role->name }}</q></span></h1>

                        </div>

                    </div>

                    <div class="sparkline13-graph">

                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <div id="toolbar">

                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#insert"><i class="fa fa-plus"></i> Insert</button>

                                <button type="button" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>

                            </div>

                            <table id="table" data-url="{{ route('operations',$role->id) }}" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">

                                <thead>

                                    <tr>

                                        <th data-field="state" data-checkbox="true"></th>

                                        <th data-field="id">Permission Id</th>

                                        <th data-field="name" data-editable="true">Permission Name</th>

                                        <th data-field="operate" data-formatter="operateFormatter">Action</th>

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

                <h1 class="modal-title" id="exampleModalLabel">Add Role</h1>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="addRole" method="post" action="{{ route('operations.store',$role->id) }}" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">

                        <label for="role" class="col-form-label">Roles</label>

                        <input type="text" value="{{ $role->name }}" class="form-control" readonly>

                    </div>

                    <div class="form-group form-group-row">

                                <label for="permissions" class="col-form-label">Permissions</label>

                                <select class="form-control permissions" multiple="multiple" name="permissions[]">

                                </select>
                      
                            <span id="helpBlock" class="col-xs-12 help-block">New permission addition is possible at selection permissions.</span>

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
    function operateFormatter(value, row, index) {
        var delete_url = "{{ route('operations',$role->id) }}";
        return [
            '<a class="delete" href="javascript:void(0)" data-name="'+row.name+'" data-href="'+delete_url+'" data-id="'+row.id+'" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('')

     }
     $(document).ready(function(){
        var url = '{{ route('permissions.index') }}';
        $('.permissions').select2({
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
                                id: item.name
                            }
                        })
                    };

                }

            }

        });

     });

    </script>

@endsection
