@extends("layouts.app")
@section("title","Request Issue IR")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
<style>
  .nav-tabs {
      border-bottom: none !important
  }
</style>
<section class="content">
  <div class="container-fluid warehouseIR">
    <div class="row">
      <div class="col-12">
        <div class="cards3">
          <ul class="nav nav-tabs blue-md-tabs2" id="myTab" role="tablist" style="justify-content: start !important">
            <li class="nav-item-show">
              <a class="nav-link active" data-toggle="tab" href="#requestIssue" role="tab"></i>Request Issue</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#issueDone" role="tab"></i>Issue Done</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12 mt-3">
        <div class="tab-content card-block">
          <div class="tab-pane active" id="requestIssue" role="tabpanel">
            @include('warehouse.requestIR.partials.requestIssue')
          </div>
          <div class="tab-pane" id="issueDone" role="tabpanel">
            @include('warehouse.requestIR.partials.issueDone')
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('warehouse.requestIR.partials.searchForm')
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $(document).ready(function() {
    let dtpending=GetURLParameter('dtpending');
    $('#filter_request_issue').val(dtpending);
    let dtdone=GetURLParameter('dtdone');
    $('#filter_done_issue').val(dtdone);

    $('[data-toggle="popover"]').popover();

    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'Bfrtp',
      "buttons": [ "excel", "pdf" ],
      fixedColumns:   {
          left: 0,
          right: 1
      },
    });

    var table = $('#DTtableIssue').DataTable({
        "pageLength": 10,
        dom: 'B',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
            left: 0,
            right: 1
        },
    });

    $('#btnIssueExcel').click(function(){
      $("#tbIssue .buttons-excel").click();
    })

    $('#btnIssuePdf').click(function(){
      $("#tbIssue .buttons-pdf").click();
    })

    var table = $('#DTtableDone').DataTable({
        "pageLength": 10,
        dom: 'B',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
            left: 0,
            right: 1
        },
    });

    $('#btnDoneExcel').click(function(){
      $("#tbDone .buttons-excel").click();
    })

    $('#btnDonePdf').click(function(){
      $("#tbDone .buttons-pdf").click();
    })
  });

  // $('.select2bs4').select2({
  //   theme: 'bootstrap4'
  // })

  $('#showDate').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#showDateDone').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })

  $("#showDate").on("change.datetimepicker", ({date, oldDate}) => {
    if (oldDate) {
      // console.log("New date", date);
      // console.log("Old date", oldDate);
      filter_url();
    }
  })
  $("#showDateDone").on("change.datetimepicker", ({date, oldDate}) => {
    if (oldDate) {
      filter_url();
    }
  })

  function GetURLParameter(sParam){
      var sPageURL = window.location.search.substring(1);
      var sURLVariables = sPageURL.split('&');
      for (var i = 0; i < sURLVariables.length; i++) 
      {
          var sParameterName = sURLVariables[i].split('=');
          if (sParameterName[0] == sParam) 
          {
              return sParameterName[1];
          }
      }
  }

  function filter_url(){
    url="{{route('Warehouse.requestIR.index')}}";
    url+="?";
    dt_pending=$('#filter_request_issue').val();
    if (dt_pending!=='') {
      url+='&dtpending='+dt_pending;
    }

    dt_done=$('#filter_done_issue').val();
    if (dt_done!=='') {
      url+='&dtdone='+dt_done;
    }
    window.location=url;
  }

  // Jika uom nya sama 
  function add_row(event,id,item,qty,uom,uom_need,branch){
    event.stopPropagation();
    // console.log(uom_need);
    form_search_show(id,item,qty,uom,uom_need,branch);
  }

  function get_stok_available() {
    let item=$('#sc_item').val();
    let branch=$('#sc_to_branch').val();
    branch=branch.replace(/\s/g, '');
    var url = "http://10.8.0.108/jdeapi/public/api/stock_available/item=?item="+item+"&branch="+branch;

    if (item=="") {
      alert('Choose Item');
      return ;
    }
    if (branch=="") {
      alert('Choose Branch');
      return ;
    }

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            // alert(JSON.stringify(response));
            show_to_table(response);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
    });
  }

  function show_to_table(data) {
    var tbody = $('#tbSearch').children('tbody');
    var table = tbody.length ? tbody : $('#tbSearch');
    var row = '<tr>'+
                '<input type="hidden" class="mix_id" value="::branch::-::lot::-::loc::" readonly>'+
                '<input type="hidden" name="from_branch[]" value="::branch::" readonly>'+
                '<input type="hidden" name="from_lot[]" value="::lot::" readonly>'+
                '<input type="hidden" name="from_loc[]" value="::loc::" readonly>'+
                '<input type="hidden" name="from_uom[]" value="::uom::" readonly>'+
                '<td class="pt-3">::branch::</td>'+
                '<td class="pt-3">::lot::</td>'+
                '<td class="pt-3">::loc::</td>'+
                '<td class="pt-3">::last_receipt::</td>'+
                '<td class="pt-3">::uom::</td>'+
                '<td width="150px"><input type="text" class="form-control borderInput sc_qty_stok" value="::qty::" readonly></td>'+
                '<td width="150px"><input type="text" class="form-control borderInput sc_qty_pick" name="from_qty[]" ></td>'+
                '<td width="150px"><input type="text" class="form-control borderInput sc_qty_bal" readonly></td>'+
              '</tr>';


    //Add row
    var uom=$("#sc_uom").val();
    // console.log(uom);
    var data_exists=false;
    for(var k in data) {
      if (check_exists(data[k]['F41021_MCU'],data[k]['F41021_LOTN'],data[k]['F41021_LOCN'])==false) {
        table.append(row.compose({
          'branch': data[k]['F41021_MCU'],
          'lot': data[k]['F41021_LOTN'],
          'loc': data[k]['F41021_LOCN'],
          'last_receipt': parseDate(data[k]['F41021_LRCJ']),
          'uom': uom,
          'qty': data[k]['F41021_PQOH']
        }));
      }
      data_exists=true;
    }

    if (data_exists==false) {
      alert('Stock not found');
    }
  }
  
  function parseDate(input) {
    var d = new moment(input, "YYYYMMDD").format('YYYY-MM-DD');
    return d;
  }

  function check_exists(br,lot,loc) {
    let new_id=br+'-'+lot+'-'+loc;
    let mix_id=$(`.mix_id`);
    for(let i=0;i<mix_id.length;i++){
      if (new_id==mix_id.eq(i).val()) {
        return true;
      };
    }
    return false;
  }

  var tombol = 0;
  function form_search_show(id,item,qty,uom,uom_need,branch) {
      init_form();
      $('#frmsearch').modal('show');
      $('#id').val(id);
      $('#sc_item').val(item);
      $('#sc_to_branch').val(branch);
      $('#sc_uom').val(uom);
      $('#sc_uom_need').val(uom_need);
      $('#sc_qty_need').val(qty); 
      tombol++;
      // console.log(tombol);
      if (uom != uom_need && tombol <= 1) {
        $("#convert").addClass("col-md-3").append(`
          <div class="title-sm">Qty. Convert</div>
          <input type="text" class="form-control borderInput" id="sc_qty_convert" name="sc_qty_convert" readonly>
        `);
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      if(uom != uom_need){
        var uom = uom; 
        var uom_need = uom_need; 
        var branch = branch; 
        var item = item; 
        var qty = qty; 
        // console.log(uom_need);
        $.ajax({
        data: {
            item: item,
            uom: uom,
            uom_need:uom_need,
            branch:branch,
            qty:qty
        },
        url: '{{ route("requestIR.qty_convert") }}',           
        type: "post",
        dataType: 'json',    
            success:function(res){      
              $(`#sc_qty_convert`).val(res);
            }
        });
      }
  }

  function init_form() {
    $("#tbSearch tbody tr").remove();
    $('#id').val('');
    $('#sc_item').val('');
    $('#sc_to_branch').val('');
    $('#sc_uom').val('');
    $('#sc_qty_need').val('');
    $('#sc_qty_total_select').val('');
    $('#sc_qty_convert').val('');
    $('#sc_total_bal').val('');
  }

  function del_data(event, id) {
    event.stopPropagation();
    if(!confirm("Delete Data ?")) {
      return false;
    }
    url="{{route('Warehouse.requestIR.delete',':id')}}";
    url=url.replace(':id',id)
    window.location.replace(url);
  }

  // Define the element we wish to bind to.
  var bind_to = '.sc_qty_pick';
  // Prevent double-binding.
  $(document.body).off('change', bind_to);
  $(document.body).on('change keyup', bind_to, function(event) {
    calculate();
  });

  function validateMyForm() {
    let qty_pick=$(`.sc_qty_pick`);
    let qty_need=parseFloat($(`#sc_qty_need`).val());
    let qty_need_conv= parseFloat($(`#sc_qty_convert`).val());
    if (isNaN(qty_need_conv)) {
      qty_need_conv=qty_need;
    }

    if (qty_pick.length==0) {
      alert('No item selected');
      return false;
    }

    let qty_bal=$(`.sc_qty_bal`);
    for(let i=0;i<qty_pick.length;i++){
      if (parseFloat(qty_bal.eq(i).val())<0) {
        alert('Cannot over qty stock');
        return false;
      };
    }
    if ($(`#sc_qty_total_select`).val()=='' || parseFloat($(`#sc_qty_total_select`).val())==0) {
        alert('Qty not selected');
        return false;
    };
    // if ($(`#sc_qty_convert`).val()=='' || parseFloat($(`#sc_qty_convert`).val())==0) {
    //     alert('Qty not selected');
    //     return false;
    // };
    if (qty_need_conv=='' || parseFloat(qty_need_conv)==0) {
        alert('Qty convert not available');
        return false;
    };
    if ($(`#sc_qty_total_select`).val()>qty_need_conv) {
        alert('Total Qty Selected over Needed');
        return false;
    };

    $(`#frmSubmitStock`).submit();
  }

  function calculate() {
    let qty_need=parseFloat($(`#sc_qty_need`).val());
    let qty_need_conv= parseFloat($(`#sc_qty_convert`).val());
    if (isNaN(qty_need_conv)) {
      qty_need_conv=qty_need;
    }

    let qty_stok=$(`.sc_qty_stok`);
    let qty_pick=$(`.sc_qty_pick`);
    let qty_bal=$(`.sc_qty_bal`);
    let total_pick=0;

    for(let i=0;i<qty_pick.length;i++){
      let q_stok=(qty_stok.eq(i).val()=="")?0:qty_stok.eq(i).val();
      let q_pick=(qty_pick.eq(i).val()=="")?0:qty_pick.eq(i).val();
      let remain=parseFloat(q_stok)-parseFloat(q_pick);
      qty_bal.eq(i).val(remain);

      total_pick+=parseFloat(q_pick);
    }
    // console.log(total_pick);
    let total_bal=qty_need_conv-total_pick;
    $(`#sc_qty_total_select`).val(total_pick);
    $(`#sc_total_bal`).val(total_bal);
  }

  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
      title: "Are You Sure..?",
      text: "Permanently delete this asset data.",
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
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Cancel", "Data has been saved", "error");
        }
    }); 
  });


//Compose template string
String.prototype.compose = (function (){
    var re = /\::(.+?)\::/g;
    return function (o){
        return this.replace(re, function (_, k){
            return typeof o[k] != 'undefined' ? o[k] : '';
        });
    }
}());

</script>

<script>
  const accordionItems = document.querySelectorAll('.accordionItems.Done')

  accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordionHeaders')
    accordionHeader.addEventListener('click', (e) =>{
      const openItem = document.querySelector('.accordion-open')
      toggleItem(item)
      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
    
  })

  const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.accordionContents')
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
