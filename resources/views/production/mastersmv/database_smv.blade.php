@extends("layouts.app")
@section("title","Database SMV")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <a href="{{ route('databasesmv.index')}}" class="rc-col-2">
            <div class="cards bg-primary h-95 p-3">
                <i class="rc-icons-active fas fa-stopwatch"></i>
                <div class="rc-desc-active">Database SMV</div>
            </div>
        </a>
        <a href="{{ route('mastersmv.index')}}" class="rc-col-2">
            <div class="cards h-95 p-3">
                <i class="rc-icons fas fa-database"></i>
                <div class="rc-desc">Data Process</div>
            </div>
        </a>
      </div>
      <form action="{{route ('mastersmv.deleteHeader')}}" method="get" enctype="multipart/form-data">
        @csrf  
            <div class="floatMenu">
                <div class="toggle">
                    <i class="fas fa-plus"></i>
                </div>
                <li class="navOne">
                    {{-- <button type="submit" id="btn_delete" class="red" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Deleted Checked"> --}}
                    <button type="submit"  class="red " data-toggle="popover" data-content="Deleted Checked">
                        <i class="fas fa-trash"></i>
                    </button>
                </li>
                <li class="navTwo">
                    <a href="#" id="triggerUploadSMV" class="green" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Upload SMV">
                        <i class="fas fa-file-upload"></i>
                    </a>
                </li>
                <li class="navThree">
                    <a href="#" class="green" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Download SMV">
                        <i class="fas fa-file-excel"></i>
                    </a>
                </li>
                <li class="navFour">
                    <a href="#" class="blue" id="triggerCreateSMV" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Create SMV">
                        <i class="fas fa-file-medical"></i>
                    </a>
                </li>
            </div>    
            <div class="row">
                <div class="col-12">
                    <div class="cards p-4">
                        <div class="row">
                            <div class="col-12 justify-sb2">
                                <div class="title-20 text-left">Database SMV</div>
                                <div class="filterSMV">
                                    <div class="input-group justify-center" id="filter_date">
                                        {{-- <div class="sub-title-14 mr-2">Filter : </div> --}}
                                        <div class="input-group date" id="report_date" data-target-input="nearest">
                                            <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                                <div class="inputGroupBlue" ><i class="fs-18 fas fa-calendar-alt"></i><i class="fs-18 ml-2 fas fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <input  id="sesat" type="text" class="form-control datetimepicker-input borderInput"
                                                data-target="#report_date" placeholder="Select Date" style="width: 130px; border-radius : 0 10px 10px 0"/>
                                        </div>
                                    </div>
                                        <input type="hidden" id="month" type="text" value="{{$nama_bulan}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pb-5">
                                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                <div class="cards-scroll scrollX" id="scroll-bar">
                                    <table id="DTtable" class="table tbl-content no-wrap">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="check1 checkAll" name="select_all" value="1" id="example-select-all" /></th>
                                                <th>NO</th>
                                                <th>DATE</th>
                                                <th>STYLE</th>
                                                <th>ITEM</th>
                                                <th>AGENT/BUYER</th>
                                                <th>TOTAL MINUTE</th>
                                                <th>MANPOWER</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key =>$value)
                                            <tr>
                                                <td>
                                                    {{-- <input type="checkbox" class="check1" name="ids[]" /> --}}
                                                <input type="checkbox" class="check1" id="check{{$value['id']}}">
                                                <input type="hidden" id="cek{{$value['id']}}" name="cek[]">
                                                <input type="hidden" id="id" name="id[]" value="{{ $value['id'] }}"></td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value['date']}}</td>
                                                <td>{{ $value['style']}}</td>
                                                <td>{{ $value['item']}}</td>
                                                <td>{{ $value['buyer']}}</td>
                                                <td>{{ round($value['smv'],1)}}</td>
                                                <td>{{ $value['manpower']}}</td>
                                                <td>
                                                </form>
                                                    <div class="container-tbl-btn flex gap-2">
                                                        <button type="button" class="btn-icon-blue" data-toggle="modal" data-target="#triggerDetailsSMV{{ $value['id'] }}"><i class="fas fa-info"></i></button>
                                                        @include('production.mastersmv.partials.database_smv.details')
                                                        <button type="button" class="btn-icon-yellow" data-target="#triggerEditSMV{{ $value['id'] }}" data-toggle="modal" ><i class="fas fa-pencil-alt"></i></button>
                                                        <a href="{{route ('mastersmv.deleteall',$value['id'])}}"  class="btn-icon-red deleteFile" ><i class="fas fa-trash"></i></a>
                                                        @include('production.mastersmv.partials.database_smv.edit')
                                                    </div>
                                                </td>
                                            </tr>
                                            <script>
                                                $(document).on('click', '#check{{$value['id']}}', function(){
                                                    var status = document.getElementById('check{{ $value['id'] }}').value;
                                                    if(document.getElementById('check{{ $value['id'] }}').checked){
                                                    var result = '1';
                                                    document.getElementById('cek{{$value['id'] }}').value = result;
                                                    }
                                                    else{
                                                    var result = null; 
                                                    document.getElementById('cek{{ $value['id'] }}').value = result;
                                                    }    
                                                }); 
                                            </script>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      @include('production.mastersmv.partials.database_smv.import')
      @include('production.mastersmv.partials.database_smv.create')
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
    let toggle = document.querySelector('.toggle');
    let menu = document.querySelector('.floatMenu');
    toggle.onclick = function () {
        menu.classList.toggle('active')
    }

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $('#triggerCreateSMV').click(function(){
        $(".createSMV").click();
    })

    $('#triggerUploadSMV').click(function(){
        $(".uploadSMV").click();
    })

    $('#triggerDetailsSMV').click(function(){
        $(".detailsSMV").click();
    })

    $('#triggerEditSMV').click(function(){
        $(".editSMV").click();
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });

    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.imageUploadWrap').hide();

            reader.onload = function (e) {
                console.log(e)
                $(".fileUploadImg").attr("src", e.target.result);
                $(".fileUploadContent").show();
            };
            reader.readAsDataURL(input.files[0]);
            // $("#frmSubmit").submit();

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.fileUploadInput').replaceWith($('.fileUploadInput').clone());
        $('.fileUploadContent').hide();
        $('.imageUploadWrap').show();
    }
    $('.imageUploadWrap').bind('dragover', function () {
        $('.imageUploadWrap').addClass('image-dropping');
    });
    $('.imageUploadWrap').bind('dragleave', function () {
        $('.imageUploadWrap').removeClass('image-dropping');
    });
