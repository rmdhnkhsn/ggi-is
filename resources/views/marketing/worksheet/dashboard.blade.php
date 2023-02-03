@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <span class="main-title">Main Menu</span>
      </div>
    </div>
    <div class="row mt-3">
      @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
      <?php
        $id = 0;
      ?>
      <a href="{{ route('worksheet.po_list',$id)}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-network-wired"></i>
            </div>
            <div class="col-12">
              <div class="main-name">
                PO List
              </div>
            </div>
            <div class="col-12">
              <div class="main-desc">
                <span>Create MD Worksheet, Qty breakdown, Materials, Measurement & Packaging</span>
              </div>
            </div>
          </div>
        </div>
      </a>
      @endif
    </div>
  </div>
</section>
@endsection

@push("scripts")
<!-- <script type="text/javascript">
  const main = document.querySelector('.main-cards');
  main.onmousemove = function(e){
    const x = e.pageX - main.offsetLeft;
    const y = e.pageY - main.offsetTop;

    main.style.setProperty('--x', x + 'px');
    main.style.setProperty('--y', y + 'px');
  }
</script> -->

<!-- <script>
  const buttons = document.querySelectorAll(".main-cards");
    buttons.forEach((button) => {
      button.onclick = function(e){
        let x = e.clientX - e.target.offsetLeft;
        let y = e.clientY - e.target.offsetTop;
        let ripple = document.createElement("span");
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;
        this.appendChild(ripple);
        setTimeout(function(){
          ripple.remove();
        }, 600); // 1second = 1000ms
      }
  });
</script> -->
@endpush