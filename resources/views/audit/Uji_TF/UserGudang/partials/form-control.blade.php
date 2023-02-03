
<div class="form-group">
    <label  class="col-form-label">Nama User</label>
        <select class="form-control select2bs4" style="width: 100%;" name="nik" id="nik">
            <option selected></option>
            @foreach($user as $row)
            <option name="nik" value="{{ $row->nik }}"  >{{ $row->nik }} | {{ $row->nama }}</option>
            @endforeach
        </select>                                          
</div>
<div class="form-group">
    <label for="roll">Username JDE</label>
    <input type="text" class="form-control" id="username_jde" name="username_jde" required="required">
</div>



<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
@endif
