@extends("layouts.app")
@section("title","AQL LIST")
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
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.thead2.css')}}">
@endpush

@section("content")
<section class="content storageDoc aql">
  <div class="container-fluid pb-5">
    <div class="row" id="project">
      <div class="col-12">
        <img src="{{url('images/icon/qc/aql/aql_list.svg')}}" class="aql-bg">
      </div>
      <a href="{{ route('aql.list')}}" class="col-md-2 cardZ" draggable="true">
        <div class="cardFlat hover active p-3 mt-2">
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
      <a href="{{ route('aql.perhitungan')}}" class="col-md-2 cardZ" draggable="true">
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
      <a href="{{ route('aql.check')}}" class="col-md-2 cardZ" draggable="true">
        <div class="cardFlat hover p-3 mt-2">
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
        <div class="cards-part mt-3">
          <div class="cards-head">
            <div class="justify-sb3">
              <div class="title-24-grey no-wrap">MIYAMORI AQL LIST</div>
              <div class="containerSearch">
                <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
              </div>
            </div>
          </div>
          <div class="cards-body">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 table-border table-bg tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th class="text-center bg-thead2 pdt-tbl2" rowspan="3">
                            <div>マツオカ契約番号</div>
                            <div class="mt-2">Matsuoka CTRA NO</div>
                        </th>
                        <th class="text-center bg-thead2 pdt-tbl2" rowspan="3">
                            <div>マツ</div>
                            <div class="mt-2">Style NO</div>
                        </th>
                        <th class="text-center bg-thead2 pdt-tbl2" rowspan="3">
                            <div>宮森MNO</div>
                            <div class="mt-2">Miyamori  MNO</div>
                        </th>
                        <th class="text-center">色</th>
                        <th class="text-center" colspan="8">サイズ別数量</th>
                        <th class="text-center">合計数量</th>
                        <th class="text-center">納納期</th>
                        <th class="text-center">スタイル内容</th>
                        <th class="text-center">刺繍の有無し</th>
                        <th class="text-center">色</th>
                        <th class="text-center" colspan="8">初期サンプルサイズ別数量</th>
                        <th class="text-center">合計数量</th>
                        <th class="text-center">色</th>
                        <th class="text-center" colspan="8">初期見本除外後船積み必要数量</th>
                        <th class="text-center">合計数量</th>
                      </tr>
                      <tr class="bg-thead2">
                        <th class="text-center pdt-tbl" rowspan="2">color</th>
                        <th class="text-center">110</th>
                        <th class="text-center">120</th>
                        <th class="text-center">130</th>
                        <th class="text-center">140</th>
                        <th class="text-center">150</th>
                        <th class="text-center">160</th>
                        <th class="text-center">170</th>
                        <th class="text-center">180</th>
                        <th class="text-center pdt-tbl" rowspan="2">Total Quantity</th>
                        <th class="text-center pdt-tbl" rowspan="2">Delivery date to Three T</th>
                        <th class="text-center pdt-tbl" rowspan="2">Style Details</th>
                        <th class="text-center pdt-tbl" rowspan="2">embro have(●）or not（✖）</th>
                        <th class="text-center pdt-tbl" rowspan="2">Color</th>
                        <th class="text-center">110</th>
                        <th class="text-center">120</th>
                        <th class="text-center">130</th>
                        <th class="text-center">140</th>
                        <th class="text-center">150</th>
                        <th class="text-center">160</th>
                        <th class="text-center">170</th>
                        <th class="text-center">180</th>
                        <th class="text-center pdt-tbl" rowspan="2">Total Quantity</th>
                        <th class="text-center pdt-tbl" rowspan="2">Color</th>
                        <th class="text-center">110</th>
                        <th class="text-center">120</th>
                        <th class="text-center">130</th>
                        <th class="text-center">140</th>
                        <th class="text-center">150</th>
                        <th class="text-center">160</th>
                        <th class="text-center">170</th>
                        <th class="text-center">180</th>
                        <th class="text-center pdt-tbl" rowspan="2">Total Quantity</th>
                      </tr>
                      <tr class="bg-thead2">
                        <th>SS</th>
                        <th>S</th>
                        <th>M</th>
                        <th>L</th>
                        <th>O</th>
                        <th>XO</th>
                        <th>YO</th>
                        <th>ZO</th>
                        <th>SS</th>
                        <th>S</th>
                        <th>M</th>
                        <th>L</th>
                        <th>O</th>
                        <th>XO</th>
                        <th>YO</th>
                        <th>ZO</th>
                        <th>SS</th>
                        <th>S</th>
                        <th>M</th>
                        <th>L</th>
                        <th>O</th>
                        <th>XO</th>
                        <th>YO</th>
                        <th>ZO</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>G22M6001</td>
                            <td>ATA-850.</td>
                            <td>M01217</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>1</td>
                            <td>221118</td>
                            <td>HP</td>
                            <td>YES</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>G22M6001</td>
                            <td>ATA-850.</td>
                            <td>M01217</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>1</td>
                            <td>221118</td>
                            <td>HP</td>
                            <td>YES</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>G22M6001</td>
                            <td>ATA-850.</td>
                            <td>M01217</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>1</td>
                            <td>221118</td>
                            <td>HP</td>
                            <td>YES</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>G22M6001</td>
                            <td>ATA-850.</td>
                            <td>M01217</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>1</td>
                            <td>221118</td>
                            <td>HP</td>
                            <td>YES</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
                            <td>IN</td>
                            <td>2</td>
                            <td>21</td>
                            <td>7</td>
                            <td>11</td>
                            <td>2</td>
                            <td>62</td>
                            <td>21</td>
                            <td>20</td>
                            <td>30</td>
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
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>

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

  $('#showDate').datetimepicker({
    format: 'YYYY',
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
@endpush