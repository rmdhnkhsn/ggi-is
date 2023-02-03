
<div class="form-group">
    <label for="roll">Kategori Error</label>
    <input type="text" class="form-control" id="kategori" name="kategori" required="required">
</div>



<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
@endif
