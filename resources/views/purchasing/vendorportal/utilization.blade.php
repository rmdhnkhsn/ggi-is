@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">

@endpush

@section("content")
<section class="content-header">
      <div class="container-fluid">
      </div>
</section>

<section class="content">
      <div class="container-fluid">
      @php($join_fabric_percent=round(($join_fabric[0]->total_join/$join_fabric[0]->total_supplier)*100,1))
      @php($inv_fabric_percent=round(($inv_fabric[0]->total_submit/$inv_fabric[0]->total_supplier)*100,1))

      @php($join_trim_percent=round(($join_trim[0]->total_join/$join_trim[0]->total_supplier)*100,1))
      @php($inv_trim_percent=round(($inv_trim[0]->total_submit/$inv_trim[0]->total_supplier)*100,1))

      <div class="row">
          <a href="#" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$join_fabric_percent}}" disabled>
                    <div class="knob-label" id="labelknob-good">JOIN VP</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">SUPPLIER FABRIC</span>
                    <span class="tot-issue">{{ $join_fabric[0]->total_join.'/'.$join_fabric[0]->total_supplier }}</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>

          <a href="#" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$join_trim_percent}}" disabled>
                    <div class="knob-label" id="labelknob-good">JOIN VP</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">SUPPLIER TRIM</span>
                    <span class="tot-issue">{{ $join_trim[0]->total_join.'/'.$join_trim[0]->total_supplier }}</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>


          <a href="#" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#007bff" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$inv_fabric_percent}}" disabled>
                    <div class="knob-label" id="labelknob-good" style="color:#007bff;">SUBMIT INV</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">SUPPLIER FABRIC</span>
                    <span class="tot-issue">{{ $inv_fabric[0]->total_submit.'/'.$inv_fabric[0]->total_supplier }}</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>




          
          <a href="#" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#007bff" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$inv_trim_percent}}" disabled>
                    <div class="knob-label" id="labelknob-good" style="color:#007bff;">SUBMIT INV</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">SUPPLIER TRIM</span>
                    <span class="tot-issue">{{ $inv_trim[0]->total_submit.'/'.$inv_trim[0]->total_supplier }}</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>


        </div>

        <div class="row">
          <div class="col-12">
            <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
              <div class="card-header">
                <h3 class="card-title">DATA SUPPLIER UTILIZATION</h3>
              </div>
              <div class="card-body">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped no-wrap">
                      <thead>
                            <tr>
                                <th>Code</th>
                                <th>Supplier</th>
                                <th>Type</th>
                                <th>First.Dlv.Date</th>
                                <th>Delivery.Count</th>
                                <th>First.Inv.Submit</th>
                                <th>Inv.Count</th>
                            </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                      </tfoot>
                    </table>
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



@endsection

@push("scripts")
<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '18pt').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 1.5;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>



<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
        scrollCollapse: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('vendorportal.utilization') }}",
        columns: [
            {data: 'supplier_number', name: 'supplier_number'},
            {data: 'supplier', name: 'supplier'},
            {data: 'supplier_type', name: 'supplier_type'},
            {data: 'first_delivery_date', name: 'first_delivery_date'},
            {data: 'count_delivery', name: 'count_delivery'},
            {data: 'first_invoice_submit', name: 'first_invoice_submit'},
            {data: 'count_submit_inv', name: 'count_submit_inv'},
        ]
    });
  });

  $(document).ready(function() {

    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });

</script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endpush