@include('indah.layouts.header')
@include('indah.layouts.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xl-3 mt-4">
                <form action="{{ route('indah.harian')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <label>Daily Report</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" placeholder="Pilih Tanggal" required/>
            
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Daily Report</button>
                </div>
                </form>
            </div> 

            <div class="col-xl-3 mt-4">
                <form action="{{ route('indah.mingguan')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <label>Weekly Report</label>
                    <div class="input-group date" id="reservationdate4" data-target-input="nearest" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate4" name="tanggal" placeholder="Pilih Tanggal"  required/>
            
                        <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Weekly Report</button>
                </div>
                </form>
            </div>
        
            <div class="col-xl-3 mt-4">
                <form action="{{ route('indah.bulanan')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <label>Monthly Report</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="bulan" placeholder="Pilih bulan" required />
            
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Monthly Report</button>
                </div>
                </form>
            </div>

            <div class="col-xl-3 mt-4">
                <form action="{{ route('indah.tahunan')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <label>Yearly Report</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tahun" placeholder="Pilih tahun" required/>
            
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Yearly Report</button>
                </div>
                </form>
            </div>
        </div> 
        <!-- end row -->
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
    
    
   
  </div>
  @include('indah.layouts.footer')
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 5,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 3, "desc" ]]
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
//datatabel 2
$(document).ready(function() {
    $('#example2').DataTable(
        {
             "pageLength": 5,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 3, "desc" ]]
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