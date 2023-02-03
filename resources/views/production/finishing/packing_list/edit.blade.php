@extends("layouts.app")
@section("title","Packing List")
@push("styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")

<style>
  ::placeholder {
    color: #fff;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-md-8 mb-2">
        <form id="formupdatePackingList" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="cards-18" style="padding: 30px 35px">
                <div class="title-22 text-center">Form Update Packing List</div>
                <div class="justify-center">
                  <div class="borderBlue"></div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 mb-3">
                    <span class="title-sm">Category Prosess</span>
                    <div class="flex mt-1">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-network-wired"></i></span>
                        </div>
                        <select class="form-control  border-input-10 select2bs4 " id="action" name="action"  placeholder="masukkan nik..." required style="width:100%">
                            <option  selected>{{ $dataEdit->action }} </option>
                            <option value="PACKING"> PERFORMA PACKING LIST </option>
                            <option value="EXPEDISI"> PACKING LIST TO EXPEDISI </option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <span class="title-sm">WO</span>
                    <div class="flex mt-1">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-list-ol"></i></span>
                      </div>
                      <select class="form-control border-input-10 select2bs4" name="wo" id="wo" style="width:100%">
                        <option  selected>{{ $dataEdit->wo }}</option>
                            @foreach($dataByWo as $key => $value)
                            <option value="{{$value['wo_no']}}">{{$value['wo_no']}}</option>
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Buyer</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="buyer" name="buyer" value="{{ $dataEdit->buyer }}" placeholder="buyer..." required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <span class="title-sm">PO No</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="no_po" name="po" value="{{ $dataEdit->po }}" placeholder="masukkan PO..." required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">OR No</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="no_or" name="or_number" value="{{ $dataEdit->or_number }}" placeholder="masukkan OR..." required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Nomor Kontrak</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="contract" name="no_kontrak" value="{{ $dataEdit->no_kontrak }}" placeholder="masukkan nomor kontrak..." required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Style/Article</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="style_name" name="style" value="{{ $dataEdit->style }}" placeholder="masukkan style..." required>
                    </div>
                  </div>
                 
                  <div class="col-md-6">
                    <span class="title-sm">QTY Order</span>
                    <div class="input-group mt-1 mb-3">
                       @if ($dataEdit->action == 'PACKING')
                      <input type="text" class="form-control border-input-10 qty_order" id="total_breakdown" name="qty" value="{{ $dataEdit->qty }}" placeholder="masukkan qty...">
                      @else
                      <input type="text" class="form-control border-input-10 qty_order" id="qty2" name="qty2" value="{{ $dataEdit->qty2 }}" placeholder="masukkan qty...">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">QTY Percent</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="" name="qty_percent" value="{{ $dataEdit->qty_percent }}" placeholder="masukkan qty percent...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Warehouse</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="warehouse" name="warehouse" value="{{ $dataEdit->warehouse }}" placeholder="masukkan warehouse...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Agent</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="agent" name="agent" value="{{ $dataEdit->agent }}" placeholder="agent...">
                    </div>
                  </div>
                  {{-- <div class="col-md-6">
                    <span class="title-sm">OFF CTN</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="off_ctn" name="off_ctn" value="{{ $dataEdit->off_ctn }}" placeholder="masukkan off ctn...">
                    </div>
                  </div> --}}
                  <div class="col-12">
                    <span class="title-sm">Tanggal</span>
                    <div class="input-group date mt-1" id="Date" data-target-input="nearest">
                      <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                        <div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; padding: 0 20px; gap: .7rem !important">
                          <i class="fas fa-calendar-alt"></i><span class="fs-14">Date</span><i class="fas fa-caret-down"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input border-input-10" name="tanggal"  value="{{ $dataEdit->tanggal }}" data-target="#Date" placeholder="Select Date"/>
                    </div>
                  </div>
                </div>
              </div>
              @php
              $x = 1;
              @endphp
              <input type="hidden" id="jumlahRow" name="jumlahRow" value="@php count($dataSizeJumlah) @endphp">
              @foreach ($dataSizeJumlah as $key =>$value)
              <div class="cards-18" style="padding: 30px 35px">
                <div class="title-22 text-center">Quantity Carton</div>
                <div class="justify-center">
                  <div class="borderBlue"></div>
                </div>
                <div class="row mt-6 ">
                  <input type="hidden" name='idSizeJumlah_{{ $x }}' value={{ $value['id'] }}>
                  {{-- <div class="col-md-4">
                    <span class="title-sm">Color Code</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="color_code" name="color_code_{{ $x }}" value="{{ $value['color_code'] }}" placeholder="masukkan color code..." required>
                    </div>
                  </div> --}}
                  <div class="col-md-6">
                    <span class="title-sm">Qty Carton</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10 qty_carton" id="qty_carton_{{ $x }}" name="qty_carton_{{ $x }}" value="{{ $value['qty_carton'] }}" placeholder="masukkan qty carton..." required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">Satuan</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="satuan_{{ $x }}" name="satuan_{{ $x }}" value="{{ $value['satuan'] }}" placeholder="masukkan satuan...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">NW</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="NW_{{ $x }}" name="NW_{{ $x }}" value="{{ $value['NW'] }}" placeholder="masukkan NW..." required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="title-sm">GW</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input-10" id="GW_{{ $x }}" name="GW_{{ $x }}" value="{{ $value['GW'] }}" placeholder="masukkan GW..." required>
                    </div>
                  </div>

               
                  <input type="hidden" id="jumlahRowColor_{{ $x }}" name="jumlahRowColor_{{ $x }}" value="0">
                    <?php $i = 0; ?>
                    {{-- <div class="col-12 mb-4"><div class="borderlight"></div></div> --}}
                    @foreach ($dataGroupColorCode as $colorCode)
                      @if ($colorCode->id_packing_report == $value->id)
                          <div class="col-12">
                            <span class="title-sm">Size & Quantity</span>
                          </div>
                          <div class="col-12">
                            <input type="text" class="form-control border-input-10 mt-1 mb-3" id="color_code_{{ $x }}_{{ $i }}" name="color_code_{{ $x }}_{{ $i }}" value="{{ str_replace(['"','[',']'], '', $colorCode['color_code']) }} ">
                          </div>
                              @foreach ($dataByNamaSize as $value3)
                                @if ($value3->id_packing_report == $value->id && $value3->color_code == $colorCode->color_code)
                                    <div class="col-lg-2 col-md-4">
                                      <input type="hidden" name='idSizeJumlahAll_{{ $x }}_{{ $i }}[]' value={{ $value3['id'] }}>
                                        <div class="input-group date mt-1 mb-3">
                                          <div class="input-group-append">
                                            <input type="text" class="custom-calendar sizeAppend size-1" id="size1" name="nama_size_{{ $x }}_{{ $i }}[]" value="{{ $value3['nama_size'] }}" readonly/>
                                          </div>
                                          <input type="text" class="form-control border-input-10 jumlah_size"  id="jumlah_size_{{ $x }}_{{ $i }}" name="jumlah_size_{{ $x }}_{{ $i }}[]" value="{{ $value3['jumlah_size'] }}" placeholder="0"/>
                                        </div>
                                    </div>
                                

                                @endif
                              @endforeach  
                              <input type="hidden" id='jumlahRowColor_{{ $x }}' name='jumlahRowColor_{{ $x }}' value="{{ $i }}">
                          <div class="col-12 mb-4"><div class="borderlight"></div></div>
                          <script>
                            document.getElementById('jumlahRowColor_{{ $x }}').value = "{{ $i }}" 
                          </script>
                          <?php $i++ ?>
                      @endif
                      @endforeach
                </div>
              </div>
               <?php $x++;
               ?>
               
              @endforeach
              <script>
                document.getElementById('jumlahRow').value = "{{ $x }}" 
              </script>
            </div>
          </div>
            <input type="hidden" name="id" value="{{ $dataEdit->id }}">
          <div class="row">
            <div class="col-12 my-3">
              <button class="btn-blue btn-block" name="archive" onclick="archiveFunction()" style="border-radius:10px">Simpan<i class="ml-3 fas fa-download"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <div class="stickyTop">
          <div class="cards-18" style="padding: 28px 22px">
            <div class="title-20 text-left">All Data Packing List</div>
            <div class="row mt-4">   
              <div class="col-12">
                <div class="cards-scroll pr-2 scrollY" id="scroll-bar-sm" style="max-height:382px">
                  <table class="table tbl-content-left no-wrap">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>WO</th>
                        <th>BUYER</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($dataDetail as $key =>$value)
                      <tr class="clickable-row" data-href="{{route('data-details', $value['id'])}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['wo'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        {{-- <td>
                          <div class="container-tbl-btn">
                            <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                          </div>
                        </td> --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 mt-3">
                <a href="{{ route('packing-details')}}" class="btn-blue-md">See Details<i class="fs-18 ml-3 fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="cards-18" style="padding: 28px 22px">
            <div class="title-20 text-left">Daily Target Buyer List</div>
            <div class="row mt-4">   
              <div class="col-12">
                <div class="cards-scroll pr-2 scrollY" id="scroll-bar-sm" style="max-height:382px">
                  <table class="table tbl-content-left">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>BUYER</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($dataBuyer as $key =>$value)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $key }}</td>
                        <td>
                          <div class="container-tbl-btn">
                            <a href="{{ route('expedisi-details',$key)}}" class="btn-blue-md" style="width:110px">Details<i class="fs-18 ml-2 fas fa-chevron-right"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>



