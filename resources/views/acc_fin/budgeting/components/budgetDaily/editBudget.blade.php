@extends("layouts.app")
@section("title","Edit Budget")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush

@push("sidebar")
  @include('acc_fin.budgeting.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead p-3">
            <div class="title-24-grey no-wrap">Edit Budget</div>
          </div>
          <div class="section3"></div>

          <form action="{{route('acc.update.plan')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="cardBody warehouseIR p-3">
              @foreach($plan as $key=> $value)
              <div class="cardFlat p-3">
                <input type="hidden" class="form-control borderInput mt-1 mb-3" value="{{$value->id}}" name="id[]" id="" placeholder="Description" readonly>

                <div class="row">
                  <div class="col-md-3">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control borderInput" name="tanggal[]" value="{{$value->tanggal}}" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">No Account</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                      </div>
                      <select class="form-control borderInput pointer select2bs4" onchange="deskripsi_debit(this);" id="" name="no_account[]" required>
                        @foreach($account_debit as $k2=>$v)
                          <option value="{{$v->account}}" {{$value->no_account==$v->account ?'selected':''}}>{{$v->account}}</option>
                        @endforeach  
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Account Description</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 account dailyItem"name="desc_account[]" value="{{$value->desc_account}}" placeholder="Description" readonly>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Branch</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                      </div>
                      <select class="form-control borderInput pointer select2bs4"id="" name="branch[]" required>
                        @foreach($Branch as $k1=>$v1)
                          <option value="{{$v1->kode_jde}}"{{$value->branch==$v1->kode_jde ? 'selected' :''}}>{{$v1->kode_jde}}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Buyer</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                      </div>
                      <select class="form-control borderInput pointer select2bs4" id="" name="buyer[]" required>
                        @foreach($buyer as $k2=>$v2)
                          <option value="{{$v2->F0101_AN8}}" {{$value->id_buyer==$v2->F0101_AN8 ?'selected':''}}>{{$v2->F0101_ALPH}}</option>
                        @endforeach   
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Explanation</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3"name="explanation[]" value="{{$value->explanation}}" placeholder="Explanation">
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Plan Budget</div>
                    <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3"name="plan_budget[]" value="{{$value->plan_budget}}" placeholder="Input Plan Budget" required>
                  </div>
                  <div class="col-md-3">
                  <div class="title-sm">Kurs</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                          <select class="form-control pointer" id="" name="type[]" style="border-radius:10px 0 0 10px">
                              <option {{$value->tipe=='USD'? 'selected':''}} value="USD" >USD</option> 
                              <option {{$value->tipe=='IDR'? 'selected':''}} value="IDR" >IDR</option> 
                          </select>
                      </div>
                      <input type="number" step="0.01" class="form-control borderInput" name="kurs[]" value="{{$value->kurs}}" aria-label="Text input with dropdown button" required>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              <!-- <div id="newRow"></div> -->
              <div class="justify-end gap-4">
                <!-- <button type="button" class="btn-yellow-md w-160" id="addRow">Add More Plan</button> -->
                <button type="submit" class="btn-blue-md w-160">Update Plan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  function deskripsi_debit(elem) {
    let account=$(elem).val();
    if (account!==''||account!=='undefined') {
      var data=get_deskripsi(account);
        if (!jQuery.isEmptyObject(data)) {
          $(elem).closest('.row').find('.account').val(data.deskripsi);
        } 
        else {
          $(elem).closest('.row').find('.account').val('');
        }
    }
  }
  function get_deskripsi(account) {
    $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var deskripsi_debit = function () {
      var lbr = 0;
        $.ajax({
            async: false,
            data: {
              ID: account,
            },
            url: '{{ route("acc.account.desc") }}',
            type: 'POST',
            success: function (response) {
                // alert(JSON.stringify(response));
                lbr = response;
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'KOMPUTER SEDANG OFFLINE';
                    desc = 'Periksa sambungan koneksi anda';
                } else if (jqXHR.status == 404) {
                    msg = 'TIDAK DITEMUKAN';
                    desc = 'internal server error';
                } else if (jqXHR.status == 500) {
                    msg = 'ERORR';
                    desc = 'internal server error';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'WAKTU HABIS';
                    desc = 'Sistem tidak merespon';
                } else if (exception === 'abort') {
                    msg = 'PENCARIANDIBATALKAN';
                    desc = 'Silahkan ulangi';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                Swal.fire({
                    icon: 'error',
                    title: msg,
                    text: desc
                  })
            },
        });
      return lbr;
    }(); 
    return deskripsi_debit;
  }

</script>

<!-- <script>
  $("#addRow").click(function () {
    var html = '';
        html +='<div class="cardFlat p-3" id="inputFormRow">' ;
        html +='<div class="row">';
        html +='<div class="col-md-3">';      
        html +='<div class="title-sm">Date</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>';
        html +='</div>';
        html +='<input type="date" class="form-control borderInput" name="" id="">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">No Account</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>';
        html +='</div>';
        html +='<select class="form-control borderInput select2bs4 pointer" id="" name="" required>';
        html +='<option selected disabled>Select No Account</option>';
        html +='<option name="112345">112345</option>  ';
        html +='<option name="4456789">4456789</option> ';
        html +='</select>';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-6">';
        html +='<div class="title-sm">Account Description</div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Description" readonly>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1201</span></div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1204</span></div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1205</span></div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1206</span></div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Budget">';
        html +='</div>';
        html +='</div>';
        html +='<button id="removeRow" type="button" class="removeRow"><i class="fas fa-times"></i></button>'; 
        html +='</div>';
    $('#newRow').append(html);
  });

  //   remove row
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
  });
</script> -->
@endpush