@include('marketing.rekaporder.layouts.header')
<style>
  .fabric{
    width:10em;
    text-align:center;
  }
  .color{
    width:6em;
  }
  .size{
    width:3em;
  }
</style>
@include('marketing.rekaporder.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <a href="{{route('rekap.final', $detail->master_order_id)}}" class="btn btn-block btn-info btn-sm col-lg-2" title="Report Detail"><i class="fas fa-home"></i> Report Detail</a>
        <br>
        <div class="card">
            @include('marketing.rekaporder.breakdown.partials.form-detail')
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Buat Modal  -->
    @include('marketing.rekaporder.breakdown.partials.form-modal')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body" style="overflow:auto;">
                <div class="row">
                  <div class="col-lg-2">
                    @if($detail->detail_exist != 0)
                      <button class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-addNew"><i class="fas fa-plus"></i> Add New</button>
                    @endif
                  </div>
                </div>
                <br>
                @if($detail->detail_exist == 0)
                <input type="button" id="more_fields" onclick="add_fields();" value="+ Add More" class="btn btn-block btn-info btn-sm col-lg-1" />
                <br>
                <form action="{{ route('breakdown.store', $detail->id)}}" method="post" enctype="multipart/form-data">
                  @csrf

                  <table id="myTable" class="table table-bordered">
                    <thead>
                      <tr style="text-align:center;">
                        <th rowspan="2">Color Code</th>
                        <th rowspan="2">Color Name</th>
                        <th rowspan="2">Country Code</th>
                        <th colspan="{{$total}}">QTY Breakdown</th>
                      </tr>
                      <tr style="text-align:center;">
                        @foreach($ukuran as $key => $value)
                        <th>{{$value}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary btn-block col-12">Submit</button>
                </form>
                @endif
                @if($detail->detail_exist != 0)
                  <table id="myTable" class="table table-bordered">
                    <thead>
                      <tr style="text-align:center;">
                        <th rowspan="2">Color Code</th>
                        <th rowspan="2">Color Name</th>
                        <th rowspan="2">Country Code</th>
                        <th colspan="{{$total}}">QTY Breakdown</th>
                        <th rowspan="2">Total</th>
                        <th rowspan="2">Action</th>
                      </tr>
                      <tr style="text-align:center;">
                        @foreach($ukuran as $key => $value)
                        <th>{{$value}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @include('marketing.rekaporder.breakdown.partials.detail_table')
                    </tbody>
                  </table>
                @endif
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
@include('marketing.rekaporder.layouts.footer')
<script type="text/javascript">

$(document).ready(function() {
  var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
    });
} );

$('body').on('click', '.editData', function (event) {
  event.preventDefault();
  var id = $(this).data('id');
  $.get('edit_data/' + id , function (data) {
      $('#modal-editData').modal('show');
      $('#dd').val(data.id);
      $('#det').val(data.rekap_detail_id);
      $('#fabric').val(data.fabric);
      $('#color_code').val(data.color_code);
      $('#color_name').val(data.color_name);
      $('#country_code').val(data.country_code);
      $('#d1').val(data.size1);
      $('#d2').val(data.size2);
      $('#d3').val(data.size3);
      $('#d4').val(data.size4);
      $('#d5').val(data.size5);
      $('#d6').val(data.size6);
      $('#d7').val(data.size7);
      $('#d8').val(data.size8);
      $('#d9').val(data.size9);
      $('#d10').val(data.size10);
      $('#d11').val(data.size11);
      $('#d12').val(data.size12);
      $('#d13').val(data.size13);
      $('#d14').val(data.size14);
      $('#d15').val(data.size15);
      $('#d16').val(data.size16);
      $('#d17').val(data.size17);
      $('#d18').val(data.size18);
      console.log(data.rekap_detail_id)
  })
});
</script>
<script>
// order date 
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
</script>
@if($detail->detail_exist == 0)
<script>
function add_fields() {
document.getElementById("myTable")
.insertRow(-1).innerHTML =                                                                                                                                                                                                                                     
'<tr><td><input type="hidden" id="master_order_id" name="master_order_id[]" value="{{$detail->master_order_id}}" class="fabric"><input type="hidden" id="rekap_detail_id" name="rekap_detail_id[]" value="{{$detail->id}}" class="fabric"><input type="text" class="color" id="color_code" name="color_code[]" style="width:auto;"></td><td><input type="text" class="color" id="color_name" name="color_name[]" style="width:auto;"></td><td><input type="text" class="color" id="country_code" name="country_code[]" style="width:auto;"></td>@if($master->rekap_size->size1 != null)<td><input type="number" class="size" id="size1" name="size1[]"></td>@endif @if($master->rekap_size->size2 != null)<td><input type="number" class="size" id="size2" name="size2[]"></td>@endif @if($master->rekap_size->size3 != null)<td><input type="number" class="size" id="size3" name="size3[]"></td>@endif @if($master->rekap_size->size4 != null)<td><input type="number" class="size" id="size4" name="size4[]"></td>@endif @if($master->rekap_size->size5 != null)<td><input type="number" class="size" id="size5" name="size5[]"></td>@endif @if($master->rekap_size->size6 != null)<td><input type="number" class="size" id="size6" name="size6[]"></td>@endif @if($master->rekap_size->size7 != null)<td><input type="number" class="size" id="size7" name="size7[]"></td>@endif @if($master->rekap_size->size8 != null)<td><input type="number" class="size" id="size8" name="size8[]"></td>@endif @if($master->rekap_size->size9 != null)<td><input type="number" class="size" id="size9" name="size9[]"></td>@endif @if($master->rekap_size->size10 != null)<td><input type="number" class="size" id="size10" name="size10[]"></td>@endif @if($master->rekap_size->size11 != null)<td><input type="number" class="size" id="size11" name="size11[]"></td>@endif @if($master->rekap_size->size12 != null)<td><input type="number" class="size" id="size12" name="size12[]"></td>@endif @if($master->rekap_size->size13 != null)<td><input type="number" class="size" id="size13" name="size13[]"></td>@endif @if($master->rekap_size->size14 != null)<td><input type="number" class="size" id="size14" name="size14[]"></td>@endif @if($master->rekap_size->size15 != null)<td><input type="number" class="size" id="size15" name="size15[]"></td>@endif @if($master->rekap_size->size16 != null)<td><input type="number" class="size" id="size16" name="size16[]"></td>@endif @if($master->rekap_size->size17 != null)<td><input type="number" class="size" id="size17" name="size17[]"></td>@endif @if($master->rekap_size->size18 != null)<td><input type="number" class="size" id="size18" name="size18[]"></td>@endif</tr>';
}
</script>
@endif