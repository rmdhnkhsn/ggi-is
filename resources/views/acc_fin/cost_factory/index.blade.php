@extends("layouts.app")
@section("title","Cost Factory")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
@endpush


@section("content")

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards p-4 o-hidden">
              <form id="form-add" action="{{route('accfin.costfactory.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-12 justify-sb2 mb-3">
                  <div class="title-20 text-left">Master Cost Factory</div>
                  <div class="relative nextPrevDate">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="datepicker" class="form-control border-input-10 " readonly name="year" value="" placeholder="Input Date" />
                    </div>
                    <button type="button" class="prev-day change_tanggal_booking" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Previous Year"><i class="fas fa-angle-left "></i></button>
                    <button type="button" class="next-day change_tanggal_booking" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Next Year"><i class="fas fa-angle-right"></i></button>
                  </div>
                </div>     
              </div>
                <div class="row">
                    <div class="col-12">
                        <!-- <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button> -->
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="DTtable" class="table tbl-content no-wrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>FTY</th>
                                    <th>JAN</th>
                                    <th>FEB</th>
                                    <th>MAR</th>
                                    <th>APR</th>
                                    <th>MAY</th>
                                    <th>JUN</th>
                                    <th>JUL</th>
                                    <th>AUG</th>
                                    <th>SEP</th>
                                    <th>OCT</th>
                                    <th>NOV</th>
                                    <th>DEC</th>  
                                </tr>
                            </thead>
                            <tbody id="DTtableBody" class="loading">
                            </tbody>
                          </table>
                        </div>
                        <input type="hidden" id="JmlRow" name="JmlRow" value="0">
                        <div class="flexx gap-8 mt-4">
                          <a href="#" class="btn-outline-blue-md" style="width:400px">Add Cost Factory <i class="fs-18 ml-2 fas fa-plus"></i></a>
                          <div class="input-group flex">
                              <div class="input-group-prepend">
                                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-database"></i></span>
                              </div>
                              <select class="form-control borderInput select2bs4 pointer" id="nama_branch">
                                  <option value="" selected>Pilih Branch</option>
                                  @foreach($dataBranch as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama_branch}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <button type="submit" class="btn-blue-md" id="btnSave" style="width:200px">Save <i class="fs-18 ml-2 fas fa-download"></i></button>
                        </div>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('/common/assets/plugins/CalendarNextPrev.js')}}"></script>
