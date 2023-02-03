@extends("layouts.app")
@section("title","Delivery Details")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.tablecounter {
    counter-reset: css-counter -1;
}

.tablecounter tr {
    counter-increment: rowNumber;
}

.tablecounter tr td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
@endpush

@push("sidebar")
    @include('warehouse.partials.navbar')
@endpush

@php
$picked_byuser_vendor=$item_picked_byuser->to_desc ?? '';
$po_makloon_vendor=$po_makloon->addressbook->F0101_ALPH??'';
@endphp
@section("content")
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <a href="{{ route('delivery-details') }}" class="column-2 ml-2">
          <div class="cards nav-card bg-card-active h-95 p-3">
            <div class="row">
              <div class="col-12">
                <i class="icons-active fas fa-eject"></i>
              </div>
              <div class="col-12">
                <div class="desc-active">Pick Item</div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('delivery-konfirm') }}" class="column-2">
          <div class="cards nav-card h-95 p-3">
            <div class="row">
              <div class="col-12"> 
                <i class="icons fas fa-box"></i>
              </div>
              <div class="col-12">
                <div class="desc">Confirm Box</div>
              </div>
            </div>
            @if($item_picked_byuser)
              @if($item_picked_byuser->total_item_picked())
                <span class="tabs-badge mr-1" style="top : 6px; right : 10px">{{$item_picked_byuser->total_item_picked()}}</span>
              @endif
            @endif
          </div>
        </a>
        <!-- <a href="{{ route('receiving-details') }}" class="column-2">
          <div class="cards nav-card h-95 p-3">
            <div class="row">
              <div class="col-12">
                <i class="icons rotate180 fas fa-eject"></i>
              </div>
              <div class="col-12">
                <div class="desc">Status Receiving</div>
              </div>
            </div>
          </div>
        </a> -->
      </div>

      <div class="row">
        <a href="javascript:void(0)" class="btn-blue-md store-qr-code ml-3 mb-3"><span class="text-truncate">Search Item Ledger JDE</span></a> 
      </div>

      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="row">
            <div class="col-12 mt-4">
              <div class="title-24 title-absolute">Vendor : {{$item_picked_byuser->to_desc??''}}</div>
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap text-left">
                    <thead>
                        <tr>
                            <th>UKID</th>
                            <th>TRANSACTION DATE</th>
                            <th>SHORT.ITEM</th>
                            <th>DOC NUMBER</th>
                            <th>DESC 1</th>
                            <th>DESC 2</th>
                            <th>QUANTITY</th>
                            <th>TRANS UOM</th>
                            <th>DOC TYPE</th>
                            <th>DOC CO</th>
                            <th>BRANCH/PLANT</th>
                            <th>UNIT COST</th>
                            <th>EXTENDED</th>
                            <th>LOT/SERIAL</th>
                            <th>LOCATION</th>
                            <th>ORDER CO</th>
                            <th>CLASS CODE</th>
                            <th>G/L DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                      {{-- @php
                        dd( $po_makloon_vendor);
                      @endphp --}}
                        @if($picked_byuser_vendor == '' || $picked_byuser_vendor == $po_makloon_vendor)
                          @foreach($itemledger as $v)
                            <tr>
                              <td>{{$v->F4111_UKID}}</td>
                              <td>{{$v->F4111_TRDJ}}</td>
                              <td>{{$v->F4111_ITM}}</td>
                              <td>{{$v->F4111_DOC}}</td>
                              <td>{{$v->item_master->F4101_DSC1}}</td>
                              <td>{{$v->item_master->F4101_DSC2}}</td>

                              <!-- <td>{{$v->F4111_LITM}}</td>
                              <td>{{$v->F4111_LITM}}</td> -->
                              <td>
                                @if($v->subkon_o4_cek())
                                  {{$v->F4111_TRQT}}
                                @else
                                  <a href="javascript:void(0)" class="show-detail-quantity font-weight-bolder" data-ukid="{{$v->F4111_UKID}}" data-barang="{{$v->F4111_ITM}}" data-doc_number="{{$v->F4111_DOCO}}" data-quantity="{{$v->F4111_TRQT}}">{{$v->F4111_TRQT}}</a>
                                @endif
                              </td>
                              <td>{{$v->F4111_TRUM}}</td>
                              <td>{{$v->F4111_DCT}}</td>
                              <td>{{$v->F4111_KCOO}}</td>
                              <td>{{$v->F4111_MCU}}</td>
                              <td>{{$v->F4111_UNCS}}</td>
                              <td>{{$v->F4111_PAID}}</td>
                              <td>{{$v->F4111_LOTN}}</td>
                              <td>{{$v->F4111_LOCN}}</td>
                              <td>{{$v->F4111_KCOO}}</td>
                              <td>{{$v->F4111_GLPT}}</td>
                              <td>{{$v->F4111_DGL}}</td>
                            </tr>
                          @endforeach
                        @endif
                        
                        @if($picked_byuser_vendor !== ''&&$picked_byuser_vendor !== $po_makloon_vendor)
                            <tr>
                              <td>Vendor Different : {{$po_makloon_vendor}}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
              </div>
              <div class="flex mt-3">
                  <button type="submit" class="btn-merah-md" style="opacity:0"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<div class="modal fade" id="modalShowDetailQuantity">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
    <div class="modal-content" style="border-radius:10px">
      <form id="formStoreWarehouseStock">
        @if($po_makloon)
          <input type="hidden" name="id_ukid" id="tx_ukid" value="">
          <input type="hidden" name="no_kontrak" value="{{$po_makloon->F4311_DOCO}}">
          <input type="hidden" name="buyer" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="buyer_address" value="{{$po_makloon->F4311_AN8}}">

          <!-- <input type="hidden" name="item" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="item2" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="tanggal" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="wo" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="doc_type" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="doc_co" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="transaction_date" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="branch" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="trans_uom" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="unit_cost" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="extended" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="lot_serial" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="order_co" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="class_code" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="gl_date" value="{{$po_makloon->addressbook->F0101_ALPH}}"> -->

          <!-- <input type="hidden" name="po_makloon" value="{{$po_makloon->addressbook->F0101_ALPH}}">
          <input type="hidden" name="location" value="{{$po_makloon->addressbook->F0101_ALPH}}">         -->
          <input type="hidden" class="doc_number" name="doc_number">
        @endif
        <div class="modal-body">
          <div class="row">
            <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
              <span class="title-15" id="item_detail_title">Detail Item</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
              </button>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-6">
              <span class="title-sm">Total Quantity</span>
              <input type="text" class="form-control total_qty" readonly>
            </div>
            <div class="col-6">
              <span class="title-sm">Total Input</span>
              <input type="text" class="form-control total_input" readonly>
            </div>
            <div class="col-12">
              <span class="title-sm">Pembagi</span>
              <div class="justify-start" style="gap:.5rem !important">
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                      <span class="input-group-select-icon"><i class="fas fa-file-signature"></i></span>
                  </div>
                  <input type="number" class="form-control border-input pembagi" name="pembagi" placeholder="input pembagi...">
                </div>
                <button class="show-detail-result-quantity btn-green"><i class="fs-18 fas fa-equals"></i></button>
              </div>
            </div>
            <div class="col-12 mt-4">
              <table class="table table-bordered tablecounter" id="tablepackinglist">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Doc.No</th>
                  <th>Box/Roll.No</th>
                  <th>Qty</th>
                </tr>
                </thead>
                <tbody class="list-detail-result-quantity"></tbody>
              </table>

              <button class="btn-blue btn-block store-warehouse-stock" type="button">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalStoreQrCode">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                        <span class="title-15">Search By Subcontract Number</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <span class="title-sm">Number Contract</span>
                        <div class="justify-start" style="gap:.5rem !important">
                          <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-file-signature"></i></span>
                            </div>
                            <input type="text" class="form-control border-input number_contract" name="number_contract" placeholder="input contract number...">
                          </div>
                          <button class="show-delivery-detail btn-green"><i class="fs-18 fas fa-sync-alt"></i></button>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <span class="title-sm">Transaction Date</span>
                        <div class="input-group mt-1 skeleton">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <select name="transaction_date" class="transaction_date form-control border-input"></select>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                      <button class="search-delivery-detail btn-blue btn-block">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("scripts")


