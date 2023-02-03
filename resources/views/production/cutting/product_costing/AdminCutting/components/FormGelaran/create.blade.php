@extends("layouts.app")
@section("title","Create Form Gelaran")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-lg-11 mx-auto">
        <div class="justify-sb mb-3">
          <div class="title-28-dark-blue">Buat Form Gelaran</div>
          <div class="title-14-dark2 c-blue">Form ID : CLN230110-01</div>
        </div>
        <div class="cards3 p-4">
          <div class="title-18-dark mb-2">Informasi Gelaran</div>
          <div class="row">
            <div class="col-md-3">
              <div class="title-sm">Tanggal</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control borderInput" id="" name="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="title-sm">Category</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                </div>
                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                  <option selected disabled>Select Category</option>
                  <option name="Category 1">Category 1</option>    
                  <option name="Category 2">Category 2</option>    
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="title-sm">No Meja</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan no meja">
            </div>
            <div class="col-md-3">
              <div class="title-sm">Overcutt</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan overcutt">
            </div>
            <div class="col-md-3">
              <div class="title-sm">Style/Article</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan style/article">
            </div>
            <div class="col-md-3">
              <div class="title-sm">Item</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan item">
            </div>
            <div class="col-md-3">
              <div class="title-sm">Line Plan</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan line plan">
            </div>
            <div class="col-md-3">
              <div class="title-sm">Country</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan country">
            </div>
            <div class="col-12">
              <div class="title-sm">Buyer</div>
              <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan buyer" readonly>
            </div>
            <div class="col-md-6">
              <div class="title-sm">Panjang Marker</div>
              <div class="row">
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="Panjang">
                </div>
                <div class="col-lg-3">
                  <div class="input-group flex relative my-2">
                    <div class="input-group-prepend">
                      <span class="containerLeft"></span>
                      <div class="borderLeft2"></div>
                    </div>
                    <select class="form-control borderInput select2bs4 pointer" id="" name="">
                      <option selected disabled>Yards</option>
                      <option name="1">1</option>
                      <option name="2">2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="-">
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="-">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="title-sm">Lebar Marker</div>
              <div class="row">
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="Lebar">
                </div>
                <div class="col-lg-3">
                  <div class="input-group flex relative my-2">
                    <div class="input-group-prepend">
                      <span class="containerLeft"></span>
                      <div class="borderLeft2"></div>
                    </div>
                    <select class="form-control borderInput select2bs4 pointer" id="" name="">
                      <option selected disabled>Yards</option>
                      <option name="1">1</option>
                      <option name="2">2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="-">
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control borderInput my-2" id="" name="" placeholder="-">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cards3 p-4">
          <div class="title-18-dark mb-2">Assortmaker</div>
          <div class="flexx gap-3">
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
            <div class="flex">
              <input type="text" class="form-control borderInput w-65" id="" name="" placeholder="Size" style="border-radius:10px 0 0 10px">
              <input type="text" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
            </div>
          </div>
        </div>
        <div class="cards3 p-4" id="deleteWO">
          <div class="title-18-dark mb-2">WO Qty Breakdown</div>
          <div class="row">
            <div class="col-md-6">
              <div class="title-sm">Nomor WO</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>
                </div>
                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                  <option selected disabled>Select WO</option>
                  <option name="11224456">11224456</option>
                  <option name="7894568">7894568</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="title-sm">Color</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-palette"></i></span>
                </div>
                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                  <option selected disabled>Select Color</option>
                  <option name="BLACK">BLACK</option>
                  <option name="WHITE">WHITE</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="title-sm">Fabric 1</div>
                <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                </div>
                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                  <option selected disabled>Select Material</option>
                  <option name="Material 1">Material 1</option>
                  <option name="Material 2">Material 2</option>
                </select>
              </div>
            </div>
            <div class="title-sm">Qty Breakdown</div>
            <div class="flexx gap-3 mt-2">
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="S" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="M" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="L" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="XL" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="XXL" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="XO" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
              <div class="flex">
                <input type="text" class="form-control txtBlue w-65" id="" name="" value="YO" style="border-radius:10px 0 0 10px">
                <input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">
              </div>
            </div>
          </div>
        </div>
        <div id="NewWO"></div>
        <div id="NewMat"></div>
        <div class="row mt-3">
          <div class="col-md-6">
            <button type="button" class="btnSoftBlue w-100 mb-2" id="addWO">Tambah WO</button>
          </div>
          <!-- <div class="col-md-3">
            <button type="button" class="btnSoftBlue w-100 mb-2" id="addMat">Tambah Material</button>
          </div> -->
          <div class="col-md-6">
            <button type="button" class="btn-blue-md w-100 mb-2">Simpan Form</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")

