@extends("layouts.app")
@section("title","Saving Cost")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
  <section class="content">
    <div class="container-fluid savingCost">
      <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="cards-20 p-4" style="height:280px">
                <div class="icons1">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="title-14-dark mt-2">Saving percentage</div>
                <div class="title-24-600-dark mt-3">{{$data_index['persentase_saving']}} %</div>
                <div class="flex gap-2 mt-2">
                    @if($data_index['amount_saving_bulan_ini'] == 0 || $data_index['amount_saving_bulan_lalu'] == 0)
                    <div class="text-abu">Rp. {{number_format($data_index['selisih_amount_saving'], 2, ",", ".")}}</div>
                    @elseif($data_index['amount_saving_bulan_ini'] > $data_index['amount_saving_bulan_lalu'])
                    <img src="{{url('images/iconpack/trend-up2.svg')}}">
                    <div class="text-hijau">
                        Rp. {{number_format($data_index['selisih_amount_saving'], 2, ",", ".")}}</div>
                    @else
                    <img src="{{url('images/iconpack/trend-down2.svg')}}">
                    <div class="text-ping">Rp. {{number_format($data_index['selisih_amount_saving'], 2, ",", ".")}}</div>
                    @endif
                </div>
                <div class="title-14-dark mt-1">From last month</div>
                <div class="borderlight2 my-3"></div>
                <div class="justify-start h-28">
                    <a href="{{ route('savingCost.analytics')}}" class="w-100 justify-start gap-3">
                        <div class="title-14-dark">Analytics</div>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="cards-20 p-4" style="height:280px">
                <div class="icons2">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="title-14-dark mt-2">Saving Cost</div>
                <div class="title-24-600-dark mt-3">Rp. {{number_format($data_index['amount_saving_bulan_ini'], 2, ",", ".")}}</div>
                <div class="flex gap-2 mt-2">
                    @if($data_index['saving_selisih'] == 0)
                    <div class="text-abu">{{$data_index['saving_selisih']}}%</div>
                    @elseif($data_index['saving_selisih'] < 0)
                    <img src="{{url('images/iconpack/trend-down2.svg')}}">
                    <div class="text-ping">{{$data_index['saving_selisih']}}%</div>
                    @else
                    <img src="{{url('images/iconpack/trend-up2.svg')}}">
                    <div class="text-hijau">  
                        {{$data_index['saving_selisih']}}%</div>
                    @endif
                </div>
                <div class="title-14-dark mt-1">From last month</div>
                <div class="borderlight2 my-3"></div>
                <div class="justify-start h-28">
                    <a href="{{ route('savingCost.analytics')}}" class="w-100 justify-start gap-3">
                        <div class="title-14-dark">Analytics</div>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- from create  -->
        <div class="col-md-6">
            <form action="{{ route('savingCost.plan_store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cards-20 p-3" style="height:280px">
                    <div class="justify-sb2 mb-4">
                        <div class="title-16-dark2">Create Plan Purchase</div>
                    </div>
                    <div class="justify-start mb-2">
                        <div class="title-sm text-left w-140 title-none">Buyer</div>
                        <div class="input-group flex">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                            </div>
                            <input type="hidden" id="buyer_name" name="buyer_name">
                            <select class="form-control select2bs4_add" id="buyer" name="buyer" required>
                                <option selected>Select Buyer</option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="justify-start mb-2">
                        <div class="title-sm text-left w-140 title-none">Item</div>
                        <input type="text" class="form-control borderInput" id="item" name="item" placeholder="Input item">
                    </div>
                    <!-- <div class="justify-start mb-2">
                        <div class="title-sm text-left w-140 title-none">Before</div>
                        <input type="text" class="form-control borderInput" id="before" name="before" placeholder="Input Amount Before Purchase ">
                    </div> -->
                    <div class="justify-start mb-2">
                        <div class="title-sm text-left w-140 title-none">Valid Date</div>
                        <div class="input-group flex">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="valid_date" name="valid_date" required>
                        </div>
                    </div>
                    <div class="justify-end mt-4">
                        <button type="submit" class="btn-blue-md">Save Plan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Table saving cost  -->
        <div class="col-12">
            <div class="cards-20 p-4">
                <div class="row">
                    <div class="col-12 justify-sb2">
                        <div class="title-20-blue">SAVING COST 2022</div>
                        <div class="filterSMV flexx gap-3">
                            <div class="flex gap-2">
                                <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                <a href="{{route('savingCost.export_pdf', $id)}}" target="_blank" class="btn-simple-delete" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></a>
                            </div>
                            <div class="input-group date" id="report_date" data-target-input="nearest">
                                <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                    <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#report_date" placeholder="Select Month"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pb-5">
                        <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table id="DTtable" class="table tbl-content-cost no-wrap">
                                <thead>
                                    <tr class="bg-thead2">
                                        <th class="bg-thead2">ID</th>
                                        <th class="bg-thead2">BUYER</th>
                                        <th class="bg-thead2">ITEM</th>
                                        <th>BEFORE</th>
                                        <th>AMOUNT BEFORE</th>
                                        <th>AFTER</th>
                                        <th>AMOUNT AFTER</th>
                                        <th>VALID DATE</th>
                                        <th>OLD PRICE</th>
                                        <th>NEW PRICE</th>
                                        <th>KURS</th>
                                        <th>PO NO</th>
                                        <th>QTY</th>
                                        <th>UOM</th>
                                        <th>AMOUNT SAVING</th>
                                        <th>%SAVING</th>
                                        <th>REMARKS</th>
                                        <th class="bg-thead2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->buyer_name}}</td>
                                        <td>{{$value->item}}</td>
                                        <td>{{$value->before}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_before, 2, ",", ".")}}</td>
                                        <td>{{$value->after}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_after, 2, ",", ".")}}</td>
                                        <td>{{$value->valid_date}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->old_price, 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->new_price, 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">IDR </span>{{number_format($value->kurs, 2, ",", ".")}}</td>
                                        <td>{{$value->no_po}}</td>
                                        <td>{{$value->qty}}</td>
                                        <td>{{$value->uom}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value->amount_saving, 2, ",", ".")}}</td>
                                        <td>{{$value->saving}}</td>
                                        <td>{{$value->remark}}</td>
                                        <td>
                                            <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('savingCost.realization', $value->id)}}" class="dropdown-item" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Realization</a>
                                                <a href="{{ route('savingCost.delete', $value->id)}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 mt-3">
            <div class="title-24-dark text-center">Saving Cost Purchase</div>
            <form action="" class="justify-center mt-3">
                <div class="filterCost">
                    <div class="input-group date w-340" id="date" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#date" data-toggle="datetimepicker">
                            <div class="inputGroupBlue" style="width:70px"><i class="fs-20 fas fa-calendar-alt mr-2"></i><i class="fs-18 fas fa-caret-down"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input borderInput" data-target="#date" id="" name="" placeholder="Select Date"/>
                    </div>
                    <input type="text" class="form-control borderInput" id="" name="" placeholder="Search data">
                    <button type="submit" class="btn-blue-md">Search</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="accordionItems">            
                <header class="accordionHeaders">
                    <div class="images">
                        <img src="{{url('images/iconpack/monitoring_covid/employee.svg')}}">
                    </div>
                </header>
                <div class="accordionContents">
                    <div class="contents">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table class="table tbl-content-cost no-wrap">
                                <thead>
                                    <tr class="bg-thead2">
                                        <th>AFTER</th>
                                        <th>AMOUNT AFTER</th>
                                        <th>VALID DATE</th>
                                        <th>OLD PRICE</th>
                                        <th>NEW PRICE</th>
                                        <th>KURS</th>
                                        <th>PO NO</th>
                                        <th>QTY</th>
                                        <th>UOM</th>
                                        <th>AMOUNT SAVING</th>
                                        <th>%SAVING</th>
                                        <th>REMARKS</th>
                                        <th class="bg-thead2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ORDER KE SAMJIN AMOUNT $9468.76</td>
                                        <td><span class="title-14-light mr-2">Rp.</span>160,828,600</td>
                                        <td>2022-08-21</td>
                                        <td><span class="title-14-light mr-2">Rp.</span>120,828,600</td>
                                        <td><span class="title-14-light mr-2">Rp.</span>134.550</td>
                                        <td><span class="title-14-light mr-2">Rp.</span>15.000</td>
                                        <td>2204218</td>
                                        <td>9,662</td>
                                        <td>PCS</td>
                                        <td><span class="title-14-light mr-2">Rp.</span>5,797,200.00</td>
                                        <td>32.95%</td>
                                        <td>KURS $1 = Rp 15.000, HANYA UNTUK PO INI SAJA KARENA QTY BESAR</td>
                                        <td>
                                            <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#detailsOut"><i class="mr-2 fs-18 fas fa-info-circle"></i>Details Asset</a>
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editOut"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</a>
                                                <a href="#" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
