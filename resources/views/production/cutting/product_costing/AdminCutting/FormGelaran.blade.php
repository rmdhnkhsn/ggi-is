@extends("layouts.app")
@section("title","Form Gelaran")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<style>
  .nav-tabs { 
    border-bottom: 1px solid #f2f2f2; 
    margin-bottom: -1px;
  }
</style>
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        @include('production.cutting.product_costing.AdminCutting.partials.nav-menu')
        <div class="cards-part">
          <div class="cards-head">
            <div class="justify-sb3">
              <div class="title-24-blue no-wrap mt-1">Form Gelaran<span class="notif-message">(Buat Form, Assortmaker, action belum)</span></div> 
              <div class="flex gap-3">
                <a href="{{ route('create.gelaran')}}" class="btn-blue-md no-wrap d-inline-flex">Buat Form</a>
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-body">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost">
                    <thead>
                      <tr class="bg-thead2 no-wrap">
                        <th>FORM</th>
                        <th>TANGGAL</th>
                        <th>BUYER</th>
                        <th>STYLE</th>
                        <th>COLOR</th>
                        <th>Assort</th>
                        <th>P Maker</th>
                        <th>L Maker</th>
                        <th>Qty</th>
                        <th>Act</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($form as $key => $value)
                      <tr>
                        <td>
                          <a href="#" class="c-orange fw-500 no-wrap" data-toggle="modal" data-target="#form-{{$value->id}}">CLN230110-{{$value->id}}</a> 
                          @include('production.cutting.product_costing.AdminCutting.components.FormGelaran.form')
                        </td>
                        <?php
                          $buyer = collect($value->gelaran_wo)
                                  ->groupBy('buyer')
                                  ->map(function ($item) {
                                          return array_merge(...$item->toArray());
                                  })->values()->toArray();
                          $nama_buyer = collect($buyer)->implode('buyer', ' *|* ');
                          $color = collect($value->gelaran_wo)
                                  ->groupBy('color')
                                  ->map(function ($item) {
                                          return array_merge(...$item->toArray());
                                  })->values()->toArray();
                          $nama_color = collect($color)->implode('color', ' *|* ');
                          $style = collect($value->gelaran_wo)
                                  ->groupBy('style')
                                  ->map(function ($item) {
                                          return array_merge(...$item->toArray());
                                  })->values()->toArray();
                          $nama_style = collect($style)->implode('style', ' *|* ');
                        ?>
                        <td class="no-wrap">{{$value->date}}</td>
                        <td class="no-wrap">{{$nama_buyer}}</td>
                        <td>{{$nama_style}}</td>
                        <td class="no-wrap">{{$nama_color}}</td>
                        <td>
                          <a href="#" class="c-orange fw-500" data-toggle="modal" data-target="#assort-{{$value->id}}">{{$value->total_ratio}}</a> 
                          @include('production.cutting.product_costing.AdminCutting.components.FormGelaran.assort')
                        </td>
                        <td>{{$value->panjang_marker}}</td>
                        <td>{{$value->lebar_marker}}</td>
                        <td>
                          <?php
                          $total_qty = collect($value->gelaran_wo)->sum('total_qty');
                          ?>
                          {{$total_qty}}
                        </td>
                        <td>
                          <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a href="{{ route('edit.gelaran')}}" class="dropdown-item"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Detail</a>
                            <a href="" class="dropdown-item"><i class="mr-2 fs-18 fas fa-forward"></i>Proses</a>
                            <a href="{{ route('detail.gelaran')}}" class="dropdown-item"><i class="mr-2 fs-18 fas fa-search"></i>Detail</a>
                            <a href="" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
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
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Data yang dihapus tidak akan bisa dikembalikan lagi !",
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
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'frtp'
    });
  });

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('#DTtable_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });
</script>
@endpush