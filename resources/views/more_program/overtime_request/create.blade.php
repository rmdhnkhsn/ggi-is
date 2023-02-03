@extends("layouts.app")
@section("title","Create Request")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <form id="upload" action="{{route('store.request.overtime')}}" onsubmit="return validateMyForm();" method="post" enctype="multipart/form-data">
        @csrf
          <div class="cardFlat p-4">
            <div class="row">
              <div class="col-12">
                <div class="title-20-dark2 text-left mb-2">INFORMASI PENGAJUAN </div>
              </div>
              <div class="col-md-3">
                <div class="title-sm">Tanggal Lembur</div>
                <div class="input-group mt-1 mb-3">
                  <div class="input-group-append">
                    <div class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></div>
                  </div>
                  <input type="date" class="form-control borderInput" name="tanggal" placeholder="Pilih Tanggal" required/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="title-sm">Department</div>
                <div class="input-group mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" for="F0101_ALPH"><i class="fs-20 fas fa-building"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4" id="departemen" name="departemen" style="cursor:pointer" required>
                    <option value="" selected>Pilih Departmen</option>
                      @foreach($approve as $key => $value)
                        <option name="departemen" value="{{$value->id}}">{{$value->dept}}</option>    
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="title-sm">Bagian</div>
                <div class="input-group mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" for="F0101_ALPH"><i class="fs-20 fas fa-briefcase"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4" name="bagian" id="bagian" required="required">
                    <option selected></option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="title-sm">Pilih Kategori Lembur</div>
                <ul class="nav nav-pills gap-3 mt-1" id="kategori_lembur" role="tablist">
                  <li class="nav-item">
                    <a class="btnSoftBlue" data-toggle="pill" id="btnkualitatif" href="#Kualitatif" role="tab">KUALITATIF</a>
                  </li>
                  <li class="nav-item">
                    <a class="btnSoftBlue" data-toggle="pill" id="btnkuantitatif" href="#Kuantitatif" role="tab">KUANTITATIF</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="tab-content">
                <div class="tab-pane fade" id="Kualitatif" role="tabpanel">
                  @include('more_program.overtime_request.partials.kualitatif')
                </div>
                <div class="tab-pane fade" id="Kuantitatif" role="tabpanel">
                  @include('more_program.overtime_request.partials.kuantitatif')
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="cardPart">
                <div class="cardHeads">
                  <div class="justify-sb p-3">
                    <div class="title-24-dark2 no-wrap mt-1">DAFTAR PEKERJA</div>
                    <button class="btn-blue-md" onclick="add_row();"><span class="title-none mr-1">Tambah Pekerja</span><i class="fs-20 object-show fas fa-plus-circle"></i></button>
                  </div>
                </div>
                <div class="sections"></div>
                <div class="cardBody p-3">
                  <div class="row">
                    <div class="col-12">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th></th>
                              <th>NIK</th>
                              <th>NAMA</th>
                              <th>GROUP</th>
                              <th>TARGET PEKERJAAN</th>
                              <th>JAM AWAL</th>
                              <th>JAM AKHIR</th>
                              <th>TOTAL JAM</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <button class="btn-delete-row" onClick="deleteRow(this); return false;"><i class="fs-20 fas fa-times"></i></button>
                              </td>
                              <td><input type="text" class="form-control borderInput livesearch" id="nik" name="nik[]" placeholder="NIK" style="width:120px" onchange="search_pekerja(this);" required></td>
                              <td><input type="text" class="form-control borderInput nama" id="nama" name="nama[]" placeholder="Nama Pekerja" style="width:160px" readonly></td>
                              <td>
                                <input type="hidden" class="form-control borderInput gaji" id="gaji" name="gaji[]" placeholder="gaji" style="width:160px">
                                <input type="text" class="form-control borderInput group" id="group" name="group[]" placeholder="Group" style="width:160px" readonly>
                              </td>
                              <td><input type="text" class="form-control borderInput target_pekerjaan" id="" name="target_pekerjaan[]" placeholder="Masukan Target Pekerjaan" style="width:280px" required></td>
                              <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" placeholder="00.00" style="width:130px" required></td>
                              <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" placeholder="00.00" style="width:130px" required></td>
                              <td><input type="number" step="0.01" min="0.5" class="form-control borderInput" id="" name="rencana_total[]" placeholder="0" style="width:100px" required></td>
                            </tr>
                          </tbody> 
                        </table>
                      </div>
                      <div class="justify-end mt-3">
                        <button type="submit" id="testing" class="btn-blue-md">Simpan <i class="fs-18 ml-3 fas fa-download"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('/js/overtime_request/custom_lib.js')}}"></script>

<script>
  function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
  }
</script>

