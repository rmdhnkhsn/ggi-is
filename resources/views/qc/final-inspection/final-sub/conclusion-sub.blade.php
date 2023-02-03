@extends("layouts.app")
@section("title","Final-Inspection")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-inspection.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
@endpush



@push("sidebar")
  @include('qc.final-inspection.layouts.navbar2')
@endpush

@section("content")
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-4 mb-2 mr-auto ml-auto">
            <div class="menu-bar">
              <div class="navigation">
                <ul>
                  <li class="list">
                    <a href="{{ route('finali.header',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-user-tag"></i>
                      </span>
                      <span class="text">Header</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.photos',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                      </span>
                      <span class="text">Photos</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.defects',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-ban"></i>
                      </span>
                      <span class="text">Defects</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.quality',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-cogs"></i>
                      </span>
                      <span class="text">Quality</span>
                    </a>
                  </li>
                  <li class="list active">
                    <a href="{{ route('finali.conclusion',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-comments"></i>
                      </span>
                      <span class="text">Conclusion</span>
                    </a>
                  </li>
                  <div class="indicator"></div>
                </ul>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card-quality">
              <div class="wrapper-quality">
                <div class="row m-3">
                  <h2 class="main-title-qty">RESULT</h2>
                </div>
                <div class="row ml-3 mr-3 mb-2">
                  <div class="col-md-6 mt-2">
                    <div class="wrapper-radio">
                      <input type="radio" name="conclusion_status"  class="conform-radio" id="conform-radio-pattern" 
                      {{ ( $final['remark']    == 'PASS' ? 'checked' : '')  }} disabled>
                      <label for="conform-radio-pattern" class="option option-1">
                        <i class="icon-qty fas fa-check-circle"></i>
                        <span class="qty-title">PASS</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6 mt-2">
                    <div class="wrapper-radio"> 
                      <input type="radio" name="conclusion_status"  class="nonConform-radio" id="nonConform-radio-pattern" 
                      {{ (  $final['remark']    == 'FAIL' ? 'checked' : '')  }} disabled>
                      <label for="nonConform-radio-pattern" class="option option-2">
                        <i class="icon-qty fas fa-times-circle"></i>
                        <span class="qty-title">FAIL</span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="row ml-3 mt-3 mr-3">
                  <div class="col-lg-12">
                    <table class="table-header conclusion-content">
                      <thead>
                        <tr>
                          <th width="3%"></th>
                          <th width="34%" class="bg-table"></th>
                          <th width="20%" class="fw-5 bg-table text-center">CRITICAL</th>
                          <th width="20%" class="fw-5 bg-table text-center">MAJOR</th>
                          <th width="20%" class="fw-5 bg-table text-center">MINOR</th>
                          <th width="3%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td class="text-center">TOTAL DEFECTS FOUND</td>
                          <td class="text-center">
                            {{ $data2->sum('critical') }}
                          </td>
                          <td class="text-center">
                            {{ $data2->sum('major') }}
                          </td>
                          <td class="text-center">
                            {{ $data2->sum('minor') }}
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td class="text-center">ACCEPT REJECT / QTY</td>
                          <td class="text-center">
                            @if($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual2']}}
                            @elseif($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '4.0' )
                              {{ $records['actual3']}}
                            @elseif($finalInspection->inspection_method == 'TIGHTENED' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual']}}
                            @else
                              <p>0</p>
                            @endif                                
                          </td>
                          <td class="text-center">  
                            @if($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual2']}}
                            @elseif($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '4.0' )
                              {{ $records['actual3']}}
                            @elseif($finalInspection->inspection_method == 'TIGHTENED' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual']}}
                            @else
                              <p>0</p>
                            @endif    
                          </td>
                          <td class="text-center">  
                            @if($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual2']}}
                            @elseif($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '4.0' )
                              {{ $records['actual3']}}
                            @elseif($finalInspection->inspection_method == 'TIGHTENED' && $finalInspection->inspection_level == 'II' && $finalInspection->aql == '2.5' )
                              {{ $records['actual']}}
                            @else
                              <p>0</p>
                            @endif    
                          </td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table-header conclusion-content mb-4">
                      <thead>
                        <tr>
                          <td width="3%"></td>
                          <td width="94%" class="fw-5 bg-table text-center">TOTAL DEFECTIVE UNITS</td>
                          <td width="3%"></td>
                        </tr>
                      </thead>
                      <tbody>  
                        <tr>
                          <td width="3%"></td>
                          <td width="94%" class="text-center">
                            {{ $data2->sum(function($item){ return $item->critical+$item->major+$item->minor; }) }}
                          </td>
                          <td width="3%"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-xl-3 col-md-6">
                    <a class="btn btn-submit mt-3 mb-4" id="start-inspect"
                      href="{{ route('finali.header.finishInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                      onclick="event.preventDefault();getElementById('start-inspection-form').submit()">
                      Finish Inspection
                    </a>
                    <form action="{{ route('finali.header.finishInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                          id="start-inspection-form" class="d-none"
                          method="post">
                        @csrf
                        @method('PUT')
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="row"></div>
@endsection

@push("scripts")
@if(Session::has('finish'))
  <script>
    toastr.info("{!!Session::get('finish')!!}");
  </script>
@endif


<script>
   <script>
        function GFG() {
  
            // Accessing input element 
            // type="radio" 
            var x =
                document.getElementById(
                  "radioID").disabled = "false";
            
            document.getElementById(
              "GFG").innerHTML = x;
        }
    </script>
</script>
<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
</script>

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          // accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>
@endpush

