@extends("layouts.app")
@section("title","Packing List")
@push("styles")
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <form id="formStorePackingList" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="cards-18" style="padding: 30px 35px">
                        <div class="title-22 text-center">Form Input Packing List</div>
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
                                    <select class="form-control  border-input-10 select2bs4 " id="action" onchange=test() name="action" placeholder="masukkan nik..." required>
                                        <option  selected> </option>
                                        <option value="PACKING"> PERFORMA PACKING LIST </option>
                                        <option value="EXPEDISI"> PACKING LIST TO EXPEDISI </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control border-input-10 rekap_detail_id" id="rekap_detail_id" name="rekap_detail_id">
                            <div class="col-md-6 mb-3 d-none" id="woPacking">
                                <span class="title-sm">WO</span>
                                <div class="flex mt-1">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-list-ol"></i></span>
                                    </div>
                                    <select class="form-control border-input-10 select2bs4" name="wo" id="wo" style="width:100%">
                                            <option  selected> </option>
                                        @foreach($dataByWo as $key => $value)
                                            <option value="{{$value['wo_no']}}">{{$value['wo_no']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 d-none" id="woEkspedisi">
                                <span class="title-sm">WO Ekspedisi</span>
                                <div class="flex mt-1">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-list-ol"></i></span>
                                    </div>
                                    <select class="form-control border-input-10 select2bs4" name="wo1" id="ekspedisiWo" style="width:100%">
                                            <option  selected> </option>
                                        @foreach($dataEkspedisi as $key4 => $value4)
                                            <option value="{{$value4['id']}}|{{$value4['wo']}}">{{$value4['wo']}}-{{$value4['qty_balance']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Buyer</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="buyer" name="buyer" placeholder="buyer..." readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">PO No</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="no_po" name="po" placeholder="masukkan PO..." readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">OR No</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="no_or" name="or_number" placeholder="masukkan OR..." readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Nomor Kontrak</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="contract" name="no_kontrak" placeholder="masukkan style..." readonly >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Style/Article</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="style_name" name="style" style="border-radius:0 10px 10px 0" placeholder="masukkan style..." readonly >
                                    <input type="hidden" class="form-control border-input-10 qtyorderAsli" id="qtyorderAsli" name="qty_order"   placeholder="masukkan qty...">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalDetails" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
                                <div class="modal-content p-4" style="border-radius:10px">
                                    <div class="row">
                                        <div class="col-12 justify-sb">
                                            <div class="title-18">QTY Details</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="borderlight"></div>
                                        </div> 
                                        <div class="col-12">
                                            <table class="table table-striped tbl-content">
                                                <thead id="theadTableDetail">
                                                </thead>
                                                <tbody id="tbodyTableDetail">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none" id="packing_listQTY">
                            <div class="row">
                                <div class="col-12">
                                    <span class="title-sm qty_order" id="qtylabel">Qty Order</span>
                                    <div class="flex gap-2 mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10 qty_order" id="total_breakdown" name="qty" placeholder="masukkan qty...">
                                        <a href="#" class="btn-blue detailsQty" ><i class="fs-18 fas fa-info"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none" id="ekspedisiQTY">
                            <div class="row">
                                <div class="col-12">
                                    <span class="title-sm qty_order" id="qtylabel">Qty Order to Ekspedisi</span>
                                    <div class="flex gap-2 mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10 qty_order" id="qty2" name="qty2" placeholder="masukkan qty...">
                                        <a href="#" class="btn-blue detailsQty" ><i class="fs-18 fas fa-info"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none" id="packing_list">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="title-sm">Qty Pack</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="number" class="form-control border-input-10 quantity_pack" id="quantity_pack" name="qty_satuan" value="1" placeholder="masukkan qty pack...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="title-sm">Qty Percent</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="number" class="form-control border-input-10 qty_percent" id="qty_percent" name="qty_percent" value="0" placeholder="masukkan qty percent..." required>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <span class="title-sm">Qty Balance</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10" id="total" name="qty_balance"  placeholder="total balance..." readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="title-sm">Agent</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10" id="agent" name="agent" placeholder="agent...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="title-sm">Tanggal</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10"  name="tanggal" value="{{ $date }}" placeholder="masukkan warehouse..." readonly>
                                    </div>
                                </div>
                                <input type="hidden" id="kemasan_induk">
                                <input type="hidden" id="nw_induk">
                                <input type="hidden" id="gw_induk">
                                <div class="col-md-6">
                                    <span class="title-sm">Keterangan</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input-10" id="judul" name="judul" placeholder="masukkan Judul Keterangan...">
                                    </div>
                                </div> 
                            </div>   
                        </div>
                        <div class="d-none" id="ekspedisi">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="title-sm">Qty Pack</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="number" class="form-control border-input-10 quantity_pack2" id="qty_pack" name="qty_satuan2" value="0" placeholder="masukkan qty percent..." readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="title-sm">Qty Percent</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="number" class="form-control border-input-10 qty_percent2" id="qty_percent2" name="qty_percent2" value="0" placeholder="masukkan qty percent..." readonly>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <span class="title-sm">Qty Balance</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="qty_balance2" name="qty_balance2"  placeholder="masukkan qty..." readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Warehouse</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="warehouse2" name="warehouse2" placeholder="masukkan warehouse...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Agent</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="agent2" name="agent2" placeholder="agent...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Tanggal</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10"  name="tanggal2" value="{{ $date }}" placeholder="masukkan warehouse...">
                                </div>
                            </div>
                            <input type="hidden" id="kemasan_induk">
                            <input type="hidden" id="nw_induk">
                            <input type="hidden" id="gw_induk">
                            <div class="col-md-6">
                                <span class="title-sm">Keterangan</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="judul" name="judul" placeholder="masukkan Judul Keterangan...">
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <input type="hidden" id="jumlahRow" name="jumlahRow" value="0">
                <div id="newRowSize"></div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <button type="button" class="btn-green btn-block" id="addSize">Add Carton <i class="fs-18 ml-2 fas fa-plus"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button name="archive" onclick="archiveFunction()" class="btn-blue btn-block" style="border-radius:10px">Simpan<i class="ml-3 fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Dua menu samping  -->
        <div class="col-md-4">
            <div class="stickyTop">
                <!-- ALL Data Performa Packing List -->
                @include('production.finishing.PackingList.partials.all-perfoma')
               
                <!-- ALL Data PL to Ekspedisi -->
                @include('production.finishing.PackingList.partials.data-pl')
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('/js/packing_list/script.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets3/plugins/select2/js/select2.full.js')}}"></script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>

<script>
  $(".multipleSelect").select2();

  $(".multipleSelect").on("select2:select", function (evt) {
    var element = evt.params.data.element;
    var $element = $(element);
    
    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
  });
</script>

<script> 
    const test = ()=> {
      const valueAction = document.getElementById('action');
      const ekspedisi = document.getElementById('ekspedisi');
      const packing_list = document.getElementById('packing_list');
      const ekspedisiQTY = document.getElementById('ekspedisiQTY');
      const packing_listQTY = document.getElementById('packing_listQTY');
      const woEkspedisi = document.getElementById('woEkspedisi');
      const woPacking = document.getElementById('woPacking');
      const label = document.getElementById('qtylabel');
      if (valueAction.value == 'EXPEDISI') {
        label.textContent = 'Qty to Expedition';
        ekspedisi.classList.add('d-block');
        ekspedisiQTY.classList.add('d-block');
        packing_listQTY.classList.remove('d-block');
        packing_list.classList.remove('d-block');
        woEkspedisi.classList.add('d-block');
        woPacking.classList.remove('d-block');
      } else {
        label.textContent = 'QTY Order';
        ekspedisi.classList.remove('d-block');
        ekspedisiQTY.classList.remove('d-block');
        packing_listQTY.classList.add('d-block');
        packing_list.classList.add('d-block');
        woEkspedisi.classList.remove('d-block');
        woPacking.classList.add('d-block');
      }
  }
</script>

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
  $('#Date2').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })
