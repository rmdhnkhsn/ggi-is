@include('Indah.layouts.header')
@include('Indah.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Task Force Findings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>Department</th>
                            <th>Head of Division</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Findings Date</th>
                            <th>Satgas</th>
                            <th>Action Deadlines</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                @foreach ($data as $key => $value)
                <?php $no++;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $value['bagian'] }}</td>
                        <td>{{ $value['nama_kabag'] }}</td>
                        <td> 
                          <div class="div3 col-lg-2">
                            <a href="{{ url('/indah/divisi/'.$value['foto']) }}" data-toggle="lightbox"  data-gallery="gallery">
                              <img src="{{ url('/indah/divisi/'.$value['foto']) }}" width="60px" style="margin-left:35px" alt="white sample"/>
                            </a>
                          </div>
                        </td>
                        <td>{{ $value['deskripsi'] }}</td>
                        <td>{{ $value['tgl_tegur'] }}</td>
                        <td>{{ $value['nama_satgas'] }}</td>
                        <td>{{ $value['tgl_janji'] }}</td>
                        @if($value['status_indah'] == '2')
                        <td>
                          <a href="{{route('divisi.edit', $value['id'])}}" class="btn btn-warning btn-sm" >
                            <i class=""></i>Show</a>
                          </a>
                        </td>
                        @endif
                        @if($value['status_indah'] == '3')
                        <td>
                          <a href="{{route('divisi.edit', $value['id'])}}" class="btn btn-success btn-sm" >
                            <i class=""></i>Detail</a>
                          </a>
                        </td>
                        @endif

                        
                    </tr>
                          
                @endforeach  
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Department</th>
                            <th>Head of Division</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Findings Date</th>
                            <th>Satgas</th>
                            <th>Action Deadlines</th>
                            <th>Action</th>
                        </tr>
                  </tfoot>
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
  <input type="hidden" id="mytext" type="text" value="{{ Auth::user()->nama }}" />
  @include('Indah.layouts.footer')
<script>
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 25,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "oSearch": {"sSearch": $('#mytext').val() }
            
        } 
    );
} );
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
   
} );
</script>