@include('marketing.rekaporder.layouts.header')
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@include('marketing.rekaporder.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col-lg-6">
                    <span class="info-box-text">NO PO</span>
                    <span class="info-box-number">{{$rekap->no_po}}</span>
                  </div>
                  <div class="col-lg-6">
                    <span class="info-box-text">Standard</span>
                    <span class="info-box-number">{{$rekap->standar}}</span>
                  </div>

                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Buyer</span>
                <span class="info-box-number">{{$namaBuyer->F0101_ALPH}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">InHand/Projection</span>
                <span class="info-box-number">{{$rekap->inhand_or_projection}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-alt"></i></span>
              <div class="info-box-content">
                <div class="row">
                  <div class="col-lg-6">
                    <span class="info-box-text">Order Date</span>
                    <span class="info-box-number">{{$rekap->date}}</span>
                  </div>
                  <div class="col-lg-6">
                    <span class="info-box-text">ExFact Date</span>
                    <span class="info-box-number">{{$rekap->ex_fact}}</span>
                  </div>
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('rekapDetail.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('marketing.rekaporder.detail.partials.form-control', ['submit' => 'Create'])
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Rekap Order Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" id="smallBody">
                      <form action="{{ route('rekapDetail.update')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @include('marketing.rekaporder.detail.partials.form-edit', ['submit' => 'Save'])
                      </form>
                  </div>
              </div>
          </div>
      </div>

    <!-- Buat Modal  -->
    @include('marketing.rekaporder.detail.partials.form-modal')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rekap Order Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-2" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
                    <button type="button" class="close" data-dismiss="alert">×</button>   
                    <center> 
                    <strong>{{ $message }}</strong>
                    </center>
                </div>
                @endif
                <div class="row">
                  @if($rekap->is_size_exist != 0)
                    <div class="col-lg-2">
                      <button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus"></i> Create New</button>
                    </div>
                  @endif
                  @if($rekap->is_size_exist == 0)
                    <div class="col-lg-2">
                      @if ($message = Session::get('error'))
                      <div class="alert alert-danger alert-block mt-2 col-lg-2" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
                          <button type="button" class="close" data-dismiss="alert">×</button>   
                          <center> 
                          <strong>{{ $message }}</strong>
                          </center>
                      </div>
                      @endif
                      <button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-size"><i class="fas fa-plus"></i> Create Size</button>
                    </div>
                  @else
                    <div class="col-lg-2">
                        <a href="javascript:void(0)" class="btn btn-block btn-warning btn-sm editSize" data-id="{{ $rekap->id }}" title="Edit" data-toggle="modal" data-target="#modal-editSize"><i class="fas fa-edit"></i> Edit Size</a> 
                    </div>
                  @endif
                </div>
                <br>
                @if($rekap->is_size_exist != 0)
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contract</th>
                            <th>Article</th>
                            <th>Style</th>
                            <th>Colorway</th>
                            <th>Product_Name</th>
                            <th>NO_OR</th>
                            <th>PACK/PC (Qty)</th>
                            <th>Parent_Item</th>
                            <th>Exfact</th>
                            <th>{{$rekap->standar}}</th>
                            <th>CM</th>
                            <th>Total_Breakdown</th>
                            <th>Breakdown</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->contract}}</td>
                      <td>{{$value->article}}</td>
                      <td>{{$value->style}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->product_name}}</td>
                      <td>{{$value->no_or}}</td>
                      <td>{{$value->kemasan}} @if($value->quantity_pack != null) ({{$value->quantity_pack}}) @endif</td>
                      <td>{{$value->parent_item}}</td>
                      <td>{{$value->ex_fact}}</td>
                      <td>{{$value->nilai}}</td>
                      <td>{{$value->cm}}</td>
                      <td>{{$value->total_breakdown}}</td>
                      <td>
                      @if($value->breakdown_id == 0)
                      <a href="{{ route('breakdown.create', $value->id) }}" class="btn btn-primary btn-sm" title="Create Breakdown"><i class="fas fa-edit"></i></a>
                      @else
                      <a href="{{ route('breakdown.see', $value->id) }}" class="btn btn-info btn-sm" title="See Breakdown"><i class="fas fa-eye"></i></a>
                      @endif
                    </td>
                      <td><a href="javascript:void(0)" class="btn btn-warning btn-sm editProduct" data-id="{{ $value->id }}" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
                      @if($value->wo_qty_allocated == 0 || $value->wo_qty_allocated == 0.00)
                        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->departemen=='MARKETING')
                          <a href="{{ route('rekapDetail.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this rows?');"><i class="fas fa-trash"></i></a>
                        @endif
                      @endif</td>
                    </tr>
                    @endforeach
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
@if(Session::has('cm_error'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'error',
            title: 'Oooppsss ...',
            text: 'CM Can Not Be More Than 50'
        })
    }
  </script>
