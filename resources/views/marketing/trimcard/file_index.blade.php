@include('marketing.trimcard.layouts.header')
@include('marketing.trimcard.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-4">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <center> 
                <strong>{{ $message }}</strong>
                </center>
            </div>
            @endif
            <button class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus"></i> Add File</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-xl">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add File</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('trimcard.addfile')}}" method="post" enctype="multipart/form-data">
              @csrf
              @include('marketing.trimcard.partials.form-file', ['submit' => 'Submit'])
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Trim Card File [ WO - {{$data->no_wo}} ]</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th style="width:7%;">NO</th>
                            <th style="width:50%;">File</th>
                            <th style="width:15%;">Created_at</th>
                            <th style="width:15%;">Created_by</th>
                            <th style="width:15%;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;?>
                    @foreach($data->file as $key => $value)
                    <tr>
                      <td scope="row">{{ $no }}</td>
                      <td style="text-align:left;">{{$value->file}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->nama}}</td>
                      <td><a href="{{route('trimcard.download_file', $value->file)}}" class="btn btn-info btn-sm" title="See"><i class="fas fa-download"></i></a>
                        <a href="{{route('trimcard.delete_file', $value->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this file? the file will be deleted from the database');"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $no++ ;?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('marketing.trimcard.layouts.footer')
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 25,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 0, "asc" ]]
        } 
    );
} );
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>