<script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
<script>
	$().ready(function(){
      var table = $('#DTtable').DataTable({
          // scrollX : '100%',
          "pageLength": 15,
          "dom": '<"search"><"top">rt<"bottom"><"clear">'
      });
      $(".dataTables_empty").empty();
	});

  $('#year').datetimepicker({
    format: 'YYYY',
    showButtonPanel: true
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
<script>
    var JmlRow = 0;
    var record_id = 1
    $('#DTtable').on('click', '.btn-delete-row2', function () {
        $(this).closest('tr').remove();
    })
    $('.btn-outline-blue-md').click(function () {
      
       JmlRow++
        var rand = JmlRow;
        record_id =JmlRow
        $("#JmlRow").val(JmlRow)
        var branchName = $("#nama_branch option:selected").text();
        var branchId = $("#nama_branch").val();
        if(branchId == null || branchId == ""){
          swal({
            position: 'center',
            type: 'warning',
            title: 'warning',
            icon: 'warning',
            text: 'Please Choose Branch !!',
            showConfirmButton: false,
            timer: 2500
        })
        return false;
        }
        var branchs = $("input[name='branch_id[]']") 
        for(var i = 0; i < branchs.length; i++){
            var element = branchs[i];
            console.log(element.value)
            if(branchId == element.value){
               swal({
                position: 'center',
                type: 'error',
                title: 'error',
                icon: 'error',
                text: 'Branches Can`t be the same',
                showConfirmButton: false,
                timer: 2500
        })
        return false;
            }
        }
        $('#DTtableBody').append('<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td><input type="hidden" class="form-control borderInput3 container-tbl-btn" name="id[]" id="id'+rand+'" value="0" style="width:210px"><input type="hidden" value="'+branchId+'"  name="branch_id[]" id="branch_id'+rand+'" ><input type="text" class="form-control borderInput3 container-tbl-btn" value="'+branchName+'" readonly name="branch_name[]" id="branch_name'+rand+'" data-record_id="'+rand+'" id="" style="width:180px"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105 jan'+rand+'" name="jan[]" data-record_id="'+rand+'" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105 feb'+rand+'" name="feb[]"  data-record_id="'+rand+'" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="mar[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="apr[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="may[]" id=""><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="jun[]" id=""></td></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="jul[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="aug[]" id=""><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="sep[]" id=""></td></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="oct[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="nov[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="dec[]" id=""><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="created_by[]" id="" value="{{ auth()->user()->nik }}"></td></tr>')
    });

    function make_skeleton() {
      var output = '';
      for (var count = 0; count < 6; count++) {
          output += '<div class="col-4">';
          output += '<div class="ph-item">';
          output += '<div class="ph-col-12">';
          output += '<div class="ph-picture"></div>';
          output += '<div class="ph-row">';
          output += '<div class="ph-col-6 big"></div>';
          output += '<div class="ph-col-4 empty big"></div>';
          output += '<div class="ph-col-12"></div>'
          output += '<div class="ph-col-12"></div>'
          output += '</div>';
          output += '</div>';
          output += '</div>';
          output += '</div>';
      }
      $('.loading').html(output)
  }

    function getDataCost() {
      var year = $("#datepicker").val();
      var url = "{{ route('accfin.costfactory.get', ['year' => 'year']) }}";
      url = url.replace("year",year);
      $.ajax({
        url:url,
        method:"GET",
        success: function(data){
          JmlRow = 0;
          // console.log(data)
          $('#DTtableBody').html("")
          $('.loading').html("")
          for (let index = 0; index < data.length; index++) {
            const element = data[index];
            JmlRow++
            var rand = JmlRow;
            record_id =JmlRow;
            var ids = '<input type="hidden" class="form-control borderInput3 container-tbl-btn" name="id[]" id="id'+rand+'" value="'+element.id+'" style="width:190px">';
            $("#JmlRow").val(JmlRow)
              $('#DTtableBody').append('<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td>'+ids+'<input type="hidden" name="branch_id[]" id="branch_id'+rand+'" value="'+element.branch_id+'" ><input type="text" class="form-control borderInput3 container-tbl-btn" value="'+element.branch_name+'" readonly name="branch_name[]" id="branch_name'+rand+'" data-record_id="'+rand+'" id="" style="width:180px"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105 jan'+rand+'" name="jan[]" data-record_id="'+rand+'" id="" value="'+element.jan+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105 feb'+rand+'" name="feb[]"  data-record_id="'+rand+'" id="" value="'+element.feb+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="mar[]" id="" value="'+element.mar+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="apr[]" id="" value="'+element.apr+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="may[]" id="" value="'+element.may+'"><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="jun[]" id="" value="'+element.jun+'"></td></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="jul[]" id="" value="'+element.jul+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="aug[]" id="" value="'+element.aug+'"><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="sep[]" id="" value="'+element.sep+'"></td></td><td><input type="number" value="'+element.oct+'" class="form-control borderInput3 container-tbl-btn w-105" name="oct[]" id=""></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="nov[]" id="" value="'+element.nov+'"></td><td><input type="number" class="form-control borderInput3 container-tbl-btn w-105" name="dec[]" value="'+element.dec+'" id=""><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="created_by[]" id="" value="{{ auth()->user()->nik }}"></td></tr>')
          }
        },
        error:function( er){
          console.log(er)
        }
      })
    }

    $("document").ready(function() {
        // $(".btn-outline-blue-md").trigger('click');
    });
    </script>

<script>
  $(document).ready(function(){
  $('#datepicker').val(moment().format('YYYY'));
      $('#datepicker').datepicker(
        {
    yearRange: "c-100:c",
    changeMonth: false,
    changeYear: true,
    showButtonPanel: true,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
    }
  }).focus(function () {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $(".ui-datepicker-prev").hide();
    $(".ui-datepicker-next").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", true);

    $('.next-day').on('click', function () {
      make_skeleton();
        var year =  parseInt($('#datepicker').val());
        $('#datepicker').val(year+1).trigger("change");
    });
    $('.prev-day').on('click', function () {
      make_skeleton();
         var year =  parseInt($('#datepicker').val());
       $('#datepicker').val(year-1).trigger("change");
    });
    $('.today-date').on('click', function () {
        var date = moment().format('MM/DD/YYYY');
        $('#datepicker').datepicker('setDate', date);
    });
    $('#datepicker').change(function(){
      getDataCost();
      make_skeleton();
    })
      getDataCost();
  });
  $("#form-add").submit(function(){
    // console.log($("#form-add").serialize())
      $.ajax({
        data: $("#form-add").serialize(),
        url: '{{ route("accfin.costfactory.store") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
           swal({
              position: 'center',
              type: 'success',
              title: 'success',
              icon: 'success',
              text: 'Data Has Been Saved',
              showConfirmButton: false,
              timer: 2500
            })
            getDataCost()
          }
        });
    return false;
  })
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
   $('#branch_name').change(function(){
  var ID = $(this).val();
console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("accfin.costfactory.branch") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#id').val(data.id)
        },

      });
    }
  }); 

</script>
@endpush