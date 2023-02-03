@extends("layouts.app")
@section("title","CHECK BY MY SELF")
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
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
@endpush

@section("content")
<section class="content storageDoc aql">
  <div class="container-fluid pb-5">
    <div class="row" id="project">
      <div class="col-12">
        <img src="{{url('images/icon/qc/aql/aql_list.svg')}}" class="aql-bg">
      </div>
      <a href="{{ route('aql.list')}}" class="col-lg-2 col-md-3 cardZ" draggable="true">
        <div class="cardFlat hover p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-file-contract"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">AQL</div>
          <div class="title-12-grey mt-1">120 Contract</div>
        </div>
      </a>
      <a href="{{ route('aql.perhitungan')}}" class="col-lg-2 col-md-3 cardZ" draggable="true">
        <div class="cardFlat hover p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-calculator"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">PERHITUNGAN AQL</div>
          <div class="title-12-grey mt-1">Standard For Shipping</div>
        </div>
      </a>
      <a href="{{ route('aql.check')}}" class="col-lg-2 col-md-3 cardZ" draggable="true">
        <div class="cardFlat hover active p-3 mt-2">
          <div class="containerDoc mb-3">
            <div class="containerIcon">
              <i class="fas fa-file-alt"></i>
            </div>
            <div class="dragButton">
              <i class="fs-16 fas fa-ellipsis-v"></i>
            </div>
          </div>
          <div class="title-16-dark3">CHECK BY MY SELF</div>
          <div class="title-12-grey mt-1">Inspection Report</div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12">
        <ul class="nav nav-tabs blue-md-tabs3" role="tablist" style="margin-bottom:-1px;z-index:99">
          <li class="nav-item-show">
            <a class="nav-link active" data-toggle="tab" href="#create" role="tab"></i>CREATE INSPECTION REPORT</a>
            <div class="blue-slide3"></div>
          </li>
          <li class="nav-item-show">
            <a class="nav-link" data-toggle="tab" href="#report" role="tab"></i>INSPECTION REPORT</a>
            <div class="blue-slide3"></div>
          </li>
        </ul>
        <div class="tab-content card-block">
          <div class="tab-pane active" id="create" role="tabpanel">
            @include('qc.aql_miyamori.partials.create_inspect')
          </div>
          <div class="tab-pane" id="report" role="tabpanel">
            @include('qc.aql_miyamori.partials.inspect_report')
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
            left: 3
        },
    });
  });

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('#DTtable_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
        "pageLength": 10,
        dom: 'frtp',
        fixedColumns:   {
            left: 3
        },
    });
  });

  const search2 = document.getElementById('DTtableSearch2')
  search2.addEventListener('keyup', function(evt){
    const searchInput2 = document.querySelector('#DTtable2_filter').querySelector('input')
    searchInput2.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput2.dispatchEvent(e);
  });

  $('#showDate').datetimepicker({
    format: 'YYYY',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush