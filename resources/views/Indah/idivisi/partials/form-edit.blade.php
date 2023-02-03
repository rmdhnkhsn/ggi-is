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