<script src="{{asset('common/js/swal/sweetalert2@11.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });

    $('body').on('click', '.store-qr-code', function () {
      $('#modalStoreQrCode').modal('show')
    })

    $('body').on('click', '.show-delivery-detail', function () {
      var number_contract = $('.number_contract').val();
      $(".transaction_date").addClass("skeleton");
      $(".transaction_date").empty();
      $.ajax({
        data: {
          number_contract: number_contract
        },
        url: '{{ route("show-delivery-detail") }}?',         
        type: "get",
        dataType: 'json',            
        success: function (data) {   
          html = ``
          for (let i = 0; i < data.length; i++) {
            html += `<option value="`+data[i].F4111_TRDJ+`">`+data[i].F4111_TRDJ+`</option>`
          }
          $('.transaction_date').html(html)
        },
        complete: function(){
          $(".transaction_date").removeClass("skeleton");
        },
        error: function (xhr, status, error) {
          alert(xhr.responseText);
          
        }
      });
    })

    $('body').on('click', '.search-delivery-detail', function () {
      // showLoading()
      var number_contract = $('.number_contract').val()
      var transaction_date = $('.transaction_date').val()

      // RH DISABLE 
      // $.ajax({
      //   url: '{{ url("/war/material/delivery/verify-valid-buyer") }}/'+number_contract+"/"+transaction_date,           
      //   type: "get",
      //   dataType: 'json',            
      //   success: function (data) {
      //     location.replace("{{ url('/war/material/delivery/delivery-pick') }}?number_contract="+number_contract+"&transaction_date="+transaction_date);
      //   },
      //   error: function (xhr, status, error) {
      //     alert(xhr.responseText);
      //   }
      // });

      location.replace("{{ url('/war/material/delivery/delivery-pick') }}?number_contract="+number_contract+"&transaction_date="+transaction_date);
    })

 
    $('body').on('keyup', '.assigned_qty', function () {
      // alert('naon')
      recalc()
    })
  });

