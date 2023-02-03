<input type="hidden" class="form-control" id="nik" name="nik" value="{{$user->nik}}">
<div class="form-group">
    <label for="branch">NIK</label>
    <input type="text" class="form-control" value="{{$user->nik}}" placeholder="Insert Kode Branch"  disabled>
</div>
<div class="form-group">
    <label for="branch">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" placeholder="Insert Kode Branch">
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control select2bs4" style="width: 100%;" name="role" id="role">
        <option></option>
    @foreach($role as $r)
        <option {{ $user->role == $r->kode_role ? 'selected' : ''}} value="{{  $r->kode_role }}">{{ $r->nama_role}}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label>Branch</label>
    <select class="form-control select2bs4" style="width: 100%;" name="branch" id="branch">
    @foreach($dataBranch as $r)
        <option {{ $user->branch == $r->kode_branch ? 'selected' : ''}} value="{{  $r->kode_branch }}">{{ $r->kode_branch}}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label>Branch Detail</label>
    <select class="form-control select2bs4" style="width: 100%;" name="branchdetail" id="branchdetail">
    @foreach($dataBranch as $r)
        <option {{ $user->branchdetail == $r->branchdetail ? 'selected' : ''}} value="{{  $r->branchdetail }}">{{ $r->branchdetail}}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label>Status</label>
    <select class="form-control" style="width: 100%;" name="isaktif" id="isaktif">
        <option {{ $user->isaktif == '1' ? 'selected' : ''}} value="1">Aktif</option>
        <option {{ $user->isaktif == '0' ? 'selected' : ''}} value="0">Tidak Aktif</option>
    </select>
</div>
<div class="form-group">
    <label>Command Center</label>
    <select class="form-control" style="width: 100%;" name="comcen" id="comcen">
        <option value=""></option>
        <option {{ $user->comcen == 'TRUE' ? 'selected' : ''}} value="TRUE">TRUE</option>
        <option {{ $user->comcen == 'FALSE' ? 'selected' : ''}} value="FALSE">FALSE</option>
    </select>
</div>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
