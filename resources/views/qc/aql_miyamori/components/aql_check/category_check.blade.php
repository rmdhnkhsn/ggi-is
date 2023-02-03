@extends("layouts.app")
@section("title","CATEGORY CHECK")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content aql">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-5">
        <img src="{{url('images/icon/qc/aql/aql_list.svg')}}" class="bg-category">
      </div>
      <div class="col-md-7">
        <div class="cardPart bg-white p-3">
          <div class="justify-sb">
            <div class="title-20-dark2 title-none">INSPECTION PART/CATEGORY</div>
            <button type="button" class="btn-blue-md no-wrap addCategory" id="addCategory">Add Category <i class="fs-18 ml-2 fas fa-plus-circle"></i></button>
          </div>
        </div>
        <div id="newRowSize"></div>
        <a href="{{ route('aql.quantity.check')}}" class="btn-blue-md relative zIndex mt-3">Save & Next</a>
        <img src="{{url('images/icon/qc/aql/bg.svg')}}" class="bg-category2">
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script>
  i = 1
  $("#jumlahRow").val(i)
  $("#addCategory").click(function () {
      var html = '';
      html += '<div class="cardPart bg-white p-4" id="deleteCard">';
      html += '<div class="row">';
      html += '<div class="col-12">';
      html += '<div class="title-sm">Category</div>';
      html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Category" >';
      html += '</div>';
      html += '<div class="col-12">';
      html += '<div class="cardPart w-100 p-3" id="newRow_' + i + '">';
      html += '<div class="w-100" id="deleteRow">';
      html += '<div class="title-sm mb-1">Part</div>';
      html += '<div class="justify-start gap-4 mb-3">';
      html += '<input type="text" class="form-control borderInput" id="" name="" placeholder="Input Category">';
      html += '<button type="button" class="DeleteRow" id="btnDelete2"><i class="iconDel fas fa-times"></i></button>';
      html += '</div>';
      html += '</div>';
      html += '</div>';
      html += '<button type="button" class="btn-yellow-md btn-block mt-3"  id="addPart_'+i+'" style="border-radius:10px">Add Part<i class="ml-2 fas fa-plus-circle"></i></button>';
      html += '</div>';
      html += '<button type="button" class="removeRow" id="btnDelete"><i class="fas fa-times"></i></button>';

      $('#newRowSize').append(html);
      
      var z = i;
      $("#addPart_"+z).click(function () {
          var html = '';
          html += '<div class="w-100" id="deleteRow">';
          html += '<div class="title-sm mb-1">Part</div>';
          html += '<div class="justify-start gap-4 mb-3">';
          html += '<input type="text" class="form-control borderInput" id="" name="" placeholder="Input Category">';
          html += '<button type="button" class="DeleteRow" id="btnDelete2"><i class="iconDel fas fa-times"></i></button>';
          html += '</div>';

          $("#newRow_"+z).append(html);
      })
      i++
      $("#jumlahRow").val(i)
  });

  $(document).on('click', '#btnDelete', function () {
      $(this).closest('#deleteCard').fadeOut("slow", function() {
        $(this).remove();
      });
  });

  $(document).on('click', '#btnDelete2', function () {
      $(this).closest('#deleteRow').fadeOut("slow", function() {
        $(this).remove();
      });
  });

  $(document).ready(function () {
    $(".addCategory").click();
  });
</script>

@endpush