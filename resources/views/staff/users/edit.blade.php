<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLabel">Editting User <q>{{ $user->name }} </q></h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="msg alert hidden"></div>
        <form id="updateModel" method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
            @csrf @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">User Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">User Email:</label>
                        <input type="email" class="form-control" name="email"  value="{{ $user->email }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-form-label">User Gender</label>
                        <select name="gender" class="form-control">
                            <option value="male" @if($user->gender === 'male') 'selected' @endif >Male</option>
                            <option value="Female" @if($user->gender === 'female') 'selected' @endif >Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-form-label">User Type</label>
                        <select name="type" class="form-control">
                            <option value="player" @if($user->type === 'player') selected @endif>Player</option>
                            <option value="npc" @if($user->type === 'npc') selected @endif >NPC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles" class="col-form-label">Roles</label>
                         <select class="form-control roles" multiple="multiple" name="roles[]" aria-describedby="helpBlock" required autofocus>
                            @foreach ($roles as $role)
                                <?php $selected =  in_array($role->name, $user->roles->pluck('name')->toArray()) ? "selected='selected'" : ''; ?> -->
                                <option value="{{ $role->name }}" {{ $selected }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <span id="helpBlock" class="help-block">You can edit user's roles.</span>
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
        console.log(selectfetch(".roles", "{{ route('roles.index') }}"));
    });
</script>