@extends("layouts.app")
@section("title","Trial")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards p-4 o-hidden">
            <form  action="{{route('asset.master.storeAssetTransactionOut')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title-24-dark">Transaction Out</div>
                        <div class="title-14-dark">Please fill in the fields completely</div>
                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Supplier</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="name" name="supplier" required>
                                <option selected disabled>Select Supplier</option>
                                @foreach ($dataSupplier as $key2 => $value2)
                                    <option name="supplier" value="{{ $value2['name'] }}">{{ $value2['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="recipient" id="alamat">
                            <input type="hidden" name="id_machine"> 
                            <input type="hidden" name="id"> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" name="date" id="" value="{{ $date }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Transaction Category</div>
                        <div class="flexx gap-3 mt-1">
                            <div class="col-md-4">
                                <div class="wrapperRadio mb-3">
                                    <input type="radio" name="status22" value="Sale" class="radioBlue" id="sale1">
                                    <label for="sale1" class="optionBlue check">
                                        <span class="descBlue">Sale</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wrapperRadio mb-3">
                                    <input type="radio" name="status22" value="RentalFinished" class="radioGreen" id="rental1">
                                    <label for="rental1" class="optionGreen check">
                                        <span class="descGreen">Rental Finished</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wrapperRadio mb-3">
                                    <input type="radio" name="status" value="TrialFinished" class="radioOrange" id="trial1" checked>
                                    <label for="trial1" class="optionOrange  check actived ">
                                        <span class="descOrange">Trial Finished</span>
                                    </label>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-12">
                        <div class="borderlight2 my-3"></div>
                    </div>
                <div class="col-12">
                    <div class="title-20 text-left">ITEM LIST</div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button> -->
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table id="DTtable" class="table tbl-content no-wrap">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>NO</th>
                                        <th>Serial No</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Variant</th>
                                        <th>Qty</th>
                                        {{-- <th>Machine</th> --}}
                                        <th>Company Origin</th>
                                        <th>Branch Origin</th>
                                        <th>Branch Location</th>
                                        <th>Description</th>
                                        <th>Condition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        {{-- <td></td> --}}
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flexx gap-3 mt-4">
                            <a href="#" class="btn-outline-blue-md no-wrap">Add Collumn Item <i class="fs-18 ml-2 fas fa-plus"></i></a>
                            <div class="input-group flex">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue"><i class="fs-20 fas fa-database"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4 pointer" id="id">
                                    <option value="" selected>Pilih Serial Number Mesin</option>
                                    @foreach($data as $key => $value)
                                            <option value="{{$value->id}}">{{$value->serialno}}-{{$value->jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('asset.transaction.index')}}" class="btnSoftBlue w-140"><i class="fs-18 mr-2 fas fa-arrow-left"></i> Back</a>
                                <button type="submit" class="btn-blue-md w-140">Save <i class="fs-18 ml-2 fas fa-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>



<script>
  $('.saveAll').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Successfully',
      text: 'SMV data Sucessfully Created.',
      buttons: false,
      timer: 2000
    })
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<script>
	$().ready(function(){
        var table = $('#DTtable').DataTable({
            // scrollX : '100%',
            "pageLength": 15,
            "dom": '<"search"><"top">rt<"bottom"><"clear">'
        });
	});
</script>

<script>
    var JmlRow = 0;
    var record_id = 1
    $('#DTtable').on('click', '.btn-delete-row2', function () {
        $(this).closest('tr').remove();
    })
    $('.btn-outline-blue-md').click(function () {
        JmlRow++
        var rand = JmlRow
        record_id =JmlRow
        $("#JmlRow").val(JmlRow)
        $('#DTtable').append('<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td><input type="text" class="form-control borderInput3 container-tbl-btn" name="no[]" id="no" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn serialno2" name="serialno[]" id="serialno" style="width:190px" data-record_id="'+rand+'"><input type="hidden" class="form-control borderInput3 container-tbl-btn id_mesin" name="id_mesin[]" id="serialno" style="width:190px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105 code" name="code[]" id="code" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn category" name="category[]" id="category" style="width:200px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn lokasi name="lokasi[]" id="lokasi" style="width:190px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105 price" name="price[]" id="price" data-record_id="'+rand+'" required></td><td><input type="text" class="form-control borderInput3 container-tbl-btn tipe" name="tipe[]" id="tipe" style="width:150px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn merk" name="merk[]" id="merk" style="width:150px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn varian" name="varian[]" id="varian" style="width:180px" data-record_id="'+rand+'"><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="time[]" id="" value="{{$time}}"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105 qty" name="qty[]" id="qty" value="1" style="width:150px" data-record_id="'+rand+'"></td><<td><input type="text" class="form-control borderInput3 container-tbl-btn coOrigin" name="coOrigin[]" id="coOrigin" style="width:150px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn brOrigin" name="brOrigin[]" id="brOrigin" style="width:150px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn brLokasi" name="brLokasi[]"  style="width:150px" data-record_id="'+rand+'" Required><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="created_by[]" id="" value="{{ auth()->user()->nama }}"><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="branch[]" id="" value="{{ auth()->user()->branchdetail }}"><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="time[]" id="" value="{{$time}}"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn deskripsi" name="deskripsi[]" id="deskripsi" style="width:230px" data-record_id="'+rand+'"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn kondisi" name="kondisi[]" id="kondisi" style="width:150px"></td></tr>')
    });

    $("document").ready(function() {
        $(".btn-outline-blue-md").trigger('click');
    });
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
   $('#name').change(function(){
    var ID = $(this).val();
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("asset.getBranch") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#alamat').val(data.address)
        },

      });
    }
  }); 
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
  });
   $('#id').change(function(){
    const tbody = document.getElementsByTagName('tbody')[0];
    let serialno2 = tbody.lastChild.getElementsByClassName('serialno2')[0];
    let varian = tbody.lastChild.getElementsByClassName('varian')[0];
    let category = tbody.lastChild.getElementsByClassName('category')[0];
    let code = tbody.lastChild.getElementsByClassName('code')[0];
    let price = tbody.lastChild.getElementsByClassName('price')[0];
    // let qty = tbody.lastChild.getElementsByClassName('qty')[0];
    let lokasi = tbody.lastChild.getElementsByClassName('lokasi')[0];
    let tipe = tbody.lastChild.getElementsByClassName('tipe')[0];
    let coOrigin = tbody.lastChild.getElementsByClassName('coOrigin')[0];
    let brOrigin = tbody.lastChild.getElementsByClassName('brOrigin')[0];
    // let brLokasi = tbody.lastChild.getElementsByClassName('brLokasi')[0];
    let deskripsi = tbody.lastChild.getElementsByClassName('deskripsi')[0];
    let kondisi = tbody.lastChild.getElementsByClassName('kondisi')[0];
    let merk = tbody.lastChild.getElementsByClassName('merk')[0];
    let id_mesin = tbody.lastChild.getElementsByClassName('id_mesin')[0];

  var id = $(this).val();
    if(id){
        $.ajax({
        data: {
          id: id,
        },
        url: '{{ route("asset.getMachine") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {    
            serialno2.value = data.serialno
            varian.value = data.varian
            category.value = data.jenis
            code.value = data.code
            price.value = data.price
            // qty.value = data.qty
            lokasi.value = data.lokasi
            tipe.value = data.tipe
            coOrigin.value = data.coOrigin
            brOrigin.value = data.brOrigin
            // brLokasi.value = data.brLokasi
            deskripsi.value = data.deskripsi
            kondisi.value = data.kondisi
            merk.value = data.merk
            id_mesin.value = data.id
        },

      });
    }
  }); 
</script>
@endpush