<script>
  $("#addWO").click(function () {
    var html = '';
    html += '<div class="cards3 p-4" id="deleteWO">';
    html += '<div class="title-18-dark mb-2">WO Qty Breakdown</div>';
    html += '<div class="row">';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Nomor WO</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput select2bs4 pointer" id="" name="" required>';
    html += '<option selected disabled>Select WO</option>';
    html += '<option name="11224456">11224456</option>';
    html += '<option name="7894568">7894568</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Color</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-palette"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput select2bs4 pointer" id="" name="" required>';
    html += '<option selected disabled>Select Color</option>';
    html += '<option name="BLACK">BLACK</option>';
    html += '<option name="WHITE">WHITE</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-12">';
    html += '<div class="title-sm">Fabric 1</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput select2bs4 pointer" id="" name="" required>';
    html += '<option selected disabled>Select Material</option>';
    html += '<option name="Material 1">Material 1</option>';
    html += '<option name="Material 2">Material 2</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="title-sm">Qty Breakdown</div>';
    html += '<div class="flexx gap-3 mt-2">';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="S" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="M" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="L" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="XL" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="XXL" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="XO" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '<div class="flex">';
    html += '<input type="text" class="form-control txtBlue w-65" id="" name="" value="YO" style="border-radius:10px 0 0 10px">';
    html += '<input type="number" class="form-control borderInput" id="" name="" placeholder="Qty" style="border-radius:0 10px 10px 0">';
    html += '</div>';
    html += '</div>';
    html += '<button type="button" class="removeRow" id="DeleteWO"><i class="fas fa-times"></i></button>';
    html += '</div>';

    $('#NewWO').append(html);
    select2();
  });

  $(document).on('click', '#DeleteWO', function () {
    $(this).closest('#deleteWO').fadeOut("slow", function() {
      $(this).remove();
    });
  });

  function select2() {
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      searchInputPlaceholder: 'search'
    });
  }
</script>
<!-- <script>
  $("#addMat").click(function () {
    var html = '';
    html += '<div class="cards3 p-4" id="deleteMat">';
    html += '<div class="title-18-dark mb-2">Material - Fabric</div>';
    html += '<div class="row">';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Fabric 1</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput select2bs4 pointer" id="" name="" required>';
    html += '<option selected disabled>Select Material</option>';
    html += '<option name="Material 1">Material 1</option> ';
    html += '<option name="Material 2">Material 2</option> ';
    html += '</select>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Fabric 2</div>';
    html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan fabric 2">';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Pemakaian Kain</div>';
    html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan pemakaian kain">';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Qty Lembur</div>';
    html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="masukkan qty lembur">';
    html += '</div>';
    html += '</div>';
    html += '<button type="button" class="removeRow" id="DeleteMat"><i class="fas fa-times"></i></button>';
    html += '</div>';

    $('#NewMat').append(html);
  });

  $(document).on('click', '#DeleteMat', function () {
    $(this).closest('#deleteMat').fadeOut("slow", function() {
      $(this).remove();
    });
  });
</script> -->

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush