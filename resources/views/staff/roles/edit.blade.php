<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLabel">Editting Role <q>{{ $role->name }} </q></h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="msg alert hidden"></div>
        <form id="updateModel" method="post" action="{{ route('roles.update',$role->id) }}" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="modal-body">
                <div class="form-group has-feedback">
                    <label for="name" class="col-form-label">Role Name:</label>
                    <input type="text" class="form-control" value="{{ $role->name }}" name="name" required autofocus>
                    <span class="fa fa-cross form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Role Description:</label>
                    <textarea class="form-control" name="description" required autofocus>{{ $role->description }}</textarea>
                </div>
                <div class="form-group">
                <label for="name" class="col-form-label">Role Status:</label>
                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="status" value="1" required autofocus @if($role->status) checked @endif />
                        <span class="switch-label" data-on="active" data-off="inactive"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="permissions" class="col-form-label">Role's Permissions</label>
                    <select class="form-control permissions" multiple="multiple" name="permissions[]" ria-describedby="helpBlock" required autofocus>
                        @foreach ($permissions as $permission)
                            <?php $selected =  in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? "selected='selected'" : ''; ?>
                            <option value="{{ $permission->name }}" {{ $selected }}>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    <span id="helpBlock" class="col-xs-12 help-block">You can rearrange permissions to a role.</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        console.log(selectfetch(".permissions", "{{ route('permissions.index') }}"));
    });
</script>