@endif
<script>
  document.getElementById('kemasan_rekap').addEventListener('change', function(e) {
    Array.from(document.getElementsByClassName('kemasan_si_rekap')).forEach(function(data) {
      data.innerHTML = '(' + e.target.value + ')';
    })
  })

</script>
<script type="text/javascript">

  $('.select2bs4_add').select2({
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
          url: 'http://10.8.0.108/jdeapi/public/api/itemnumber/search=',
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              F4101_ITM:  params.term,
              F4101_GLPT: 'INGA',
              select:'F4101_ITM'
            }
            return query;
          },
          processResults: function (data) {
            return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.F4101_ITM,
                      id: item.F4101_ITM
                  }
              })

            };

          },
        }
  })

  $('.select2bs4_add').on('select2:select', function (e) {
      e.preventDefault();
      var data = e.params.data;
      $('#parent_litm_add').val(data.text);
  });

  $('.select2bs4_edit').select2({
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
          url: 'http://10.8.0.108/jdeapi/public/api/itemnumber/search=',
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              F4101_ITM: params.term,
              F4101_GLPT: 'INGA',
              select:'F4101_ITM,F4101_LITM'
            }
            return query;
          },
          processResults: function (data) {
            return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.F4101_ITM,
                      id: item.F4101_ITM
                  }
              })

            };

          },
        }
  })

  $(document).on('change', '#kemasan_rekap', function() {
      event.preventDefault();
      
      const satuan = $(this).val();
      if (satuan != 'PC') { 
        // console.log('qty pack harus required');
        $("#quantity_pack").prop('required',true);
        // alert('Qantity tidak boleh kosong')
      } else {
        $("#quantity_pack").prop('required',false);
      }
      console.log(satuan);
  });

  $('.select2bs4_edit').on('select2:select', function (e) {
      e.preventDefault();
      var data = e.params.data;
      $('#parent_litm_edit').val(data.text);
  });

  $(document).ready(function() {
    var table = $('#example1').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,
          "order": [[ 0, "desc" ]],
      });
  } );

  $('body').on('click', '.editProduct', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.get('edit/' + id , function (data) {
      // console.log(data.quantity_pack);
        $('#modal-edit').modal('show');
        $('#id').val(data.id);
        $('#report').val(data.master_order_id);
        $('#cont').val(data.contract);
        $('#product').val(data.product_name);
        $('#ex').val(data.ex_fact);
        $('#art').val(data.article);
        $('#nor').val(data.no_or);
        $('#kemas').val(data.kemasan);
        $('#siquan_pack').val(data.quantity_pack);
        $('#values').val(data.nilai);
        $('#cost').val(data.cm);
        $('#sty').val(data.style);
        $('#s_name').val(data.style_name);
        $('#parent_item_edit').val(data.parent_item);
        $('#parent_litm_edit').val(data.parent_item_litm);
        $('#inv_desc').val(data.description_invoice);
        $('#color').val(data.colorway);
        Array.from(document.getElementsByClassName('kemasan_si_rekap')).forEach(function(data) {
          data.innerHTML = document.getElementById('kemas').value;
        })

    })


    document.getElementById('kemas').addEventListener('keyup', function(e) {
      const target = e.target.parentNode.parentNode.parentNode;
      Array.from(target.getElementsByClassName('kemasan_si_rekap')).forEach(function(data) {
        data.innerHTML = '(' + e.target.value + ')';
      })
    })

  });

  $('body').on('click', '.editSize', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.get('editsize/' + id , function (data) {
        $('#modal-editSize').modal('show');
        $('#idSize').val(data.rekap_size.id);
        $('#size1').val(data.rekap_size.size1);
        $('#size2').val(data.rekap_size.size2);
        $('#size3').val(data.rekap_size.size3);
        $('#size4').val(data.rekap_size.size4);
        $('#size5').val(data.rekap_size.size5);
        $('#size6').val(data.rekap_size.size6);
        $('#size7').val(data.rekap_size.size7);
        $('#size8').val(data.rekap_size.size8);
        $('#size9').val(data.rekap_size.size9);
        $('#size10').val(data.rekap_size.size10);
        $('#size11').val(data.rekap_size.size11);
        $('#size12').val(data.rekap_size.size12);
        $('#size13').val(data.rekap_size.size13);
        $('#size14').val(data.rekap_size.size14);
        $('#size15').val(data.rekap_size.size15);
        $('#size16').val(data.rekap_size.size16);
        $('#size17').val(data.rekap_size.size17);
        $('#size18').val(data.rekap_size.size18);
        console.log(data.rekap_size.id)
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

  // order date buat form edit 
  $('#reservationdate2').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });

  // ex_fact date 
  $('#reservationdate3').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });

  // ex_fact buat form edit 
  $('#reservationdate4').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
