<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
<div class="card">
  <div class="card-body p-0">
    <table class="table table-sm">
      <tbody>
        <tr>
        <th > Department</th>
        <th>:</th>
          <td>{{$data->bagian}}</td>
        </tr>
        <tr>
          <th>NIK Head of Division</th>
          <th>:</th>
          <td>{{$data->nik_kabag }}</td>
        </tr>
        <tr>
          <th>Name Head of Division</th>
          <th>:</th>
          <td>{{$data->nama_kabag}}</td>
        </tr>
        <tr>
          <th>Findings Date</th>
          <th>:</th>
          <td>{{$data->tgl_tegur}} </td>
        </tr>
        <tr>
          <th>Description</th>
          <th>:</th>
          <td>{{$data->deskripsi }}</td>
        </tr>
        <tr>
          <th>Picture before</th>
          <th>:</th>
          <td>
              <div class="div3 col-sm-2">
                      <a href="{{ url('/indah/divisi/'.$data['foto']) }}" data-toggle="lightbox"  data-gallery="gallery">
                        <img src="{{ url('/indah/divisi/'.$data['foto']) }}" class="img-fluid mb-2" alt="white sample"/>
                      </a>
              </div>
          </td>
        </tr>
        <tr>
          <th>Satgas</th>
          <th>:</th>
          <td>{{$data->nama_satgas }}</td>
        </tr>
        @if($data->status_indah != "1")
        <tr>
          <th>Action Descriptions</th>
          <th>:</th>
          <td>{{$data->pesan_kabag }}</td>
        </tr>
        <tr>
          <th>Action Deadlines</th>
          <th>:</th>
          <td>{{$data->tgl_janji}} </td>
        </tr>
        <tr>
        @endif
        @if($data->foto_sesudah != null )
          <th> Picture After</th>
          <th>:</th>
          <td>
              <div class="div3 col-sm-2">
                      <a href="{{ url('/indah/divisi/'.$data['foto_sesudah']) }}" data-toggle="lightbox"  data-gallery="gallery">
                        <img src="{{ url('/indah/divisi/'.$data['foto_sesudah']) }}" class="img-fluid mb-2" alt="white sample"/>
                      </a>
              </div>
        </td>
        @endif
        @if($data->tgl_approval != null)
        <tr>
          <th>Approval Date</th>
          <th>:</th>
          <td>{{$data->tgl_approval}} </td>
        </tr>
        <tr>
        @endif
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@if(($data->status_indah == "1") && (Auth::user()->nik == $data->nik_kabag))
<div class="form-group">
    <label >Action Deadlines</label>
    <input type="date" class="form-control" id="tgl_janji" name="tgl_janji" required="required">
</div>
<div class="form-group">
    <label >Action Descriptions</label>
    <textarea class="form-control" rows="3" id="pesan_kabag" name="pesan_kabag" required="required"></textarea>
</div>
<input type="hidden" class="form-control" id="status_indah" name="status_indah" value="2">
<input type="hidden" class="form-control" id="hidden_foto" name="hidden_foto" value="{{$data->foto_sesudah}}">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
@endif

@if(($data->status_indah == "2") && (Auth::user()->nik == $data->nik_kabag))
<!-- <div class="form-group">
    <label >Upload Photos After Action</label>
    <input type="file" class="form-control" id="foto_sesudah" name="foto_sesudah"  required="required">
</div> -->

<div class="row">
  <div class="col-lg-3 mb-4 mr-auto ml-auto">	
    <div class="file-upload">
      <button class="file-upload-btn" type="button" id="foto_sesudah" name="foto_sesudah" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

      <div class="image-upload-wrap">
          <input class="file-upload-input" type='file' id="foto_sesudah" name="foto_sesudah" value="" onchange="readURL(this);" accept="image/*" />
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

<input type="hidden" class="form-control" id="status_indah" name="status_indah" value="3">
<input type="hidden" class="form-control" id="pesan_kabag" name="pesan_kabag" value="{{$data->pesan_kabag}}">
<input type="hidden" class="form-control" id="tgl_janji" name="tgl_janji" value="{{$data->tgl_janji}}">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
@endif


<!-- Foto -->
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
    }

    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
<!-- End Foto -->