</script>
<script>
  var colours = [];
  var datasize = {};
  var detailSize = {};
    i = 1
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  /* When click New customer button */
    });
    $('#ekspedisiWo').change(function(){
    var ID = $(this).val();
    console.log(ID)
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("packing.getDataWoEkspedisi") }}',           
          type: "post",
          dataType: 'json',
          success: function (data) {
            datasize = data[0]; 
            colours = data[1]; 
            detailSize = data[2]; 
           
            $('#rekap_detail_id').val(data[0].rekap_detail_id)
            $('#buyer').val(data[0].buyer)
            $('#style_name').val(data[0].style)
            $('#contract').val(data[0].contract)
            $('#no_po').val(data[0].no_po)
            $('#no_or').val(data[0].or_number)
            $('#article').val(data[0].article)
            $('#qty2').val(data[0].qty_balance)            
            $('#nw_induk').val(data[0].NW)
            $('#gw_induk').val(data[0].GW)
            $('#qty_balance2').val(data[0].qty_balance)
            $('#qty_pack').val(data[0].qty_satuan)
            $('#qty_percent2').val(data[0].qty_percent)
            $('#satuan').val(data[0].satuan)
            $('#agent2').val(data[0].agent)
            $('#warehouse2').val(data[0].warehouse)

            var qty_percent  = $("#qty_percent").val();
            var total_breakdown = $("#qty2").val();

            var total = parseInt(qty_percent) * parseInt(total_breakdown)/100;
            var balance = parseInt(total_breakdown) + Math.floor(total) ;
            $("#total").val(balance);
          },

        });
      }
    }); 
