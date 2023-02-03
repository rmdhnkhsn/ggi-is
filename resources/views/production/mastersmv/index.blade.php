@extends("layouts.app")
@section("title","Data Process")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
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
            <div class="cards h-95 p-3">
                <i class="rc-icons fas fa-stopwatch"></i>
                <div class="rc-desc">Database SMV</div>
            </div>
        </a>
        <a href="{{ route('mastersmv.index')}}" class="rc-col-2">
            <div class="cards bg-primary h-95 p-3">
                <i class="rc-icons-active fas fa-database"></i>
                <div class="rc-desc-active">Data Process</div>
            </div>
        </a>
      </div>
        @include('production.mastersmv.partials.data_process.import')
      <div class="floatMenu">
        <div class="toggle">
            <i class="fas fa-plus"></i>
        </div>
        @if($isDelete)
            <li class="navOne">
                <button type="submit" id="btn_delete" class="red" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Deleted Checked">
                    <i class="fas fa-trash"></i>
                </button>
            </li>
        @else
            <li class="navOne">
                <a class="red not-allowed" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Not Allowed" disabled>
                    <i class="fas fa-trash"></i>
                </a>
            </li>
        @endif
        @if($isUpload)
            <li class="navTwo">
                <a href="#" id="triggerUploadSMV" class="green" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Upload SMV">
                    <i class="fas fa-file-upload"></i>
                </a>
            </li>
        @else
            <li class="navTwo">
                <a class="green not-allowed" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Not Allowed" disabled>
                    <i class="fas fa-file-excel"></i>
                </a>
            </li>
        @endif
        
        @if($isDownload)
            <li class="navThree">
                <a href="{{route('mastersmv.export')}}" class="green" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Download SMV">
                    <i class="fas fa-file-excel"></i>
                </a>
            </li>
        @else
            <li class="navThree">
                <a class="green not-allowed" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Not Allowed" disabled>
                    <i class="fas fa-file-excel"></i>
                </a>
            </li>
        @endif
        <!-- <li class="navFour">
            <a href="#" class="blue" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Create SMV">
                <i class="fas fa-file-medical"></i>
            </a>
        </li> -->
      </div>
      <div class="row">
        <div class="col-12">
            @include('production.mastersmv.partials.data_process.flash-message')
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="cards p-4 o-hidden">
            <div class="row">
                <div class="col-12 justify-sb2">
                    <div class="title-20 text-left">Data Process</div>
                    <div class="filterSMV">
                        <div class="input-group justify-center" id="filter_date">
                            <div class="input-group date" id="report_date_filter" data-target-input="nearest">
                                <div class="input-group-append datepiker" data-target="#report_date_filter" data-toggle="datetimepicker">
                                    <div class="inputGroupBlue" ><i class="fs-18 fas fa-calendar-alt mr-2"></i> <span class="fs-14 title-none">Date</span><i class="ml-2 fas fa-caret-down"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date_filter" placeholder="Select Date" style="width: 130px"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pb-5">
                    <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                    <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="dataTable" class="table tbl-content no-wrap">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="check1" name="select_all" value="1" id="example-select-all" /></th>
                                    <th>Tanggal</th>
                                    <th>Buyer</th>
                                    <th>Style</th>
                                    <th>Item</th>
                                    <th>Nama Proses</th>
                                    <th>Cycle Time</th>
                                    <th>SMV Minute</th>
                                    <th>Output/H</th>
                                    <th>Mesin</th>
                                </tr>
                            </thead>
                            <tbody>
            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script>
    let toggle = document.querySelector('.toggle');
    let menu = document.querySelector('.floatMenu');
    toggle.onclick = function () {
        menu.classList.toggle('active')
    }

    $('#triggerUploadSMV').click(function(){
        $(".uploadSMV").click();
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
    });
</script>
<script>
	$().ready(function(){
		let oTable = $('#dataTable').DataTable({
            dom: 'rftip',
			processing:true,
			serverSide:true,
			ajax:{
				url: "{{route('mastersmv.index')}}",
                data:function(d){
                    // d.searchPending = $("input[name=searchPending]:checked").val();
                }
			},
            

			columns:[
            {name:'action', data:'action'},
            {name:'tanggal', data:'tanggal'},
            {name:'buyer', data:'buyer'},
            {name:'style', data:'style'},
            {name:'item', data:'item'},
            {name:'nama_proses', data:'nama_proses'},
            {name:'cycle_time', data:'cycle_time'},
            {name:'smv_minute', data:'smv_minute'},
            {name:'output_pj', data:'output_pj'},
            {name:'mesin', data:'mesin'},
			],
            

            'columnDefs': [
            {'targets': 0, 'searchable':false, 'orderable':false, 'className': 'dt-body-center', 
             'render': function (data, type, full, meta){
                    // console.log(data);
                    return '<input type="checkbox" class="check1" name="ids[]" value="' + $('<div/>').text(data).html() + '">';}
            }
            ],

            order:[
                    [1,'desc'],
                    // [6,'asc']
            ],
		});


        // Handle click on "Select all" control
        $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = oTable.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function(){
            // If checkbox is not checked
            if(!this.checked){
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if(el && el.checked && ('indeterminate' in el)){
                    // Set visual state of "Select all" control 
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });


		$("#dataTable").css('width','100%');
        $("#search-form").on('submit',function(e){
            oTable.draw();
            e.preventDefault();
        });
		
        //  // Setup - add a text input to each footer cell
         $('#dataTable tfoot th').each( function (i) {
            var title = $(this).text();
            showCols=[1,2,3,4,5,6,7,8,9];
            if(showCols.indexOf(i)>=0)
            $(this).html( '<input type="text" style="width:100%" placeholder="Search '+title+'" />' );
        } );

         // Restore state
        var state = oTable.state.loaded();
        if (state) {
            oTable.columns().eq(0).each(function (colIdx) {
                var colSearch = state.columns[colIdx].search;
                if (colSearch.search) {
                    $('input', oTable.column(colIdx).footer()).val(colSearch.search);
                }
            });
            oTable.draw();
        }
 
         // Apply the search
        //  oTable.columns().every( function () {
        //     var that = this;
    
        //     $( 'input', this.footer() ).on( 'change clear', function () {
        //         if ( that.search() !== this.value ) {
        //             that
        //                 .search( this.value )
        //                 .draw();
        //         }
        //     } );
        // });

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
           url:"{{ route('mastersmv.destroy') }}",
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
{{-- <script>
  jQuery(document).ready(function($) {
    $('#report_date_filter').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#report_date_filter").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date_filter").find("input").val();
        location.replace("{{ url('/prd/master-smv/data-process/-') }}"+month) 
      }
      filter_count++
    })
    var month = $("#month").val();
    $('.borderInput').val(month)
  });
</script> --}}
{{-- <script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    })

    var filter_count = 0;
    var filter=$('#nilai_filter').val();
    $("#report_date").on("change.datetimepicker", ({date}) => {
        if(filter==0){
            var month = $("#report_date").find("input").val()
            if (month != null) {
                var month = $("#report_date").find("input").val();
                location.replace("{{ url('prd/master-smv/data-process/-') }}"+month) 
          }
          filter_count++
        }
        else if(filter==1){
          if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
            location.replace("{{ url('prd/master-smv/data-process/-') }}"+month)
          }
          filter_count++
        }
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month)
  });
</script> --}}
@endpush