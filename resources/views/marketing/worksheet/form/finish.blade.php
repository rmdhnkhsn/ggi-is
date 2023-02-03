@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
<?php 
  // No PO 
  $po_number = explode(" * ",$master_data->general_identity->no_po);
  $hapus_po_sama= array_map("unserialize", array_unique(array_map("serialize", $po_number)));
  $po = implode("/",$hapus_po_sama);

  // No Contract
  $contract_number = explode(" * ",$master_data->general_identity->contract);
  $hapus_contract_sama= array_map("unserialize", array_unique(array_map("serialize", $contract_number)));
  $contract = implode("/",$hapus_contract_sama);

  // No OR
  $nomor_or_number = explode(" * ",$master_data->general_identity->nomor_or);
  $hapus_nomor_or_sama= array_map("unserialize", array_unique(array_map("serialize", $nomor_or_number)));
  $nomor_or = implode("/",$hapus_nomor_or_sama);

  // Article
  $article_number = explode(" * ",$master_data->general_identity->article);
  $hapus_article_sama= array_map("unserialize", array_unique(array_map("serialize", $article_number)));
  $article = implode("/",$hapus_article_sama);

  // Product name
  $product_name = explode(" * ",$master_data->general_identity->product_name);
  $hapus_product_name_sama= array_map("unserialize", array_unique(array_map("serialize", $product_name)));
  $product_name = implode("/",$hapus_product_name_sama);

  // Product name
  $style_code = explode(" * ",$master_data->general_identity->style_code);
  $hapus_style_code_sama= array_map("unserialize", array_unique(array_map("serialize", $style_code)));
  $style_code = implode("/",$hapus_style_code_sama);

  // Product name
  $style_name = explode(" * ",$master_data->general_identity->style_name);
  $hapus_style_name_sama= array_map("unserialize", array_unique(array_map("serialize", $style_name)));
  $style_name = implode("/",$hapus_style_name_sama);

  $file1="";
  $file2="";
  $file3="";
  $file4="";
  if ($master_data->general_identity != null ) {
      $master_data->general_identity->file==null?:$file1=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file);
      $master_data->general_identity->file2==null?:$file2=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file2);
      $master_data->general_identity->file3==null?:$file3=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file3);
      $master_data->general_identity->file4==null?:$file4=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file4);
  }
?>
<section class="content">
  <div class="container-fluid WSDetail">
    <div class="row">
      <div class="col-12">
        <div class="cards px-4 pt-4">
          <div class="title-16-dark text-center">WORKSHEET</div>
          <div class="title-2">{{strtoupper($master_data->general_identity->buyer)}} - {{$product_name}}</div>
          <div class="descriptions">{{$master_data->general_identity->description}}</div>
          <ul class="nav nav-tabs blue-md-tabs2 mt-5" id="myTab" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link active" data-toggle="tab" href="#info" role="tab"></i>Information</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#breakdown" role="tab"></i>Breakdown Qty</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#material_fabric" role="tab"></i>Material Fabric</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#material_sewing" role="tab"></i>Material Sewing</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#measurement" role="tab"></i>Measurement</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#packing" role="tab"></i>Packing</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12">
        <div class="tab-content card-block">
          <div class="tab-pane active" id="info" role="tabpanel">
            @include('marketing.worksheet.partials.finish.information')
          </div>
          <div class="tab-pane" id="breakdown" role="tabpanel">
            @include('marketing.worksheet.partials.finish.breakdownQTY')
          </div>
          <div class="tab-pane" id="material_fabric" role="tabpanel">
            @include('marketing.worksheet.partials.finish.material_fabric')
          </div>
          <div class="tab-pane" id="material_sewing" role="tabpanel">
            @include('marketing.worksheet.partials.finish.material_sewing')
          </div>
          <div class="tab-pane" id="measurement" role="tabpanel">
            @include('marketing.worksheet.partials.finish.measurement')
          </div>
          <div class="tab-pane" id="packing" role="tabpanel">
            @include('marketing.worksheet.partials.finish.packing')
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>

<script>
  var konten = document.getElementById("konten");
  CKEDITOR.replace(konten,{
    removePlugins: 'save,newpage,flash,about,iframe,language'
  });
  var att_sewing = document.getElementById("att_sewing");
    CKEDITOR.replace(att_sewing,{
    language:'en-gb'
  });
  var att_label = document.getElementById("att_label");
    CKEDITOR.replace(att_label,{
    language:'en-gb'
  });
  var att_ironing = document.getElementById("att_ironing");
    CKEDITOR.replace(att_ironing,{
    language:'en-gb'
  });
  var att_trimming = document.getElementById("att_trimming");
    CKEDITOR.replace(att_trimming,{
    language:'en-gb'
  });
  var att_folding = document.getElementById("att_folding");
    CKEDITOR.replace(att_folding,{
    language:'en-gb'
  });
  var att_packing = document.getElementById("att_packing");
    CKEDITOR.replace(att_packing,{
    language:'en-gb'
  });
  var att_info = document.getElementById("att_info");
    CKEDITOR.replace(att_info,{
    language:'en-gb'
  });
</script>
<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
  
  $('.close-icon').on('click',function() {
    $(this).closest('.card-close').fadeOut();
  })
</script>

@endpush