</script>
<script>
  var colours = [];
  var datasize = {};
  var detailSize = {};
    i = 1
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  /* When click New customer button */
    });
    $('#wo').change(function(){
    var ID = $(this).val();
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("packing.getDataWo") }}',           
          type: "post",
          dataType: 'json',
          success: function (data) { 
            console.log(data);  
            console.log(data[0].qty);
            datasize = data[0]; 
            colours = data[1]; 
            detailSize = data[2]; 
            $('#rekap_detail_id').val(data[0].rekap_detail_id)
            $('#buyer').val(data[0].buyer)
            $('#style_name').val(data[0].style_name)
            $('#contract').val(data[0].contract)
            $('#no_po').val(data[0].no_po)
            $('#no_or').val(data[0].no_or)
            $('#article').val(data[0].article)
            $('#total_breakdown').val(data[0].total_breakdown)
            $('#qtyorderAsli').val(data[0].total_breakdown)
            $('#quantity_pack').val(data[0].quantity_pack)
            $('#kemasan_induk').val(data[0].kemasan)
            $('#nw_induk').val(data[0].NW)
            $('#gw_induk').val(data[0].GW)
            $('#qty2').val(data[0].qty)
            $('#qty_balance2').val(data[0].qty_balance)
            $('#qty_pack').val(data[0].qty_satuan)
            $('#qty_percent2').val(data[0].qty_percent)
            $('#agent2').val(data[0].agent)
            $('#warehouse2').val(data[0].warehouse)
            var qty_percent  = parseInt($("#qty_percent").val());
            if (isNaN(qty_percent)) {
                qty_percent = 0;
            }
            var total_breakdown = parseInt($("#total_breakdown").val());
            var total = parseInt(qty_percent) * parseInt(total_breakdown)/100;
            var balance = parseInt(total_breakdown) + Math.floor(total) ;
            $("#total").val(balance);
          },

        });
      }
    }); 
</script>

