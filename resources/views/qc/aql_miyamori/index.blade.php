@extends("layouts.app")
@section("title","AQL MIYAMORI")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content storageDoc aql">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardFlat mb-4 p-4" style="z-index: 9;">
          <div class="justify-sb3">
            <div class="text mb-3">
              <div class="title-32-grey">Upload AQL Document</div> 
              <div class="title-14-dark mt-3">Silahkan upload file <span class="text-biru fw-500">document AQL Buyer</span> dengan format yang telah ditentukan.<br/><span class="text-biru fw-500">Hapus Baris Total</span> pada data yang akan di upload, Belum punya template..? </div>
              <a href="" class="badge-softGreen-sm br-8 gap-2 py-1 mt-2"><i class="text-hijau fs-18 fas fa-file-excel"></i><span class="fw-500">Download Template</span></a> 
            </div>
            <div class="uploadStorage">
              <form class="container-storage" action="#">
                <input class="file-input" type="file" name="file" id="imgInp" hidden>
                <i class="fas fa-cloud-upload-alt"></i> 
                <div class="title-12-grey text-center"><span class="fw-500">Click disini</span> untuk memilih dokumen <br/>file yang diizinkan hanya <span class="fw-500">excel</span></div>
              </form>
            </div>
          </div>
        </div>
        @include('qc.aql_miyamori.partials.upload')
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards-part relative zIndex mt-3">
          <div class="cards-head">
            <div class="justify-sb">
              <div class="title-24-blue title-none no-wrap mt-1">DATA AQL</div>
              <div class="flexx gap-3">
                <div class="justify-center dateWidth">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput" data-target="#showDate" placeholder="Select Month"/>
                  </div>
                </div>
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-body">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th>NO</th>
                        <th>ID</th>
                        <th>TANGGAL</th>
                        <th>BUYER</th>
                        <th>ORDER</th>
                        <th>TOTAL KONTRAK</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>220315</td>
                        <td>02 January 2022</td>
                        <td>Andri Sugandi</td>
                        <td>1ST</td>
                        <td>20</td>
                        <td>
                          <div class="container-tbl-btn flex gap-2">
                            <a href="{{ route('aql.list')}}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></a>
                            <a href="" class="btn-icon-pink deleteFile"><i class="fs-18 fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>220315</td>
                        <td>02 January 2022</td>
                        <td>Andri Sugandi</td>
                        <td>2ND</td>
                        <td>20</td>
                        <td>
                          <div class="container-tbl-btn flex gap-2">
                            <a href="{{ route('aql.list')}}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></a>
                            <a href="" class="btn-icon-pink deleteFile"><i class="fs-18 fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    </tbody> 
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="{{url('images/icon/qc/aql/bg2.svg')}}" class="bg">
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Yakin..?",
        text: "Setelah mengkonfirmasi, data ini akan hilang secara permanent",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4343",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;
          swal("Document Deleted", "Berhasil", "success");        // submitting the form when user press yes
        } else {
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });

  $('#upload').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Berhasil',
      text: 'Data telah ditambahkan kedalam database',
      buttons: false,
      timer: 1500
    })
  });

  $('#updateDoc').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Document Updated',
      text: 'Document berhasil di perbaharui',
      buttons: false,
      timer: 1500
    })
  });

  $('#imgInp').change(function(){
      $('#uploadDoc').modal('show');
  });

  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'frtp',
        fixedColumns:   {
            left: 0,
            right: 1
        },
    });
  });

  $('#showDate').datetimepicker({
    format: 'MMMM',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('.dataTables_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });
</script>

<script>
  const form = document.querySelector(".container-storage"),      
  fileInput = document.querySelector(".file-input"),
  progressArea = document.querySelector(".progress-area"),
  uploadedArea = document.querySelector(".uploaded-area");

  form.addEventListener("click", () =>{
    fileInput.click();
  });

  fileInput.onchange = ({target})=>{
    let file = target.files[0];
    if(file){
      let fileName = file.name;
      if(fileName.length >= 12){
        let splitName = fileName.split('.');
        // fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
      }
      uploadFile(fileName);
    }
  }

  function uploadFile(name){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/upload.php");
    xhr.upload.addEventListener("progress", ({loaded, total}) =>{
      let fileLoaded = Math.floor((loaded / total) * 100);
      let fileTotal = Math.floor(total / 1000);
      let fileSize;
      (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
      let progressHTML = `<div class="row" id="inputFile">
                            <div class="flex">
                              <div class="containerIcon">
                                <i class="fas fa-file-archive"></i>
                              </div>
                              <div class="content">
                                <div class="details">
                                  <div class="name">${name}</div>
                                </div>
                                <div class="progress-bar">
                                  <div class="progress" style="width: ${fileLoaded}%"></div>
                                </div>
                              </div>
                            </div>
                            <div class="percentage">${fileLoaded}%</div>
                          </div>`;
      uploadedArea.classList.add("onprogress");
      progressArea.innerHTML = progressHTML;
      if(loaded == total){
        progressArea.innerHTML = "";
        let uploadedHTML = `<div class="row" id="inputFile">
                              <div class="content upload">
                                <div class="containerIcon">
                                  <i class="fas fa-file-archive"></i>
                                </div>
                                <div class="details">
                                  <div class="name">${name}</div>
                                  <div class="size">${fileSize}</div>
                                </div>
                              </div>
                              <i class="fas fa-check"></i>
                            </div>`;
        uploadedArea.classList.remove("onprogress");
        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
      }
    });
    let data = new FormData(form);
    xhr.send(data);
  }

  $(document).on('click', '.removeDoc', function () {
    $(this).closest('#inputFile').remove();
  });

  function remove() {
    var element = document.getElementById("removeHide");
    element.classList.remove("hide");
  }

  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>
@endpush