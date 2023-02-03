@extends("layouts.app")
@section("title","DAILY CUTTING")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content relative">
  <div class="container-fluid role">
    <div class="row pb-5">
      <div class="col-12 mb-3">
        <div class="cards-part border-light">
          <div class="cards-head border-head">
            <div class="joblist-date">
              <div class="title-20-blue no-wrap">Daily Gelaran Cutting</div>
              <div class="flex gap-3">
                <a href="" class="btn-blue-md no-wrap" data-toggle="modal" data-target="#addRole">Add <span class="title-none ml-1">Role</span>  <i class="fs-18 ml-2 fas fa-plus"></i></a>
                @include('it_dt.RoleManagement.partials.role.addRole')
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>  
          <div class="cards-body">
            <!-- <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th width="25px">ID</th>
                        <th>ROLE NAME</th>
                        <th>MODULE ALLOWED</th>
                        <th width="30px">SET ACCESS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>sys_admin</td>
                        <td>approval accounting, framework, ticketing</td>
                        <td>
                          <div class="container-tbl-btn">
                            <a href="" class="btn-icon-yellow btnCanvasRight"><i class="fs-20 fas fa-gear"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>adm_produksi</td>
                        <td>framework, request mr, it ticketing</td>
                        <td>
                          <div class="container-tbl-btn">
                            <a href="" class="btn-icon-yellow btnCanvasRight"><i class="fs-20 fas fa-gear"></i></a>
                          </div>
                        </td>
                      </tr>
                    </tbody> 
                  </table>
                </div>
              </div>
            </div>  -->
          </div>
        </div>
      </div>
      @include('it_dt.RoleManagement.partials.role.canvasRole')
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'frtp'
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
  $(document).ready(function($){
    $(document).on('click', '.btnCanvasRight', function(){
      $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
      if($(this).hasClass('btnCanvasRight'))
        $('.bs-canvas-right3').addClass('mr-0');
      else
        $('.bs-canvas-left').addClass('ml-0');
      return false;
    });
    
    $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
      var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas3') : $('.bs-canvas3');
      elm.removeClass('mr-0 ml-0');
      $('.bs-canvas-overlay').remove();
      return false;
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#filter").keyup(function(){
      var filter = $(this).val(), count = 0;
      $(".liveSearchBar li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).fadeOut();
        } else {
          $(this).show();
          count++;
        }
      });
    });
  });
</script>
@endpush