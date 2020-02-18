dd('categories.index')
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
                            <h1>Item <span class="table-project-n"> Management</span></h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#insert"><i class="fa fa-plus"></i> Insert</button>
                                <button type="button" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                            </div>
                            <table id="table" data-url="{{ route('items.index') }}" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">Item Id</th>
                                        <th data-field="itemCategory">Category Name</th>
                                        <th data-field="itemType">Item Type</th>
                                        <th data-field="name" data-editable="true">Item Name</th>
                                        <th data-field='description'data-editable='true'>description</th>, 
                                        <th data-field="buyPrice" data-editable="true" data-editable-inputClass='mask'>Buy Price</th>
                                        <th data-field="sellPrice" data-editable="true" data-editable-inputClass='mask'>Sell Price</th>
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
                <h1 class="modal-title" id="exampleModalLabel">Add Item</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addModel" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="itemcategory" class="col-form-label">Item Category</label>
                        <select class="form-control js-example-basic-single" name="itemcategory" aria-describedby="helpBlock">
                        <option>Select Item Category</option>
                        </select>
                        <span id="helpBlock" class="help-block">Select Item Category.</span>
                    </div>    
                    <div class="form-group">
                        <label for="itemtype" class="col-form-label">Item Type</label>
                        <select class="form-control itemtype" name="itemtype" aria-describedby="helpBlock">
                        <option>Select Item Type</option>
                        </select>
                        <span id="helpBlock" class="help-block">Item types as per item category.</span>
                    </div>    
                    <div class="form-group">
                        <label for="name" class="col-form-label">Category Name:</label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="buyprice" class="col-form-label">Buy Price</label>
                        <input name="buyPrice" id="buyprice" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
                    </div>
                    <div class="form-group">
                        <label for="sellprice" class="col-form-label">Sell Price</label>
                        <input name="sellPrice" id="sellprice" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
                    </div>                    
                    <div class="form-group">
                        <label for="description" class="col-form-label">Category Description:</label>
                        <textarea class="form-control" name="description" required autofocus></textarea>
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
    <script src="{{ asset('js/input-mask/input-mask.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() { 
             $('#buyprice, #sellprice').inputmask();  
          console.log(selectfetch(".js-example-basic-single", '{{ route('itemCategories.index') }}', false,  true));
             $('.js-example-basic-single').on('select2:select', function (e) {
                //  $(".itemtypes").removeClass('hidden');
                 const data = e.params.data;
                //  $(".itemtypes").empty().trigger("change");
                 console.log(selectfetch(".itemtype", '{{ route('itemCategories.index') }}/'+data.id, false,  true));
                });
        });

          $(document).on('focus','.mask',function(){
                 $(this).inputmask({
                     'alias': 'currency',
                     'groupSeparator': ',',
                     'autoGroup': true,
                     'digits': 2,
                     'digitsOptional': false,
                     'placeholder': '0'
                 });
           });
    </script>
@endsection