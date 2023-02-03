@extends("layouts.app")
@section("title","Transaction In")
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
            <form  action="{{route('asset.master.storeAssetTransaction')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title-24-dark">Transaction IN</div>
                        <div class="title-14-dark">Please fill in the fields completely</div>
                    </div>
                    <div class="col-md-3">
                        <div class="title-sm">Supplier</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="nama" name="supplier" required>
                                <option selected disabled>Select Supplier</option>
                                @foreach ($data as $key => $value)
                                    <option name="supplier" value="{{ $value['nama'] }}">{{ $value['nama'] }}</option>
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
                        <div class="flexx gap-5">
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="status" value="Asset" class="radioBlue" id="purchase">
                                <label for="purchase" class="optionBlue check">
                                    <span class="descBlue">Purchase</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="status" value="Rental" class="radioGreen" id="rental">
                                <label for="rental" class="optionGreen check">
                                    <span class="descGreen">Rental</span>
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="status" value="Trial" class="radioOrange" id="trial">
                                <label for="trial" class="optionOrange check">
                                    <span class="descOrange">Trial</span>
                                </label>
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
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Serial No</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Variant</th>
                                        <th>Qty</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-sb mt-4">
                            <a href="#" class="btn-outline-blue-md">Add Column Item <i class="fs-18 ml-2 fas fa-plus"></i></a>
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
        var category =`<select class="form-control borderInput pointer jenis" name="jenis[]" id="jenis`+rand+`" style="width:190px">
                        <option selected disabled>Select Category</option>
                            @foreach ($dataCategory as $key => $value)
                                <option value="{{ $value['jenis'] }}">{{ $value['jenis'] }}</option>
                            @endforeach
                        </select>`
        var location =`<select class="form-control borderInput pointer select2bs4" name="location[]" id="" style="width:190px">
                        <option selected disabled>Select Branch Location</option>
                        @foreach ($dataLocation as $key7 => $value7)
                            <option value="{{ $value7['nama'] }}">{{ $value7['nama'] }}</option>
                        @endforeach
                    </select>`
        var type =`<select class="form-control borderInput pointer select2bs4" name="tipe[]" id="" style="width:190px">
                        <option selected disabled>Select Branch Location</option>
                        @foreach ($dataType as $key7 => $value7)
                            <option value="{{ $value7['tipe'] }}">{{ $value7['tipe'] }}</option>
                        @endforeach
                    </select>`
        var brand =`<select class="form-control borderInput pointer select2bs4" name="merk[]" id="" style="width:190px">
                        <option selected disabled>Select Brand</option>
                        @foreach ($dataBrand as $key4 => $value4)
                            <option value="{{ $value4['merk'] }}">{{ $value4['merk'] }}</option>
                        @endforeach
                    </select>`
        var machine =`<select class="form-control borderInput pointer select2bs4" name="machine[]" id="" style="width:190px">
                        <option selected disabled>Select Branch Location</option>
                        @foreach ($dataMachine as $key7 => $value7)
                            <option value="{{ $value7['jenis'] }}">{{ $value7['jenis'] }}</option>
                        @endforeach
                    </select>`
        var coOrigin =`<select class="form-control borderInput pointer select2bs4" name="coOrigin[]" id="" style="width:190px">
                        <option selected disabled>Select Company Location</option>
                        <option value="GGI">GGI</option>
                        <option value="CNJ">CNJ</option>
                        <option value="CHW">CHW</option>
                        
                    </select>`
        var brOrigin =`<select class="form-control borderInput pointer select2bs4" name="brOrigin[]" id="" style="width:190px">
                        <option selected disabled>Select Branch Origin</option>
                        @foreach ($dataAssetBranch as $key9 => $value9)
                            <option value="{{ $value9['branch_code'] }}">{{ $value9['branch_code'] }}</option>
                        @endforeach
                    </select>`
        var brLocation =`<select class="form-control borderInput pointer select2bs4" name="brLokasi[]" id="" style="width:190px">
                        <option selected disabled>Select Branch Location</option>
                        @foreach ($dataAssetBranch as $key10 => $value10)
                            <option value="{{ $value10['branch_code'] }}">{{ $value10['branch_code'] }}</option>
                        @endforeach
                    </select>`
        var kondisi =`<select class="form-control borderInput pointer select2bs4" name="kondisi[]" id="" style="width:190px">
            <option selected disabled>Select Branch Location</option>
            @foreach ($dataKondisi as $key11 => $value11)
                <option value="{{ $value11['condition'] }}">{{ $value11['condition'] }}</option>
            @endforeach
        </select>`
        $('#DTtable').append('<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105" name="code[]" id=""></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+category+'</div></div></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105" name="serialno[]" id=""></td><td><div class="container-tbl-btn"><div class="input-group flex relative"></div>'+location+'</div></div></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105" name="price[]" id=""></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+type+'</div></div></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+brand+'</div></div></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105" name="varian[]" id=""><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="created_by[]" id="" value="{{ auth()->user()->nama }}"><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="branch[]" id="" value="{{ auth()->user()->branchdetail }}"><input type="hidden" class="form-control borderInput3 container-tbl-btn w-105" name="time[]" id="" value="{{$time}}"></td><td><input type="text" class="form-control borderInput3 container-tbl-btn w-105" name="qty[]" id=""></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+coOrigin+'</div></div></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+brOrigin+'</div></div></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+brLocation+'</div></div></td><td><input type="text" class="form-control borderInput3 container-tbl-btn" name="deskripsi[]" id=""  style="width:190px"></td><td><div class="container-tbl-btn"><div class="input-group flex relative">'+kondisi+'</div></div></td></tr>')
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
/* When click New customer button */
  });
   $('#nama').change(function(){
  console.log("ok");
  var ID = $(this).val();
console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("asset.getSupplier") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#alamat').val(data.alamat)
        },

      });
    }
  }); 
</script>
@endpush