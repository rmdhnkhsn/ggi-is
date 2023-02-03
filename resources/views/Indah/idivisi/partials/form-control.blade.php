

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('ok'))
        <div class="alert alert-success alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
        </div>
    @endif

<div class="form-group">
  <label  class="col-form-label">Name</label>
  <select class="form-control select2bs4" style="width: 100%;" name="nik" id="nik"  required="required">
          <option selected></option>
          @foreach($user as $row)
            <option name="nik" value="{{ $row->nik }}"  >{{ $row->departemensubsub }} | {{ $row->nama }}</option>
          @endforeach
  </select>                                          
</div>

<div>
    <label for="roll">Description</label>
    <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" required="required"></textarea>
</div>

<div class="row">
  <div class="col-lg-3 mb-4 mr-auto ml-auto">	
    <div class="file-upload">
      <button class="file-upload-btn" type="button" id="foto" name="foto"  equired="required" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

      <div class="image-upload-wrap">
          <input class="file-upload-input" type='file' id="foto" name="foto"  value="" onchange="readURL(this);" accept="image/*"  equired="required"/>
          <div class="drag-text">
          <h5>Drag and drop or select add Image</h5>
          </div>
      </div>
      <div class="file-upload-content">
          <img class="file-upload-image" src="#" alt=" Image Format Only" />
          <div class="image-title-wrap">
          <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
          </div>
      </div>
    </div>
  </div>
</div>
    <input  type="hidden" class="form-control" id="tgl_tegur" name="tgl_tegur" value="{{ $date }}"></input>
    <input  type="hidden" class="form-control" id="nik_satgas" name="nik_satgas" value="{{ Auth::user()->nik }}"></input>
    <input  type="hidden" class="form-control" id="nama_satgas" name="nama_satgas" value="{{ Auth::user()->nama }}"></input>
    <input  type="hidden" class="form-control" id="status_indah" name="status_indah" value="1"></input>
    <input  type="hidden" class="form-control" id="id" name="id" value="{{$auto_number}}"></input>
    <br>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
   