</script>

<script>
	$().ready(function(){
        var table = $('#DTtable').DataTable({
            // scrollX : '100%',
            "pageLength": 15,
            "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
        });		
		});



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#btn_delete").click(function(e){
  
        e.preventDefault();

        var ids = [];

        $.each($("input[name='ids[]']:checked"), function(){
            ids.push($(this).val());
        });

        if( !$.isArray(ids) ||  !ids.length ) {
            return alert('Checklist dahulu data yang akan dihapus');
        }

        var result = confirm("Yakin akan hapus data ?");
        if (!result) {
            return false;
        }

        $.ajax({
           type:'DELETE',
           url:"{{ route('mastersmv.destroyHeader') }}",
           data:JSON.stringify(ids),
           dataType: 'JSON',
           success:function(data){
              alert(data.success);
              location.reload();
           },
           error: function (request, status, error) {
                alert(request.responseText);
            }
        });
  
    });
</script>
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })

    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
          if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
            location.replace("{{ url('prd/master-smv/-') }}"+month)
          }
          filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month + '')
  });
</script>
<script>
  $('.pdfKosong').on('click', function (event) {
    swal({
        position: 'center',
        type: 'warning',
        title: 'SMV data is not complete',
        icon: 'warning',
        text: 'please complete all smv inputs',
        showConfirmButton: false,
        timer: 1800
    });
  });
  $('.excelkosong').on('click', function (event) {
    swal({
        position: 'center',
        type: 'warning',
        title: 'SMV data is not complete',
        icon: 'warning',
        text: 'please complete all smv inputs',
        showConfirmButton: false,
        timer: 1800
    });
  });
</script>
@endpush