function showErrorAlert(){
    Swal.fire({
        icon: 'error',
        title: 'The Quantity is not the Same',
        showConfirmButton: false,
        timer: 5500
    })
}

function showLoading(){
    let timerInterval
    Swal.fire({
        title: 'Please Wait . . .',
        html: ' ',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            // b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    })
}
  var doc_number
  $('body').on('click', '.show-detail-quantity', function () {
    $('.pembagi').val(0)
    $('.list-detail-resul-quantity').empty()
    $("#tablepackinglist tbody tr").remove();

    doc_number = $(this).data("doc_number")
    quantity = $(this).data("quantity")
    let ukid = $(this).data("ukid")
    let barang = $(this).data("barang")

    $('.doc_number').val(doc_number)
    $('.total_qty').val(quantity)
    $('#tx_ukid').val(ukid)
    $('#item_detail_title').html("Item "+barang)

    $('#modalShowDetailQuantity').modal('show')
  })

  $('body').on('click', '.show-detail-result-quantity', function () {
    doc_number = $('.doc_number').val()
    pembagi = $('.pembagi').val()

    html = ``
    for (let i = 0; i < pembagi; i++) {
      html += 
        `<tr>
          <td></td>  
          <td>`+doc_number+`</td>  
          <td><input type="text" name="no_box[]" class="form-control no_box" value="`+parseInt(i+1)+`"></td>
          <td><input type="number" name="qty[]" class="form-control assigned_qty"></td>
        </tr>`
    }
    $('.list-detail-result-quantity').html(html)
    // console.log(html)
    return false

  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('body').on('click', '.store-warehouse-stock', function () {
    var total_qty = parseFloat($('.total_qty').val())
    var total_input_qty = parseFloat($('.total_input').val())
    // $(".assigned_qty").each(function (){
    //   qty = $(this).val()
    //   total_input_qty += parseFloat(qty);
    // });

    // console.log([total_qty, total_input_qty])
    if (total_qty != total_input_qty) {
      showErrorAlert()
      return false
    }

    storeWarehouse()
  });

  function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }

  function storeWarehouse() {
    showLoading()
    $.ajax({
      data: $('#formStoreWarehouseStock').serialize(),
      url: '{{ route("warehouse-store") }}',           
      type: "post",
      dataType: 'json',            
      success: function (data) {
      swal.close();
      showSuccessAlert()
       location.reload();
      },
      error: function (xhr, status, error) {
        alert(xhr.responseText);
      }
    });  
  }

  function recalc(){
            // var totalinput=$(`#totalinput_${item_id}`);
            var assign=$(`.assigned_qty`);
            var total_assign=0;

            for(let i=0;i<assign.length;i++){
                var qty=(assign.eq(i).val()=="")?0:assign.eq(i).val();
                total_assign+=parseFloat(qty);
            }
            total_assign=Math.round(total_assign * 100) / 100
            $(`.total_input`).val(total_assign);
  }
  
</script>
@endpush