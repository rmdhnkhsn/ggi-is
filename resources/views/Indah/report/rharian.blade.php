@include('indah.layouts.header')
@include('indah.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('indah.Hdetail')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <label>Daily Report</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal"  value="{{$tanggal}}" required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <input type="hidden" name="branch"  value="{{$dataBranch->id}}" required/>
                    <button type="submit" class="btn btn-info btn-block" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Daily Report</button>
                </div>
                </form>
            </div> 
        </div> 
        <!-- end row -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daily Report |  <td> {{$tanggal}}</td></h3>
                <br>
                <h3 class="card-title">Branch |  <td> {{$dataBranch->nama_branch}}</td></h3>
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                  <th>Rank</th>
                                  <th>NIK</th>
                                  <th>Name</th>
                                  <th>Department</th>
                                  <th>✔</th>
                                  <th>❌</th>
                                  <th>Total</th>
                                  <th>⭐</th>
                              </tr>
                            </thread>
                            <tbody>
                              <?php $no=0;?>
                              @foreach($test1 as $like)
                              <?php $no++;?>
                              <tr>
                                <td>{{$no}}</td>
                                <td>{{ $like['nik'] }}</td>
                                <td>{{ $like['nama'] }}</td>
                                <td>{{ $like['bagian'] }}</td>
                                <td>{{ $like['like'] }}</td>
                                <td>{{ $like['dislike'] }}</td>
                                <td>{{ $like['total'] }}</td>
                                <td>{{ $like['bintang'] }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th>Rank</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th >❌</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=0;?>
                            @foreach($test2 as $like)
                            <?php $no++;?>
                            <tr>
                              <td>{{$no}}</td>
                              <td>{{ $like['nik'] }}</td>
                              <td>{{ $like['nama'] }}</td>
                              <td>{{ $like['bagian'] }}</td>
                              <td>{{ $like['dislike'] }}</td>
                            </tr>
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
  @include('indah.layouts.footer')
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 5,
             "responsive": true, "lengthChange": false, "autoWidth": false,
             "order": [[ 6, "desc" ]],
             searching : false,
             "paging": false,
              "bInfo" : false
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
    
} );


//datatable 2
$(document).ready(function() {
    $('#example2').DataTable(
        {
             "pageLength": 5,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 4, "desc" ]],
             searching : false,
             "paging": false,
            "bInfo" : false
        } 
    );
} );
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each( function () {
        var title = $('#example2 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example2').DataTable();
 
    // Apply the search
} );

$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD'
    });
    $('#reservationdate1').datetimepicker({
    format: 'Y-MM'
    });
    $('#reservationdate2').datetimepicker({
    format: 'Y'
    });
    $('#reservationdate4').datetimepicker({
    format: 'Y-MM-DD'
    });
</script>