<script>

  document.getElementById('testing').addEventListener('click', function() {
    const alasan = document.getElementsByClassName('checkalasan');
    Array.from(alasan).forEach(function (element) {
      const status = element.parentElement.nextElementSibling.firstElementChild.firstElementChild.firstElementChild.children[1].value;
      if ( status === '' ) {
        element.style.color = "#FB5B5B";
        element.classList.add("fa-times-circle");
        element.classList.remove("fa-check-circle");
        element.previousElementSibling.textContent = 'Wajib Diisi';
      } else {
        element.style.color = "#00DB76";
        element.previousElementSibling.textContent = '';
        element.classList.remove("fa-times-circle");
        element.classList.add("fa-check-circle");
      }
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 20,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });

    $("#btnkualitatif").on("click", function() {
      // clearKualitatif();

      const hapus = document.getElementsByClassName('hapusRow');
      Array.from(hapus).forEach(function(e) {
     
        e.remove();
      });

      clearKuantitatif();
    });
    $("#btnkuantitatif").on("click", function() {
      const hapus = document.getElementsByClassName('hapusKualitatif');
      Array.from(hapus).forEach(function(e) {
     
        e.remove();
      });

      clearKualitatif();

    });
  });

  function search_pekerja(elem) {
    var get=$(elem).val();
    let nik = get.toUpperCase();
    if (nik!==''||nik!=='undefined') {
      var data=get_pekerja(nik);

      if (!jQuery.isEmptyObject(data)) {
        // alert(JSON.stringify(data.gp_tun));
        $(elem).closest('tr').find('input.nama').val(data.nama);
        $(elem).closest('tr').find('input.group').val(data.group);
        $(elem).closest('tr').find('input.gaji').val(data.gp_tun);
      } else {
        $(elem).closest('tr').find('input.nama').val('');
        $(elem).closest('tr').find('input.group').val('');
        $(elem).closest('tr').find('input.gaji').val('');
      }

    }
  }

  function get_pekerja(nik) {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    data: {
                      ID: nik,
                    },
                    url: '{{ route("overtime.getuser") }}',
                    type: 'POST',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response;
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'KOMPUTER SEDANG OFFLINE';
                            desc = 'Periksa sambungan koneksi anda'
                        } else if (jqXHR.status == 404) {
                            msg = 'NIK Tidak ditemukan';
                            desc = 'Harap Masukan Nomor NIK dengan benar, NIK tidak terdaftar'
                        } else if (jqXHR.status == 500) {
                            msg = 'NIK Tidak ditemukan';
                            desc = 'Harap Masukan Nomor NIK dengan benar, NIK tidak terdaftar'
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'WAKTU HABIS';
                            desc = 'Sistem tidak merespon ketika mencari NIK'
                        } else if (exception === 'abort') {
                            msg = 'PENCARIAN NIK DIBATALKAN';
                            desc = 'Silahkan tulis ulang no NIK';
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
    return return_first;
  }
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
    $('#departemen').change(function(){
      var ID = $(this).val();    
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("bagian.lembur") }}',           
          type: "post",
          dataType: 'json', 
            success:function(res){               
              if(res){
                  $("#bagian").empty();
                  $("#bagian").append('');
                  $.each(res,function(data,bagian){
                      $("#bagian").append('<option value="'+data+'">'+data+'</option>');
                  });
              }else{
                $("#bagin").empty();
              }
            }
          });
      }else{
          $("#bagian").empty();

      }      
    });
</script>

<script>
  
   function search_wo(elem) {
    var wo=$(elem).val();

    if (wo!==''||wo!=='undefined') {
      var data=get_wo(wo);

      if (!jQuery.isEmptyObject(data)) {

        // alert(JSON.stringify(data.gp_tun));
        $(elem).closest('.CariWO').find('input.buyer').val(data.F0101_ALPH);
        $(elem).closest('.CariWO').find('input.item').val(data.F4801_LITM);
      } else {
        $(elem).closest('.CariWO').find('input.buyer').val('');
        $(elem).closest('.CariWO').find('input.item').val('');
      }

    }
  }

  function get_wo(wo) {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var return_first1 = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    data: {
                      ID: wo,
                    },
                    url: '{{ route("overtime.getwo") }}',
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
                            msg = 'WO Tidak ditemukan';
                            desc = 'Harap Masukan Nomor WO dengan benar';
                        } else if (jqXHR.status == 500) {
                            msg = 'WO TIDAK DITEMUKAN';
                            desc = 'Harap Masukan Nomor WO dengan benar';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'WAKTU HABIS';
                            desc = 'Sistem tidak merespon ketika mencari WO';
                        } else if (exception === 'abort') {
                            msg = 'PENCARIAN WO DIBATALKAN';
                            desc = 'Silahkan tulis ulang no WO';
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
    return return_first1;
  }
</script>
<script>
  $('.js-example-basic-single').select2({
  placeholder: 'Select an option'
  });
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
  $('.select2bs4two').select2({
    theme: 'bootstrap4'
  });
</script>

<script>
  function ListBuyer() {
    $('.buyerCoba').select2({
      theme: 'bootstrap4',
      placeholder:'Pilih Buyer',
      searchInputPlaceholder: 'search',
      data:<?php echo json_encode($ListBuyer); ?>
    });

    $('.select2Alt').select2({
      theme: 'bootstrap4',
    });
  }
</script>

<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
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
                showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
               
            }
        })
    }
</script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

@if(Session::has('error'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Pengajuan Gagal',
        text: 'Harap lengkapi data dengan benar'
      })
    }
  </script>
@endif

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.wp-accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.wp-accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.wp-accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

@endpush