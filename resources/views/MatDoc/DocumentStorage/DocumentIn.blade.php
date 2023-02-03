@extends("layouts.app")
@section("title","Document Storage In")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content storageDoc">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardFlat mb-4 p-4" style="z-index: 9;">
          <div class="justify-sb3">
            <div class="text">
              <div class="title-32-grey">Upload Center</div>
              <div class="title-14-dark mt-3">Pilih file kamu untuk memulai proses upload <br/>Jangan lupa menambahkan deskripsi file kamu ya.</div>
            </div>
            <div class="uploadStorage">
              <form class="container-storage" action="#">
                <input class="file-input" type="file" name="file" id="imgInp" hidden>
                <i class="fas fa-cloud-upload-alt"></i> 
                <div class="title-12-grey text-center"><span class="fw-500">Click for choose</span> your document here. <br/>PDF, EXCEL, JPG, PNG</div>
              </form>
            </div>
          </div>
        </div>
        @include('MatDoc.DocumentStorage.partials.DocIn.upload')
      </div>
    </div>
    <div class="row" id="project">
      <div class="col-12">
        <div class="title-24-dark2">Documents</div>
        <img src="{{url('images/icon/matdoc/documentStorage/giscloud.svg')}}" class="giscloudImg">
      </div>
      <a href="{{ route('documentStorage.in')}}" class="col-md-2 cardZ" draggable="true">
        <div class="cardFlat hover active p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-file-download"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">Document IN</div>
          <div class="title-12-grey mt-1">230 Files</div>
        </div>
      </a>
      <a href="{{ route('documentStorage.out')}}" class="col-md-2 cardZ" draggable="true">
        <div class="cardFlat hover p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-file-upload"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">Document OUT</div>
          <div class="title-12-grey mt-1">15 Files</div>
        </div>
      </a>
      <a href="{{ route('documentStorage.other')}}" class="col-md-2 cardZ" draggable="true">
        <div class="cardFlat hover p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-file-alt"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">Document Other</div>
          <div class="title-12-grey mt-1">25 Files</div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cardPart mt-3">
          <div class="cardHead">
            <div class="joblist-date p-3">
              <div class="title-24-grey no-wrap">Documents Files</div>
              <div class="margin-date flexx gap-3">
                <div class="justify-center dateWidth">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput" data-target="#showDate" placeholder="Select Year"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                @include('MatDoc.DocumentStorage.partials.DocIn.radioFilter')
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th>NO</th>
                        <th>NO CONTRACT</th>
                        <th>DATE</th>
                        <th>UPLOADER</th>
                        <th>TYPE</th>
                        <th width="10px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>95715328</td>
                        <td>02 January 2022</td>
                        <td>Andri Sugandi</td>
                        <td>
                          <div class="badge-softBlue-sm" style="max-width:150px">
                            <div class="text-truncate">Lorem</div>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu">
                            <button type="button" class="dropdown-item flex" data-toggle="modal" data-target="#editDoc">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-pencil-alt"></i></div>Edit Data 
                            </button>
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-search"></i></div>Preview
                            </button>
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-cloud-download-alt"></i></div>Download
                            </button>
                            <a href="" class="dropdown-item deleteFile" style="color:#FB5B5B">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-trash"></i></div>Delete
                            </a>
                          </div>
                        </td> 
                      </tr>
                      @include('MatDoc.DocumentStorage.partials.DocIn.editDoc')
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
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script type="text/javascript">
    document.addEventListener('dragstart', function(){        
        beingDragged(event);
    });
    document.addEventListener('dragend', function(){
        dragEnd(event);
    });
    document.addEventListener('dragover', function(){
       var beingDragged = document.querySelector(".dragging")
      if (event.target.matches('.cardZ')) {
            if (beingDragged.classList.contains('cardZ')) {
              allowDrop(event);
            }
      }
      if (event.target.matches('.col')) {
        if (beingDragged.classList.contains('cardZ')) {
              colDraggedOver(event);
        }
        if (beingDragged.classList.contains('col')) {
          allowDrop(event);
        }
      }
    });
    function beingDragged(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.add("dragging");
    }
    function dragEnd(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.remove("dragging");
    }
    function allowDrop(ev) {
      ev.preventDefault();
      //var project = document.getElementById('project');
      var dragOver = ev.target;
      var dragOverParent = dragOver.parentElement;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      var project = document.getElementById("project");
      var draggedIndex = whichChild(beingDragged);
      var dragOverIndex = whichChild(dragOver);
      if (draggedParent === dragOverParent) {
        if (draggedIndex < dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged);
        }
        if (draggedIndex > dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged.nextSibling);
        }
      }
      if (draggedParent !== dragOverParent) {
        dragOverParent.insertBefore(beingDragged, dragOver);
      }
    }
    function colDraggedOver(event) {
      var dragOver = event.target;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      if (draggedParent.id !== dragOver.id && draggedParent.classList.contains('col') && dragOver.classList.contains('col')) {
        if (dragOver.childElementCount == 0 || event.clientY > dragOver.children[dragOver.childElementCount - 1].offsetTop) {
          dragOver.appendChild(beingDragged)
        }
      }
      
    }
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    }
    function whichChild(el) {
      var i = 0;
      while ((el = el.previousSibling) != null) ++i;
      return i;
    }
</script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Setelah mengkonfirmasi, data akan secara permanent di hapus",
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

  $('#saveDoc').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Document Saved',
      text: 'Document berhasil disimpan di server',
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
    format: 'YYYY',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
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