@extends("layouts.app")
@section("title","Analytics")
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
@endpush


@section("content")
  <section class="content">
    <div class="container-fluid savingCost">
      <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="cards-20 p-4" style="height:260px">
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
                <div class="borderlight2 my-2"></div>
                <div class="justify-start h-28">
                    <a href="{{ route('savingCost.dashboard')}}" class="w-100 justify-start gap-3">
                        <div class="title-14-dark">See Details</div>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="cards-20 p-4" style="height:260px">
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
                <div class="borderlight2 my-2"></div>
                <div class="justify-start h-28">
                    <a href="{{ route('savingCost.dashboard')}}" class="w-100 justify-start gap-3">
                        <div class="title-14-dark">See Details</div>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cards-20 p-4 h-260">
                <div class="title-16-dark2 mb-3">Top 3 Saving Cost</div>
                @foreach($index_buyer as $key => $value)
                <div class="containerTopThree">
                    <div class="buyer">
                        <div class="title-12-grey">Buyer</div>
                        <div class="title-14-dark2 text-truncate">{{$value['buyer_name']}}</div>
                    </div>
                    <div class="saving">
                        <div class="title-12-grey">Saving</div>
                        <div class="title-14-dark2 text-truncate">Rp. {{number_format($value['amount_saving'], 2, ",", ".")}}</div>
                    </div>
                    <div class="percent">
                        <div class="title-12-grey">Percentage</div>
                        <div class="title-14-dark2 text-hijau text-truncate">{{$value['persentase']}}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <div class="cards-20 p-4">
                <div class="row">
                    <div class="col-12 justify-sb2">
                        <div class="title-20-blue">SUM of AMOUNT SAVING</div>
                        <div class="filterSMV flexx gap-2">
                            <div class="justify-center">
                                <div class="title-sm mr-2 title-hide">Filter</div>
                                <div class="input-group flex" id="report_date" data-target-input="nearest">
                                    <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#report_date" placeholder="Select Year"/>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                <a href="{{route('savingCost.manage_pdf', $id)}}" target="_blank" class="btn-simple-delete" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></a>
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
                                        <th rowspan="2" style="padding-bottom:2rem" class="bg-thead2">NO</th>
                                        <th rowspan="2" style="padding-bottom:2rem" class="bg-thead2">BUYER</th>
                                        <th rowspan="2" style="padding-bottom:2rem" class="bg-thead2">ITEM</th>
                                        <th colspan="12" class="text-center">MONTH</th>
                                    </tr>
                                    <tr class="bg-thead2">
                                        @foreach($dataBulan as $key => $value)
                                        <th>{{$value['namabulan']}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                    @foreach($buat_tabel as $key => $value)
                                    <tr>
                                        <td scope="row">{{ $no }}</td>
                                        <td>
                                            <div class="text-truncate" style="max-width:250px">
                                                {{$value['buyer_name']}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-truncate" style="max-width:250px">
                                                {{$value['item']}}
                                            </div>
                                        </td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['januari'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['februari'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['maret'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['april'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['mei'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['juni'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['juli'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['agustus'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['september'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['oktober'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['november'], 2, ",", ".")}}</td>
                                        <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['desember'], 2, ",", ".")}}</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                </tbody>
                                <?php
                                $cek_sitabel = collect($buat_tabel)->count('item');
                                ?>
                                @if($cek_sitabel != 0)
                                <tfoot>
                                    <tr>
                                        <th class="bg-white"></th>
                                        <th class="bg-white"></th>
                                        <th class="fw-600 text-right bg-white">GRAND TOTAL</th>
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('januari'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('februari'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('maret'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('april'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('mei'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('juni'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('juli'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('agustus'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('september'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('oktober'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('november'), 2, ",", ".")}}</span></th> 
                                        <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('desember'), 2, ",", ".")}}</span></th> 
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
    jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
        format: 'Y',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
        filter_count++
        if (filter_count >= 1) {
            var month = $("#report_date").find("input").val();
            // console.log( month);
            var url = "{{ route('savingCost.annual_report',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
             
    })
  });
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
        confirmButtonColor: "#ff5757",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>

<script>
    $(document).ready( function () {
        var table = $('#DTtable').DataTable({
            "pageLength": 10,
            dom: 'Bfrtp',
            "buttons": [ "excel", "pdf" ],
            fixedColumns:   {
                left: 3
            },
        });
    });

    $('#date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

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

    $('#filter').datetimepicker({
      format: 'YYYY',
      showButtonPanel: true
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
