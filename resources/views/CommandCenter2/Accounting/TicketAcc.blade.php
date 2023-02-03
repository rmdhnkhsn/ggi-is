@extends("layouts.app")
@section("title","ACCOUNTING TICKET")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid DTTicket accordionRound">
    <div class="row">
      <a href="{{ route('caccounting.all_branch')}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-file-invoice"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Validate Waiting</div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('cc.ticket.accounting')}}" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-ticket-alt"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Accounting Ticket</div>
            </div>
          </div>
        </div>
      </a>
      @endif
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12 mb-2">
            <div class="title-20-grey">Pengajuan Uang Kas Bulan Ini</div>
          </div>
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="justify-start gap-3">
                <div class="boxIcon bg-softGreen">
                  <i class="text-hijau fas fa-caret-down"></i>
                </div>
                <div class="title-16-500 text-hijau">Pengajuan Uang Kas</div>
              </div>
              <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 7.779.600 ,-</div>
              <div class="title-14-dark mt-1">Dari<span class="text-hijau mx-1">15</span>tiket pengajuan</div> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="justify-start gap-3">
                <div class="boxIcon bg-softYellow">
                  <i class="text-yellow fas fa-caret-up"></i>
                </div>
                <div class="title-16-500 text-yellow">Pengajuan Dicairkan</div>
              </div>
              <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 6.500.000 ,-</div>
              <div class="title-14-dark mt-1"><span class="text-yellow mr-1">15</span>pengajuan dicairkan</div> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="justify-start gap-3">
                <div class="boxIcon bg-softBlue">
                  <i class="text-blue fs-18 fas fa-file-invoice"></i>
                </div>
                <div class="title-16-500 text-blue">Pengajuan Terealisasi</div>
              </div>
              <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 6.000.000 ,-</div>
              <div class="title-14-dark mt-1">Dari<span class="text-blue mx-1">15</span>tiket pengajuan</div> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="justify-start gap-3">
                <div class="boxIcon bg-softPink">
                  <i class="text-pink fs-18 fas fa-percentage"></i>
                </div>
                <div class="title-16-500 text-pink">Balance</div>
              </div>
              <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 500.000 ,-</div>
              <div class="title-14-dark mt-1">Dari<span class="text-pink mx-1">15</span>tiket pengajuan</div> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="cards4 p-4">
          <div class="title-20-grey">Issues Statistic</div>
          <div class="title-14-dark">Data dalam 6 bulan terakhir</div>
          <div class="chart-container pl-4 mt-3">
            <canvas id="BarChart" style="height:192px"></canvas>    
          </div>
          <div class="title-14-dark3 title-rotate">Quantity</div>
          <div class="justify-sb pl-5">
            <div class="title-14-dark3">Month</div>
            <div class="legends">
              <div class="legendsWrap">
                <div class="blue"></div><div class="text">Total Pengeluaran</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="cards-part round-20">
          <div class="cards-head round-20-head">
            <div class="justify-sb">
              <div class="title-24-grey no-wrap title-none">SUMMARY PENGELUARAN CASH JULI 2022</div>
              <div class="flexx gap-3">
                <div class="justify-center">
                  <div class="sub-title-14 title-none">Filter</div>
                  <div class="sub-title-14 title-none mx-2">:</div>
                  <div class="input-group flex">
                    <div class="input-group date" id="filter" data-target-input="nearest">
                      <div class="input-group-append datepiker" data-target="#filter" data-toggle="datetimepicker">
                        <div class="inputGroupBlue" ><i class="fs-18 fas fa-calendar-alt"></i><i class="fs-18 ml-2 fas fa-caret-down"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#filter" placeholder="Select Date"/>
                    </div>
                  </div>
                </div>
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-body round-20-body">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollY" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead class="stickyHeader">
                      <tr class="bg-thead2">
                        <th>NO</th>
                        <th>APP</th>
                        <th>UNIT</th>
                        <th>ACCOUNT LEDGER</th>
                        <th>KETERANGAN</th>
                        <th>JUMLAH</th>
                        <th>ACT</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Aristide Dossou-Yovo</td>
                        <td>CLN</td>
                        <td>ENTER</td>
                        <td>KIRIM PAKER SAMPLE BY JNE 15/03/22</td>
                        <td><span class="title-14-light mr-2">Rp.</span>1.750.000</td> 
                        <td>
                          <div class="container-tbl-btn">
                            <button type="button" class="btn-icon-softBlue btn-quick-access"><i class="fs-20 fas fa-info-circle"></i></button>
                          </div>
                        </td>
                      </tr>
                    </tbody> 
                  </table>
                  @include('CommandCenter2.Accounting.details')
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
<script>
  $(document).ready(function($){
    $(document).on('click', '.btn-quick-access', function(){
      $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
      if($(this).hasClass('btn-quick-access'))
        $('.bs-canvas-right2').addClass('mr-0');
      else
        $('.bs-canvas-left').addClass('ml-0');
      return false;
    });
    
    $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
      var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas2') : $('.bs-canvas2');
      elm.removeClass('mr-0 ml-0');
      $('.bs-canvas-overlay').remove();
      return false;
    });
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 8,
      dom: 'frtip',
    });
  });

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('.dataTables_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });

  $(document).ready(function($) {
    $('#filter').datetimepicker({
      format: 'DD-MM-YYYY',
      showButtonPanel: true
    })
  });
</script>
<script>
  $( document ).ready(function() {
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

    const accordionItems = document.querySelectorAll('.accordionItems')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItems[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

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
  });
</script>
<script>
  var BarChart = document.getElementById('BarChart').getContext('2d');
  var myBarChart = new Chart(BarChart, {
      type: 'bar',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
          datasets : [{
              label: "Pengeluaran",
              data:  [30, 20, 34, 50, 24, 38, 85, 10],
              backgroundColor: "#007BFF",
          }],
      },
  
      options: {
          tooltips: {
              enabled: true,
              mode: 'single',
              callbacks: {
                  label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  return "Pengeluaran" + " : " + "Rp. " + tooltipData + ",-";
                  }
              }
          },
          responsive: true, 
          maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      stepSize: 20,
                      min: 0,
                      // callback: function(value) {
                      //     return value + "%"
                      // }
                  }
              }],
              xAxes: [{
                  gridLines: {
                      display: false,
                  }
              }]
          },
          legend: {
              display: false
          },
      }
  });
</script>
@endpush