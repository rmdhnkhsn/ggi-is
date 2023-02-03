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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="cards-part">
                <div class="cards-head">
                    <div class="justify-sb3">
                        <div class="title-24-grey no-wrap">Request Issue IR</div>
                        <div class="endSide flexx gap-3">
                            <div class="justify-center">
                                <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                                <div class="input-group flex" id="showDate" data-target-input="nearest">
                                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input borderInput w-135" id="date_from" name="date_from" data-target="#showDate" placeholder="Select Date"/>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                                <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                                <a href="" class="btn-blue-md" data-toggle="modal" data-target="#create">Create <i class="fs-18 ml-2 fas fa-plus"></i></a>
                                @include('purchasing.requestIR.partials.create')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cards-body">
                    @foreach($data as $v)
                        @php
                        $status='Waiting';
                        if ($v->export_by_nik!==null) {
                            $status='RPA';
                        } else if ($v->wh_by_nik!==null) {
                            $status='Warehouse';
                        }
                        
                        @endphp
                        <div class="listIR">
                            <div class="item">
                                <div class="title-16-dark2">{{$v->item_no}}</div>
                                <div class="title-14-dark">{{$v->item_master->F4101_DSC1}}</div>
                            </div>
                            <div class="qty">
                                <div class="title-12-grey">QTY</div>
                                <div class="sub-title-14">{{$v->qty}} {{$v->uom}}</div>
                            </div>
                            <div class="newOR">
                                <div class="title-12-grey">NEW OR</div>
                                <div class="sub-title-14">{{$v->new_or}}</div>
                            </div>
                            <div class="transaction">
                                <div class="title-12-grey">Transaction Date</div>
                                <div class="sub-title-14">{{$v->tr_date}}</div>
                            </div>
                            <div class="glDate">
                                <div class="title-12-grey">G/L DATE</div>
                                <div class="sub-title-14">{{$v->gl_date}}</div>
                            </div>
                            <div class="glDate">
                                <div class="title-12-grey">Status</div>
                                @if($status=="Waiting")
                                    <div class="sub-title-14 text-danger">{{$status}}</div>
                                @elseif($status=="Warehouse")
                                    <div class="sub-title-14 text-warning">{{$status}}</div>
                                @else
                                    <div class="sub-title-14 text-success">{{$status}}</div>
                                @endif
                            </div>
                            @if($v->wh_by_nik==null)
                                <div class="menu">
                                    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- <button type="button" class="dropdown-item" style="color:#007bff" data-toggle="modal" data-target="#edit"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</button> -->
                                            <button type="button" class="dropdown-item" style="color:#007bff" onclick="edit_init({{$v->id}});"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</button>
                                            <a href="{{route('requestIR.delete',$v->id)}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    @include('purchasing.requestIR.partials.edit')
                </div>
                
                <div class="table-container d-none">
                    <table id="DTtable" class="table">
                        <thead>
                            <tr>
                                <th>Item.Number</th>
                                <th>Item.Desc</th>
                                <th>Qty</th>
                                <th>Uom</th>
                                <th>New.OR</th>
                                <th>Trans.Date</th>
                                <th>GL.Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $v)
                                @php
                                $status='Waiting';
                                if ($v->export_by_nik!==null) {
                                    $status='RPA';
                                } else if ($v->wh_by_nik!==null) {
                                    $status='Warehouse';
                                }
                                
                                @endphp
                                <tr>
                                    <td>{{$v->item_no}}</td>
                                    <td>{{$v->item_master->F4101_DSC1}}</td>
                                    <td>{{$v->qty}}</td>
                                    <td>{{$v->uom}}</td>
                                    <td>{{$v->new_or}}</td>
                                    <td>{{$v->tr_date}}</td>
                                    <td>{{$v->gl_date}}</td>
                                    <td>{{$status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
    $(document).ready( function () {
        let dtpending=GetURLParameter('date_from');
        $('#date_from').val(dtpending);

        var table = $('#DTtable').DataTable({
            "pageLength": 10,
            dom: 'B',
            "buttons": [ "excel", "pdf" ],
            fixedColumns:   {
                left: 0,
                right: 1
            },
        });

        let today = "{{date('Y-m-d')}}";
        $('#tr_date').val(today);
        $('#gl_date').val(today);

        // $('#uom_need').on('change', function() {
        //     $('#text_uom_need').val(this.value);
        // });

        $('#edit_uom_need').on('change', function() {
            $('#text_edit_uom_need').val(this.value);
        });

        $('.exportExcel').click(function(){
            $(".buttons-excel").click();
        })

        $('.exportPdf').click(function(){
            $(".buttons-pdf").click();
        })
    });


    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('#showDate').datetimepicker({
        format: 'DD-MM-YY',
        showButtonPanel: false,
    })

    $("#showDate").on("change.datetimepicker", ({date, oldDate}) => {
        if (oldDate) {
        // console.log("New date", date);
        // console.log("Old date", oldDate);
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
        url="{{route('requestIR.index')}}";
        url+="?";
        dt_pending=$('#date_from').val();
        if (dt_pending!=='') {
        url+='&date_from='+dt_pending;
        }
        // alert(url);
        window.location=url;
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

    function edit_init(id) {
            var url = "{{route('requestIR.edit',':id')}}";
            url_edit = url.replace(':id', id);

            $.ajax({
                url: url_edit,
                type: 'GET',
                success: function (response) {
                    // alert(JSON.stringify(response));
                    edit_form(response);
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

    function edit_form(data) {
        console.log(data.uom_need);
        init_form();

        $('#frmedit').modal('show');
        $('#edit_id').val(data.id);
        $('#edit_tr_date').val(data.tr_date);
        $('#edit_gl_date').val(data.gl_date);

        $('#edit_item_number').val(data.item_number);
        $('#edit_to_branch').val(data.to_branch);

        $('#edit_item_desc').val(data.item_desc);
        $('#edit_new_or').val(data.new_or);
        $('#edit_qty').val(data.qty);

        // $('#edit_item_number').append("<option value=87963>87963</option>"); 
        $('#edit_uom').val(data.uom)
        $('#edit_uom_need').val(data.uom_need).trigger('change');
    }

    function init_form() {
        $('#edit_id').val('');
        $('#edit_tr_date').val('');
        $('#edit_gl_date').val('');
        $('#edit_item_number').val('');
        $('#edit_to_branch').val('');
        $('#edit_item_desc').val('');
        $('#edit_new_or').val('');
        $('#edit_qty').val('');
        $('#edit_uom').val('');
    }

    $('.select2bs4_item').select2({
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
          url: 'http://10.8.0.108/jdeapi/public/api/itemnumber/search=',
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              F4101_ITM:  params.term,
              select:'F4101_ITM,F4101_DSC1,F4101_UOM1'
            }
            return query;
          },
          processResults: function (data) {
            return {
            results:  $.map(data, function (item) {
                  return {
                      label_uom: item.F4101_UOM1,
                      label: item.F4101_DSC1,
                      text: item.F4101_ITM,
                      id: item.F4101_ITM
                  }
              })

            };

          },
        }
    })
    $('.select2bs4_item').on('select2:select', function (e) {
      e.preventDefault();
      var data = e.params.data;
      $('#item_desc').val(data.label);
      $('#edit_item_desc').val(data.label);
      $('#uom').val(data.label_uom).trigger('change');
      $('#edit_uom').val(data.label_uom).trigger('change');
    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#item_no').change(function(){
    var ID = $(this).val();    
    console.log(ID)
    if(ID){
        $.ajax({
        data: {
            ID: ID,
        },
        url: '{{ route("requestIR.search_uom") }}',           
        type: "post",
        dataType: 'json',    
            success:function(data){  
                var res = Object.values(data);          
                if(res){
                    $("#uom_need").empty();
                    $("#uom_need").append('');
                    i=0;
                    res.map((data)=>{
                        console.log(data)
                        $("#uom_need").append('<option value="'+data+'">'+data+'</option>');
                    })
                }else{
                    $("#uom_need").empty();
                }
            }
        });
    }else{
        $("#uom_need").empty();
    }      
    });
</script>

@endpush
