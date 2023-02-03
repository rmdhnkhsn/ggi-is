@extends("layouts.app")
@section("title","DT TICKETING")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid DTTicket accordionRound">
    <div class="row">
      <div class="col-lg-4">
        <div class="row">
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="containerCenter">
                <div class="badge-softPink-sm">Issue</div>
                <div class="title-20-dark-blue2 mt-2"><span class="fw-500">100</span> Ticket</div> 
                <div class="title-12-grey3 fw-4">Last 30 Days</div>
                <a href="" class="btnView">View More</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="cards4 p-4">
              <div class="containerCenter">
                <div class="badge-softGreen-sm">Solved</div>
                <div class="title-20-dark-blue2 mt-2"><span class="fw-500">26</span> Ticket</div> 
                <div class="title-12-grey3 fw-4">Last 30 Days</div>
                <a href="" class="btnView">View More</a>
              </div>
            </div>
          </div>
          <div class="col-12 justify-sb my-2">
            <div class="title-20-grey">TOP ISSUES</div>
            <div class="title-16-dark3">Last 14 Days</div>
          </div>
          <div class="col-12">
            <div class="accordionItems">
              <header class="accordionHeaders h-72">
                <div class="category">
                  <div class="title-12-grey">Category</div>
                  <div class="sub-title-14 fw-500">GCC</div>
                </div>
                <div class="totIssue">
                  <div class="title-12-grey">Total Issue</div>
                  <div class="sub-title-14 fw-500">25</div>
                </div>
                <div class="icons2">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <div class="row">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th>Sub Category</th>
                              <th>Qty</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Production Schedule</td>
                              <td>12</td>
                            </tr>
                            <tr>
                              <td>Ticketing</td>
                              <td>50</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordionItems">
              <header class="accordionHeaders h-72">
                <div class="category">
                  <div class="title-12-grey">Category</div>
                  <div class="sub-title-14 fw-500">JDE</div>
                </div>
                <div class="totIssue">
                  <div class="title-12-grey">Total Issue</div>
                  <div class="sub-title-14 fw-500">25</div>
                </div>
                <div class="icons2">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <div class="row">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th>Sub Category</th>
                              <th>Qty</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Production Schedule</td>
                              <td>12</td>
                            </tr>
                            <tr>
                              <td>Ticketing</td>
                              <td>50</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordionItems">
              <header class="accordionHeaders h-72">
                <div class="category">
                  <div class="title-12-grey">Category</div>
                  <div class="sub-title-14 fw-500">SMQC</div>
                </div>
                <div class="totIssue">
                  <div class="title-12-grey">Total Issue</div>
                  <div class="sub-title-14 fw-500">25</div>
                </div>
                <div class="icons2">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <div class="row">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th>Sub Category</th>
                              <th>Qty</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Production Schedule</td>
                              <td>12</td>
                            </tr>
                            <tr>
                              <td>Ticketing</td>
                              <td>50</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordionItems">
              <header class="accordionHeaders h-72">
                <div class="category">
                  <div class="title-12-grey">Category</div>
                  <div class="sub-title-14 fw-500">HRIS</div>
                </div>
                <div class="totIssue">
                  <div class="title-12-grey">Total Issue</div>
                  <div class="sub-title-14 fw-500">25</div>
                </div>
                <div class="icons2">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <div class="row">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th>Sub Category</th>
                              <th>Qty</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Production Schedule</td>
                              <td>12</td>
                            </tr>
                            <tr>
                              <td>Ticketing</td>
                              <td>50</td>
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
          <div class="col-12 my-3">
            <div class="dotSpace">
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
                <div class="dot4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-12">
            <div class="cards4 p-4">
              <div class="justify-sb">
                <div class="title-20-grey">Issues Statistic</div>
                <div class="title-16-dark-blue2 mr-2">Last 14 Days</div>
              </div>
              <div class="chart-container pl-5 mt-3">
                <canvas id="lineChart" style="height:192px"></canvas>    
              </div>
              <div class="totalIssues">Total Issues</div>
              <div class="justify-sb pl-5">
                <div class="title-16-dark-blue2">Solved Date</div>
                <div class="legends">
                  <div class="legendsWrap">
                    <div class="orange"></div><div class="text">GCC</div>
                  </div>
                  <div class="legendsWrap">
                    <div class="pink"></div><div class="text">SMQC</div>
                  </div>
                  <div class="legendsWrap">
                    <div class="blue"></div><div class="text">JDE</div>
                  </div>
                  <div class="legendsWrap">
                    <div class="green"></div><div class="text">HRIS</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cards-part">
              <div class="cards-head">
                <div class="justify-sb">
                  <div class="title-24-blue title-none">ISSUES IN THE LAST 14 DAYS</div>
                  <div class="containerSearch">
                    <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                  </div>
                </div>
              </div>
              <div class="cards-body p-3">
                <div class="row">
                  <div class="col-12 pb-5">
                    <div class="cards-scroll scrollY" id="scroll-bar">
                      <table id="DTtable_Issues" class="tables3 tbl-content-cost no-wrap">
                        <thead class="stickyHeader">
                          <tr class="bg-thead2">
                            <th>NO</th>
                            <th>USER</th>
                            <th>SUPPORT</th>
                            <th>CATEGORY</th>
                            <th>STATUS</th>
                            <th>ACT</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Hendra Sugandi</td>
                            <td>Sumirat</td>
                            <td>GCC</td>
                            <td>
                              <div class="badge-softOrange-sm">On Progress</div>
                              <!-- <div class="badge-softBlue-sm">Waiting</div> -->
                              <!-- <div class="badge-softPink-sm">Pending</div> -->
                              <!-- <div class="badge-softGreen-sm">Solved</div> -->
                            </td>
                            <td>
                              <div class="container-tbl-btn">
                                <button type="button" class="btn-icon-softBlue btn-quick-access"><i class="fs-20 fas fa-info-circle"></i></button>
                              </div>
                            </td>
                          </tr>
                        </tbody> 
                      </table>
                      @include('CommandCenter2.IT_DT.dt_ticketing.details')
                    </div>
                  </div>
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
    var table = $('#DTtable_Issues').DataTable({
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
    var lineChart = document.getElementById('lineChart').getContext('2d');
    var mylineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "GCC",
                    data:  [23, 15, 40, 30, 56, 40, 80, 60, 95, 98],
                    borderColor: '#F9B935',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "SMQC",
                    data:  [50, 30, 55, 60, 25, 40, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "JDE",
                    data:  [30, 45, 30, 46, 55, 20, 65, 80, 60, 90],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "HRIS",
                    data:  [50, 80, 40, 46, 20, 60, 30, 40, 15, 120],
                    borderColor: '#00DB76',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0
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
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
</script>
@endpush