<script>
  $('body').on('click', '.detailsQty', function () {
    var wo = $("#wo").val()
    var ekspedisiWo = $("#ekspedisiWo").val()
    var qtyPercent = $("#qty_percent").val()
    var action = $("#action").val()
    console.log(wo);
    console.log(ekspedisiWo);
    if (action == 'PACKING') {
      if(wo == "" || wo == null || wo == undefined){
      event.preventDefault();
      const url = $(this).attr('href');
        swal({
            position: 'center',
            type: 'warning',
            title: 'Wo Belum Terpilih',
            icon: 'warning',
            text: 'Harap Memilih Dulu Wo',
            showConfirmButton: false,
            timer: 1800
        });
        return false;
      }
    }else{
      if(ekspedisiWo == "" || ekspedisiWo == null || ekspedisiWo == undefined){
      event.preventDefault();
      const url = $(this).attr('href');
        swal({
            position: 'center',
            type: 'warning',
            title: 'Wo Belum Terpilih',
            icon: 'warning',
            text: 'Harap Memilih Dulu Wo',
            showConfirmButton: false,
            timer: 1800
        });
        return false;
      }
    }

    if (action == 'PACKING') {
      if (detailSize.length > 0){
         var datasize = detailSize[0];
         var html = "<tr><th>COLOR CODE</th>";
         var columnTotalpivot = 0;
           for (const property in datasize) {
                   if (property.includes("size") && !property.includes("jumlah_size")) {
               loop2:
                       for (let zz = 0; zz < 20; zz++) {
                           if (property == "size" + zz) {
                               if (datasize[property] != null && datasize[property] != "") {
                                   html += '<th>'+datasize[property]+'</th>';
                                   columnTotalpivot++
                               }
                               break loop2;
                           }
                       }
                   }
               }
           html += "</tr>";
           $("#theadTableDetail").html(html);
           html = "";

           let jumlah = [];
         for (var i = 0; i < detailSize.length; i++) {
           element = detailSize[i];
           html += "<tr><td>"+element.color_code+"</td>";
           for(let j = 0; j <= columnTotalpivot; j++){
             var jumlah_size = element["jumlah_size"+j];
             var qtyPercent = $("#qty_percent").val()
             var qty_pack = $("#quantity_pack").val()
             // var qtyDetail =  parseInt(jumlah_size) * parseInt(qtyPercent) / 100;
             if ( qtyPercent == '' ) {
               var qtyDetail  = parseInt(jumlah_size) * 0 / 100; 
             } else {
               var qtyDetail  =parseInt(jumlah_size) * parseInt(qtyPercent) / 100;
             }
             var qtyFinal  = parseInt(jumlah_size) + Math.floor(qtyDetail);
             if ( qty_pack == '' ) {
               var qtyFinalPack  = parseInt(qtyFinal)/ 1;
             } else {
               var qtyFinalPack  = parseInt(qtyFinal)/ qty_pack ;
             }
           

             var qtyFinalPackBulat  = parseInt(qtyFinalPack);
             

             var final =  parseInt(qtyFinal);
             let num = final;
             num += final;
             if(jumlah_size != undefined){
               html += "<td>"+qtyFinalPackBulat +" </td>";
               jumlah.push(qtyFinalPackBulat);
             }
           }
           html += "</tr>";
         } 
         
         let total = jumlah.reduce(getSum, 0)
         console.log(total)
         function getSum(total, num) {
             return total + Math.round(num);
           }
             $("#total_breakdown").val(total);
           
         $("#tbodyTableDetail").html(html);
         $("#modalDetails").modal("show"); 
       }
  return false
      }else{
        if (detailSize.length > 0){
          var datasize = detailSize[0];
          var html = "<tr><th>COLOR CODE</th>";
          var columnTotalpivot = 0;
            for (const property in datasize) {
                    if (property.includes("size") && !property.includes("jumlah_size")) {
                loop2:
                        for (let zz = 0; zz < 20; zz++) {
                            if (property == "size" + zz) {
                                if (datasize[property] != null && datasize[property] != "") {
                                    html += '<th>'+datasize[property]+'</th>';
                                    columnTotalpivot++
                                }
                                break loop2;
                            }
                        }
                    }
                }
            html += "</tr>";
            $("#theadTableDetail").html(html);
            html = "";

            let jumlah = [];
          for (var i = 0; i < detailSize.length; i++) {
            element = detailSize[i];
            html += "<tr><td>"+element.color_code+"</td>";
            for(let j = 0; j <= columnTotalpivot; j++){
              var jumlah_size = element["jumlah_size"+j];
              var qtyPercent2 = $("#qty_percent2").val()
              var qty_pack2 = $("#qty_pack").val()
              // var qtyDetail =  parseInt(jumlah_size) * parseInt(qtyPercent) / 100;
              if ( qtyPercent2 == '' ) {
                var qtyDetail2  = parseInt(jumlah_size) * 0 / 100; 
              } else {
                var qtyDetail2  =parseInt(jumlah_size) * parseInt(qtyPercent2) / 100;
              }

              
              var qtyFinal2  = parseInt(jumlah_size) + Math.floor(qtyDetail2);
              if ( qty_pack2 == '' ) {
                var qtyFinalPack  = parseInt(qtyFinal2)/ 1;
              } else {
                var qtyFinalPack2  = parseInt(qtyFinal2)/ qty_pack2 ;
              }
              var qtyFinalPackBulat2  = Math.floor(qtyFinalPack2);
              var final2 =  parseInt(qtyFinal2);
              let num = final;
              num += final;
              if(jumlah_size != undefined){
                html += "<td>"+qtyFinalPackBulat2 +" </td>";
                jumlah.push(qtyFinalPackBulat2);
              }
            }
            html += "</tr>";
          } 
          
          let total = jumlah.reduce(getSum, 0)
          function getSum(total, num) {
              return total + Math.round(num);
            }
              //  $("#qty2").val(total);
              //  console.log(total)
            
          $("#tbodyTableDetail").html(html);
          $("#modalDetails").modal("show"); 
        }
    
      return false
      }
  })
