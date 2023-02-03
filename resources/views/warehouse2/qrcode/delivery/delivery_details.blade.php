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
@endpush

@push("sidebar")
    @include('warehouse.partials.navbar')
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('delivery-details') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Status Delivery</div>
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
        </div>
      </a>
      <a href="{{ route('receiving-details') }}" class="column-2">
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
      </a>
    </div>
    
    @csrf
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="row">
            <div class="col-12 mt-4">
              <div class="title-24 title-absolute">Material Delivery Details</div>
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap text-left">
                    <thead>
                        <tr>
                            <th>DOC NUMBER</th>
                            <th>ITEM</th>
                            <th>SUPPLIER</th>
                            <th>DOC TYPE</th>
                            <th>DOC CO</th>
                            <th>TRANSACTION DATE</th>
                            <th>BRANCH/PLANT</th>
                            <th>QUANTITY</th>
                            <th>TRANS UOM</th>
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
                    @foreach ($record as $key => $value)
                      @foreach ($value as $key1 => $value1)
                    
                      <tr>
                        {{-- <td>
                          <input type="checkbox" class="check1" id="check{{$value1['F4111_DOCO']}}" value="{{ $value1["F4111_DOCO"] }}" name="doc_number[]">
                          <input type="hidden" id="cek{{$value1['F4111_DOCO']}}" name="cek[]" >
                        </td> --}}
                        <td>
                        <input type="hidden" class="form-control border-input" id="id_ukid" name="id_ukid" value="{{ $value1['F4111_UKID'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                        <input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value1['F4111_DOCO'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                        </td>
                        <td><input type="text" class="form-control" id="item" name="item[]" value="{{ $value1['F4101_DSC2'] }}" style="height:37px; width:240px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly> </td>
                        <td><input type="text" class="form-control" id="item" name="item[]" value="{{ $value1['F0101_ALPH'] }}" style="height:37px; width:240px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly> </td>
                        <td><input type="text" class="form-control border-input" id="doc_type" name="doc_type[]" value="{{ $value1['F4111_DCT'] }}" style="height:37px; padding:0 !important;width:100px; margin:-7px 0; background-color : #fff; border : none;" readonly> </td>
                        <td><input type="text" class="form-control border-input" id="doc_co" name="doc_co[]" value="{{ $value1['F4111_KCO'] }}" style="height:37px; width:130px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="transaction_date" name="transaction_date[]" value="{{ $value1['F4111_TRDJ'] }}" style="height:37px; width:200px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="branch" name="branch[]" value="{{ $value1['F4111_MCU'] }}" style="height:37px; width:170px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        
                        {{-- quantity --}}
                        <td>
                          <input type="hidden" class="pembagi-quantity-{{ $value1["F4111_DOCO"] }}" name="pembagi_{{ $value1["F4111_DOCO"] }}" value="1">
                          <input type="hidden" class="form-control border-input quantity-{{ $value1["F4111_DOCO"] }}" id="qty" name="quantity_{{ $value1["F4111_DOCO"] }}" value="{{ $value1['F4111_TRQT'] }}" style="height:37px; width:250px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                          <a href="javascript:void(0)" class="show-detail-quantity font-weight-bolder" data-doc_number="{{ $value1['F4111_DOCO'] }}" data-quantity="{{ $value1['F4111_TRQT'] }}">{{ $value1['F4111_TRQT'] }}</a>
                        </td>

                        <td><input type="text" class="form-control border-input" id="trans_uom" name="trans_uom[]" value="{{ $value1['F4111_TRUM'] }}" style="height:37px; width:150px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="unit_cost" name="unit_cost[]" value="{{ $value1['F4111_UNCS'] }}" style="height:37px; width:150px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="extended" name="extended[]" value="{{ $value1['F4111_PAID'] }}" style="height:37px; width:150px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="lot_serial" name="lot_serial[]" value="{{ $value1['F4111_LOTN'] }}" style="height:37px; width:300px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="location" name="location[]" value="{{ $value1['F0116_CTY1'] }}" style="height:37px; width:250px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="order_co" name="order_co[]" value="{{ $value1['F4111_KCOO'] }}" style="height:37px; width:170px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="class_code" name="class_code[]" value="{{ $value1['F4111_GLPT'] }}" style="height:37px; width:170px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                        <td><input type="text" class="form-control border-input" id="gl_date" name="gl_date[]" value="{{ $value1['F4111_DGL'] }}" style="height:37px; width:250px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                        {{-- <input type="hidden" class="form-control border-input" id="buyer" name="buyer[]" value="{{ $value1['F0101_ALPH'] }}" style="height:37px; width:250px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly> --}}
                        <input type="hidden" class="form-control border-input" id="ukid" name="ukid[]" value="{{ $value1['F4111_UKID'] }}" style="height:37px; width:250px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                      </td>
                      </tr>
                        <script>
                          $(document).on('click', '#check{{$value1['F4111_DOCO']}}', function(){
                            var status = document.getElementById('check{{ $value1['F4111_DOCO'] }}').value;
                            if(document.getElementById('check{{ $value1['F4111_DOCO'] }}').checked){
                              var result = '1'; 
                              document.getElementById('cek{{$value1['F4111_DOCO'] }}').value = result;
                            }
                            else{
                              var result = null; 
                              document.getElementById('cek{{ $value1['F4111_DOCO'] }}').value = result;
                            }    
                              
                          }); 
                      </script>
                      
                    @endforeach
                    @endforeach
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
  </div>
</section>

<div class="modal fade" id="modalShowDetailQuantity">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
    <div class="modal-content" style="border-radius:10px">
      <form id="formStoreWarehouseStock">
        <input type="hidden" class="doc_number" name="doc_number">
        <div class="modal-body">
          <div class="row">
            <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
              <span class="title-15">Detail Quantity</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
              </button>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-12">
              <span class="title-sm">Total Quantity</span>
              <input type="text" class="form-control total_qty" readonly>
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
              <table class="table table-bordered">
                <thead>
                  <tr>
                  <th>DOC Number</th>
                  <th>NO Box</th>
                  <th>Quantity</th>
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

@endsection

@push("scripts")


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
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
            b.textContent = Swal.getTimerLeft()
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

    doc_number = $(this).data("doc_number")
    quantity = $(this).data("quantity")

    $('.doc_number').val(doc_number)
    $('.total_qty').val(quantity)

    $('#modalShowDetailQuantity').modal('show')
  })

  $('body').on('click', '.show-detail-result-quantity', function () {
    doc_number = $('.doc_number').val()
    pembagi = $('.pembagi').val()

    html = ``
    for (let i = 0; i < pembagi; i++) {
      html += 
        `<tr>
          <td>`+doc_number+`</td>  
          <td><input type="text" name="no_box[]" class="form-control no_box"></td>
          <td><input type="number" name="qty[]" class="form-control qty"></td>
        </tr>`
    }
    $('.list-detail-result-quantity').html(html)
    console.log(html)
    return false

  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('body').on('click', '.store-warehouse-stock', function () {
    var total_qty = $('.total_qty').val()
    var total_input_qty = 0
    $(".qty").each(function (){
      qty = $(this).val()
      total_input_qty += parseFloat(qty);
    });

    console.log([total_qty, total_input_qty])
    if (total_qty != total_input_qty) {
      showErrorAlert()
      return false
    }
     showLoading()
    storeWarehouse()
    return 1 
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
  
</script>
@endpush