<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $('#Date').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  /* When click New customer button */
    });
    $('#wo').change(function(){
    // console.log("ok");
    var ID = $(this).val();
  // console.log(ID);
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("packing.getDataWo") }}',           
          type: "post",
          dataType: 'json',
          success: function (data) {     
            $('#buyer').val(data.buyer)
            $('#style_name').val(data.style_name)
            $('#contract').val(data.contract)
            $('#no_po').val(data.no_po)
            $('#no_or').val(data.no_or)
            $('#article').val(data.article)
            $('#total_breakdown').val(data.total_breakdown)
            $('#size1').val(data.size1)
            $('#size2').val(data.size2)
            $('#size3').val(data.size3)
            $('#size4').val(data.size4)
            $('#size5').val(data.size5)
            $('#size6').val(data.size6)
            $('#size7').val(data.size7)
            $('#size8').val(data.size8)
            $('#size9').val(data.size9)
            $('#size10').val(data.size10)
            $('#size11').val(data.size11)
            $('#size12').val(data.size12)
            $('#size13').val(data.size13)
            $('#size14').val(data.size14)
            
          },

        });
      }
    }); 

    function archiveFunction() {
      jumlah_size = 0
      var jumlahRow = $("#jumlahRow").val()
      var action = $("#action").val()
      var qty_order = 0;
    if (action == "PACKING"){
       qty_order = $("#total_breakdown").val();
    } else {
       qty_order = $("#qty2").val();
    }
      var total_carton = 0;
      for (let x = 0; x < parseInt(jumlahRow); x++) {
        var qtyCarton = $("#qty_carton_"+x).val()
        var totalQtySize = 0;

        if (qtyCarton != undefined){
          var jumlahRowColor = $("#jumlahRowColor_"+x).val();
          if(jumlahRowColor != undefined){
            jumlahRowColor = parseInt(jumlahRowColor);
            for (let i = 0; i <= jumlahRowColor; i++) {
              var elements = document.getElementsByName("jumlah_size_"+x+"_"+i+"[]");
              for(let j = 0; j < elements.length; j++){
                let qtySize = elements[j].value;
                if (qtySize != undefined && qtySize != "" && qtySize != null){
                  totalQtySize = totalQtySize + parseInt(qtySize)
                }
              }
            }
          }
        } else {
           totalQtySize = totalQtySize + 0
           continue
        }

        var jumlahCartonAllSize = totalQtySize * parseInt(qtyCarton);
        total_carton = total_carton + jumlahCartonAllSize;

      }
      if ( qty_order != total_carton) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
          swal({
            title: "Apakah Anda Yakin Tetap Submit?",
            text: "QTY Order Belum Sesuai !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2e93ff",
            confirmButtonText: "Yes",
            cancelButtonText: "No ",
            closeOnConfirm: false,
            closeOnCancel: false
          },
        function(isConfirm){
          if (isConfirm) {
            updatePackingList(0)    
          } else {
            swal("Cancelled", "File imajiner Anda aman :)", "error");
          }
        });
      }else{
        updatePackingList(1)
      }
    }
    
    function updatePackingList(is_same_qty) {
      var action = $("#action").val()
      $.ajax({
        data: $('#formupdatePackingList').serialize()+"&is_same_qty="+is_same_qty,
        url: "{{ route('packing.updatePackingList', $dataEdit->id)}}",           
        type: "PUT",
        dataType: 'json',
        success: function (data) {
            location.replace("{{ url('/prd/finishing/packing-list') }}")
            // return false;
        },
        error: function (xhr, status, error) {
          alert(xhr.responseText);
          return false;
        }
      })
      return false;
    }
</script>

@endpush