</script>

<script>
  i = 1
  $("#jumlahRow").val(i)

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
    if (qty_order != total_carton) {
      event.preventDefault(); // prevent form submit
      var form = event.target.form; // storing the form
        swal({
          text: "QTY Order Belum Sesuai !",
          title: "Apakah Anda Yakin Tetap Submit?",
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
          storePackingList(0)         // submitting the form when user press yes
        } else {
          swal("Cancelled", "File imajiner Anda aman :)", "error");
        }
      });
    }else{
      storePackingList(1)
    }
  }

  function storePackingList(is_same_qty) {
    $.ajax({
      data: $('#formStorePackingList').serialize()+"&is_same_qty="+is_same_qty,
      url: '{{ route("packing.storePackingList") }}',           
      type: "post",
      dataType: 'json',
      success: function (data) {   
         location.replace("{{ url('/prd/finishing/packing-list') }}")
      },
      error: function (xhr, status, error) {
        alert(xhr.responseText);
        return false;
      }
    })
    return false;
  }

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#total_breakdown, #qty_percent,#wo").keyup(function() {
            var qty_percent  = $("#qty_percent").val();
            var total_breakdown = $("#total_breakdown").val();
            var total = parseInt(qty_percent) * parseInt(total_breakdown)/100;
            var balance = parseInt(total_breakdown) + Math.floor(total) ;
            $("#total").val(balance);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        e.preventDefault(); 
        $("#qty_percent,#wo").keyup(function() {
            var action  = $("#action :selected").text(); 
            if (action = 'PERFORMA PACKING LIST') {
                var qty_percent  = parseInt($("#qty_percent").val());
                var qty2 = parseInt($("#qty2").val());
                if (isNaN(qty2)) {
                    qty2 = 0;
                }
                var total = parseInt(qty_percent) * parseInt(qty2)/100;
                var balance2 = parseInt(qty2) + Math.floor(total) ; 
                $("#total_breakdown").val(balance2);
            }else{
                var qty_percent2  = $("#qty_percent2").val();
                var qty2 = $("#qty2").val();
                var total = parseInt(qty_percent2) * parseInt(qty2)/100;
                var balance2 = parseInt(qty2) + Math.floor(total) ; 
                $("#qty2").val(balance2);
            }
        });
    });
</script>
@endpush