@if(Session::has('sudah_dikirim'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil di simpan !'
        })
    }
  </script>
@endif
@if(Session::has('realization_ok'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil di simpan !'
        })
    }
  </script>
@endif

@if(Session::has('berhasil_hapus'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil di hapus !'
        })
    }
  </script>
@endif
<!-- cari buyer  -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2bs4_add').select2({
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
        type: "POST",
        url: '{{ route("savingCost.search_buyer") }}',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                buyer: params.term // search term
            };
        },
        processResults: function (response) {
            response.push({id : 99999999, text : 'ALL BUYER'})
            return {
                results: response
            };
        },
        cache: true
        }
    })
    $('.select2bs4_add').on('select2:select', function (e) {
        e.preventDefault();
        var data = e.params.data;
        $('#buyer_name').val(data.text);
    });
</script>

<!-- Delete File  -->
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: "Apakah Anda Yakin?",
        text: "Setelah mengkonfirmasi, data akan secara permanent di hapus",
        icon: 'warning',
        buttons: ["Cancel", "Delete"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>
<script>
    jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
        format: 'Y-MM',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
        filter_count++
        if (filter_count >= 1) {
            var month = $("#report_date").find("input").val();
            // console.log( month);
            var url = "{{ route('savingCost.index',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
             
    })
  });
</script>
<script>
    $(document).ready( function () {
        var table = $('#DTtable').DataTable({
            "pageLength": 10,
            "order": ['1', 'asc'],
            dom: 'Bfrtp',
            "buttons": [ "excel", "pdf",
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                text: 'PDF',
                download: 'open'
            } ],
            fixedColumns:   {
                left: 3,
                right: 1
            },
        });
    });

    // $('#tabelReject').DataTable({
    //     info: false,
    //     dom: 'Bfrtip',
    //     buttons: [
    //     'csv',
    //     {
    //         extend: 'pdfHtml5',
    //         orientation: 'landscape',
    //         text: 'PDF',
    //         download: 'open'
    //     }
    //   ]
    // });


    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>

<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
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
