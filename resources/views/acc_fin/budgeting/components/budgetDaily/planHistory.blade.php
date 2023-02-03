@extends("layouts.app")
@section("title","Plan History")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@push("sidebar")
  @include('acc_fin.budgeting.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="justify-sb3 p-3">
              <div class="title-24-grey no-wrap">Plan History {{$periode}}</div>
              <div class="endSide flexx gap-3">
                <div class="justify-center">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput w-135" data-target="#showDate" placeholder="Select Date"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody warehouseIR p-3">
            <!-- <div class="accordionItems">
              <header class="accordionHeaders">
                <div class="dates">
                  <div class="title-12-grey">DATE</div>
                  <div class="sub-title-14">03-01-2022</div>
                </div>
                <div class="plan">
                  <div class="title-12-grey">PLAN BUDGET</div>
                  <div class="sub-title-14">$ 4,80</div>
                </div>
                <div class="actual">
                  <div class="title-12-grey">ACTUAL BUDGET</div>
                  <div class="sub-title-14">$ 5,90</div>
                </div>
                <div class="action">
                  <div class="today">
                    <div class="circleGreen"></div>
                    <div class="title-12-grey">Today</div>
                  </div>
                  <a href="" class="btn-icon-yellow"><i class="fs-20 fas fa-pencil-alt"></i></a>
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
                              <th rowspan="2" style="padding-top:2rem">NO</th>
                              <th rowspan="2" style="padding-top:2rem">NO ACCOUNT</th>
                              <th rowspan="2" style="padding-top:2rem">ACCOUNT DESCRIPTION</th>
                              <th colspan="4" class="text-center">BRANCH</th>
                              <th rowspan="2" style="padding-top:2rem">ACTUAL BUDGET</th>
                            </tr>
                            <tr class="bg-thead2">
                              <th>1201</th>
                              <th>1204</th>
                              <th>1205</th>
                              <th>1206</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>1202.63558</td>
                              <td>LABORCOST</td>
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 20,80</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            @foreach($daily_plan as $key=>$value)
            <div class="accordionItems">
                @if($key>=$date)
              <header class="accordionHeaders today">
                @else
              <header class="accordionHeaders">
                @endif
                <div class="dates">
                  <div class="title-12-grey">DATE</div>
                  <div class="sub-title-14">{{$key}}</div>
                </div>
                <div class="plan">
                  <div class="title-12-grey">PLAN BUDGET</div>
                  <div class="sub-title-14">$ {{$value->sum('plan_budget')}}</div>
                </div>
                <div class="action">
                  @if($key==$date)
                  <div class="today">
                    <div class="circleGreen"></div>
                    <div class="title-12-grey">Today</div>
                  </div>
                  @endif
                  <a href="{{ route('acc.budget.editBudget','tanggal='.$key)}}" class="btn-icon-yellow"><i class="fs-20 fas fa-pencil-alt"></i></a>
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
                              <th>NO</th>
                              <th>NO ACCOUNT</th>
                              <th>ACCOUNT DESCRIPTION</th>
                              <th>BRANCH</th>
                              <th>BUYER</th>
                              <th>Explanation</th>
                              <th>Plan Budget</th>
                              <th>Kurs</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($value as $k =>$v)
                              <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$v->no_account}}</td>
                                <td>{{$v->desc_account}}</td>
                                <td>{{$v->branch}}</td> 
                                <td>{{$v->buyer}}</td> 
                                <td>{{$v->explanation}}</td> 
                                <td><span class="title-14-light mr-2">$</span> {{$v->plan_budget}}</td>
                                <td>{{$v->type}} {{$v->kurs}}</td> 
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- <div class="accordionItems">
              <header class="accordionHeaders today">
                <div class="dates">
                  <div class="title-12-grey">DATE</div>
                  <div class="sub-title-14">03-01-2022</div>
                </div>
                <div class="plan">
                  <div class="title-12-grey">PLAN BUDGET</div>
                  <div class="sub-title-14">$ 4,80</div>
                </div>
                <div class="actual">
                  <div class="title-12-grey">ACTUAL BUDGET</div>
                  <div class="sub-title-14">$ 5,90</div>
                </div>
                <div class="action">
                  <div class="today">
                    <div class="circleGreen"></div>
                    <div class="title-12-grey">Today</div>
                  </div>
                  <a href="{{ route('acc.budget.editBudget')}}" class="btn-icon-yellow"><i class="fs-20 fas fa-pencil-alt"></i></a>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent today">
                  <div class="row">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th rowspan="2" style="padding-top:2rem">NO</th>
                              <th rowspan="2" style="padding-top:2rem">NO ACCOUNT</th>
                              <th rowspan="2" style="padding-top:2rem">ACCOUNT DESCRIPTION</th>
                              <th colspan="4" class="text-center">BRANCH</th>
                              <th rowspan="2" style="padding-top:2rem">ACTUAL BUDGET</th>
                            </tr>
                            <tr class="bg-thead2">
                              <th>1201</th>
                              <th>1204</th>
                              <th>1205</th>
                              <th>1206</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>1202.63558</td>
                              <td>LABORCOST</td>
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 5,20</td> 
                              <td><span class="title-14-light mr-2">$</span> 20,80</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
  $('#showDate').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
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