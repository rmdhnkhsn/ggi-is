@extends("layouts.app")
@section("title","Budgeting Plan")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
  @include('acc_fin.budgeting.layouts.navbar')
@endpush

@section("content")
<style>
  .blue-md-tabs2 .nav-'ok'-show {
    border: none !important;
  }
  .nav-tabs {
    border-bottom: 1px solid #f2f2f2
  }
</style>

<section class="content position-relative">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-wallet"></i>
          </div>
          <div class="title-14-dark my-2">Budget September</div>
          <div class="title-24-600-dark">$2.000</div>
          <div class="title-14-dark my-2"><span class="text-hijau title-16 mr-1">$500</span> Tersisa</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
          <div class="title-14-dark my-2">Plan Budget</div>
          <div class="title-24-600-dark">$5.000.000</div>
          <div class="title-14-dark my-2"><span class="text-hijau title-16 mr-1">$1.200.000</span> Actual Budget</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="title-14-dark my-2">Balance</div>
          <div class="title-24-600-dark text-hijau">$300.000</div>
          <div class="title-14-dark my-2">Selisih Budget</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="flex gap-3">
            <div class="icons2-sm">
              <i class="far fa-building"></i>
            </div>
            <div class="title-14-dark-500 text-truncate">Anggaran terpakai (Aktual)</div>
          </div>
          <div class="borderlight3 my-2"></div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">425.000</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">425.000</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">425.000</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">425.000</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards3" style="margin-bottom:-1px">
          <ul class="nav nav-tabs blue-md-tabs2 justify-start" role="tablist">
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.monitoring')}}" class="nav-link"></i>Monitoring Account</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.daily')}}" class="nav-link"></i>Budget Daily</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.limit')}}" class="nav-link"></i>Budget Limit</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.plan')}}" class="nav-link active"></i>Budget Plan</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <div class="cardPart">
          <div class="cardHead p-4">
            <div class="title-24-grey no-wrap">Budget Plan</div>
          </div>
          <div class="section"></div>
          <div class="cardBody warehouseIR p-3">
            <form action="{{route('acc.store.plan')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="cardFlat p-3">
                <div class="row">
                  <div class="col-md-3">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control borderInput tanggal" onchange="deskripsi_debit(this);" name="tanggal[]" value="" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">No Account</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                      </div>
                      <select class="form-control borderInput pointer AccountDebit" onchange="deskripsi_debit(this);" id="" name="no_account[]" required>
                        <option value="" selected></option>  
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="title-sm">Account Description</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 account dailyItem"name="desc_account[]" value="" placeholder="Description" readonly>
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Budget <span class="fw-500">1201</span></div>
                    <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1201[]" value="" placeholder="Input Budget">
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Budget <span class="fw-500">1204</span></div>
                    <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1204[]" value="" placeholder="Input Budget">
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Budget <span class="fw-500">1205</span></div>
                    <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1205[]" value="" placeholder="Input Budget">
                  </div>
                  <div class="col-md-3">
                    <div class="title-sm">Budget <span class="fw-500">1206</span></div>
                    <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1206[]" value="" placeholder="Input Budget">
                  </div>
                </div>
              </div>
              <div id="newRow"></div>
              <div class="justify-end gap-4">
                <button type="button" class="btn-yellow-md w-160" id="addRow">Add More Plan</button>
                <button type="submit" class="btn-blue-md w-160">Save Plan</button>
              </div>
            </form>
          </div>
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
        html +='<input type="date" class="form-control borderInput tanggal" onchange="deskripsi_debit(this);" name="tanggal[]" value="" required>';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">No Account</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>';
        html +='</div>';
        html +='<select class="form-control borderInput  pointer AccountDebit" onchange="deskripsi_debit(this);" id="" name="no_account[]" required>';
        html +='<option value="" selected></option>';
        html +='</select>';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-6">';
        html +='<div class="title-sm">Account Description</div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3 account dailyItem" name="desc_account[]" value="" placeholder="Description" readonly>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1201</span></div>';
        html +='<input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1201[]" value="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1204</span></div>';
        html +='<input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1204[]" value="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1205</span></div>';
        html +='<input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1205[]" value="" placeholder="Input Budget">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Budget <span class="fw-500">1206</span></div>';
        html +='<input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" name="budget_1206[]" value="" placeholder="Input Budget">';
        html +='</div>';
        html +='</div>';
        html +='<button id="removeRow" type="button" class="removeRow"><i class="fas fa-times"></i></button>'; 
        html +='</div>';
    $('#newRow').append(html);
    loadData()
  });

  //   remove row
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
  });
</script>
<script>

    $( document ).ready(function() {
      loadData()
    });

  let loadData = ()=>{
      $('.AccountDebit').select2({
        theme: 'bootstrap4',
        placeholder:'Select Account',
        searchInputPlaceholder: 'search',
        data:<?php echo json_encode($account_debit); ?>
      });
  }

  function deskripsi_debit(elem) {
    let count = 0;
    let item = document.getElementsByClassName('dailyItem');
    Array.from(item).forEach((i)=> {
      let data = {
        Date : $(i).closest('.row').find('.tanggal').val(),
        AccountDebit : $(i).closest('.row').find('.AccountDebit').val()
      }
      if (data.Date !== '' && data.AccountDebit !== '') {
          if ( data.Date === $(elem).closest('.row').find('.tanggal').val() && data.AccountDebit === $(elem).closest('.row').find('.AccountDebit').val()) {
            if( count > 0 ) {
              $(elem).closest('.row').find('.tanggal').val('')
              $(elem).closest('.row').find('.AccountDebit').val('')
              alert('data sudah ada')
            } 
            count++
          }
      }
    })

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

  //toast
    $('#liveToast').toast('show');
    // $('#liveToast').toast(options)
  //end toas
</script>
@endpush