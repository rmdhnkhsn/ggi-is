<input type="hidden" class="form-control" id="nik" name="nik" value="{{$user->nik}}">
<div class="form-group">
    <label>Role</label>
    <select class="select3" multiple="multiple" data-placeholder="Select Role" style="width: 100%;" name="buyer" id="buyer">
    @foreach($role as $r)
        <option {{ $user->role == $r->kode_role ? 'selected' : ''}} value="{{  $r->kode_role }}">{{ $r->nama_role}}</option>
    @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
