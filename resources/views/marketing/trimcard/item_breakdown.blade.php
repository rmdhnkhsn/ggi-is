@include('marketing.trimcard.layouts.header')
<style>
.cons {
    width: auto;
    height:150px;
    border: 1px solid black;
} 
</style>
@include('marketing.trimcard.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <form action="{{ route('trimcard.pdf', $atas->no_wo)}}" method="post" enctype="multipart/form-data" target="_blank">
            @csrf
            @foreach($banding as $key => $value)
            <input type="hidden" name="{{$value}}" id="{{$value}}" value="{{$value}}">
            @endforeach
            <button type="submit" class="btn btn-block btn-danger btn-sm"><i class="far fa-file-pdf"></i> Export PDF</button>
          </form>
        </div>
        <div class="col-md-2">
          <form action="{{ route('trimcard.excel', $atas->no_wo)}}" method="post" enctype="multipart/form-data" target="_blank">
            @csrf
            @foreach($banding as $key => $value)
            <input type="hidden" name="{{$value}}" id="{{$value}}" value="{{$value}}">
            @endforeach
            <button type="submit" class="btn btn-block btn-success btn-sm"><i class="far fa-file-excel"></i> Export Excel</button>
          </form>
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
            <!-- /.card-header -->
            <div class="card-body">
              <h3 style="font-weight:bold;text-align:center;">BULK TRIM CARD</h3><br>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4 col-4">
                        <label for="">AGENT</label><br>
                        <label for="">BUYER</label><br>
                        <label for="">DESTINATION</label><br>
                        <label for="">PROD DESCRIPTION</label><br>
                        <label for="">STYLE</label><br>
                        <label for="">ART</label>
                      </div>
                      <div class="col-lg-8 col-8">
                        <label for="">: {{$atas->agent}}</label><br>
                        <label for="">: {{$atas->buyer}}</label><br>
                        <label for="">: {{$atas->destination}}</label><br>
                        <label for="">: {{$atas->prod_desc}}</label><br>
                        <label for="">: {{$atas->style}}</label><br>
                        <label for="">: {{$atas->art}}</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4 col-4">
                        <label for="">COLORWAY</label><br>
                        <label for=""></label><br>
                        <label for=""></label><br>
                        <label for=""></label><br>
                        <label for=""></label><br>
                        <label for=""></label>
                      </div>
                      <div class="col-lg-8 col-8">
                        <label for="">: {{$atas->colorway1}}</label><br>
                        <label for="">: {{$atas->colorway2}}</label><br>
                        <label for="">: {{$atas->colorway3}}</label><br>
                        <label for="">: {{$atas->colorway4}}</label><br>
                        <label for="">: {{$atas->colorway5}}</label><br>
                        <label for="">: {{$atas->colorway6}}</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  @foreach($hasil as $key => $value)
                  <div class="col-lg-12" style="padding-top:25px;">
                    <label for="">{{$value['desc1']}}</label>
                    @if($value['desc2'] == " " || $value['desc2'] == null)
                    <br><label for="" style="color:white;">aaaa</label>
                    @else
                    <br><label for="">{{$value['desc2']}}</label>
                    @endif
                    <br><label for="">{{$value['srtx']}}</label>
                    <div class="cons"></div>
                  </div>
                  @endforeach
                </div>
              </div>
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
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 10,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [[ 0, "desc" ]]
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