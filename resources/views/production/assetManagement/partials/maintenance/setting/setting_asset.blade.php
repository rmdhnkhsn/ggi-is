@extends("layouts.blank.app")
@section("title","Setting Assets")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/dist/css/adminlte2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/singleStyle/maintenance.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<section class="content index">
    <div class="container-fluid">
        <div class="header">
            <div class="buleud"></div>
            @include("layouts.common.breadcrumb")
            <div class="containerBack"> 
                <a href="{{ route('asset.maintenance.index')}}" class="btnBack"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <form  action="{{route('asset.maintenance.updateSettingAssets')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="contents mx-auto mt-mins">
                    <div class="title-30W judul2">Setting Asset</div>
                    <div class="card p-3">
                        <div class="title-20G">Setting Information</div>
                        <div class="borderBlue"></div>
                        <div class="containers">
                            <div class="widthHalf">
                                <div class="title-sm">Mechanic</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="created_by" id="" value="{{ auth()->user()->nama }}" readonly>
                                    {{-- <select class="form-control borderInput pointer" id="" name="" required>
                                        <option selected disabled>Select Mechanic</option>
                                        <option name="Agus">Agus</option>    
                                        <option name="Hendra">Hendra</option>    
                                    </select> --}}
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Spv</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                    </div>
                                    <select class="form-control borderInput pointer" id="" name="spv" required>
                                        <option selected disabled>Select SPV</option>
                                        @foreach ($user as $key =>$value)
                                            <option name="{{ $value['fullname'] }}">{{ $value['fullname'] }}</option> 
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Date</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="date" id="" value="{{ $date }}" style="border-radius:0 10px 10px 0" readonly>
                                    <input type="hidden" class="form-control borderInput" name="time" id="" value="{{$time}}">
                                    <input type="hidden" class="form-control borderInput" name="branch" id="" value="{{ auth()->user()->branchdetail }}">
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Transaction</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-random"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="status" id="" value="Setting" readonly>
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Assets</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-toolbox"></i></span>
                                    </div>
                                    <select class="form-control borderInput pointer" id="id" name="jenis" required>
                                        <option selected disabled>Select Assets</option>
                                        @foreach ($machine as $key4 =>$value4)
                                            <option value="{{ $value4['id'] }}|{{ $value4['jenis'] }}">{{ $value4['serialno'] }}-{{ $value4['jenis'] }}</option> 
                                        @endforeach    
                                    </select>
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">From Location</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="lokasi" id="lokasi" placeholder="Input Location" style="border-radius:0 10px 10px 0">
                                    <input type="hidden" class="form-control borderInput" name="price" id="price" readonly>
                                    <input type="hidden" class="form-control borderInput" name="tipe" id="tipe" readonly>
                                    <input type="hidden" class="form-control borderInput" name="merk" id="merk" readonly>
                                    <input type="hidden" class="form-control borderInput" name="varian" id="varian" readonly>
                                    <input type="hidden" class="form-control borderInput" name="supplier" id="supplier" readonly>
                                    <input type="hidden" class="form-control borderInput" name="id_machine" id="id_machine" readonly>
                                    <input type="hidden" class="form-control borderInput" name="code" id="code" readonly>
                                    <input type="hidden" class="form-control borderInput" name="serialno" id="serialno" readonly>
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Start</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control borderInput" name="start" id="">
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Finish</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control borderInput" name="finish" id="">
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Setting</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tools"></i></span>
                                    </div>
                                    <select class="form-control borderInput pointer" id="" name="setting" required>
                                        <option selected disabled>Select Setting</option>
                                    @foreach ($setting as $key3 =>$value3)
                                            <option name="{{ $value3['setting'] }}">{{ $value3['setting'] }}</option> 
                                        @endforeach    
                                    </select>
                                </div>
                            </div>
                            <div class="widthHalf">
                                <div class="title-sm">Condition</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-heartbeat"></i></span>
                                    </div>
                                    <select class="form-control borderInput pointer" id="kondisi" name="kondisi" required>
                                        <option selected disabled>Select Condition</option>
                                        @foreach ($kondisi as $key2 =>$value2)
                                            <option name="{{ $value2['condition'] }}">{{ $value2['condition'] }}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn-blue-md justify-center h-45 w-full">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $('.saveMaintenance').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "For Saving Maintenance assets !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007bff",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Maintenance Assets failed to save", "error");
        }
    }); 
  });
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
   $('#id').change(function(){
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
            console.log(data)
          $('#id_machine').val(data.id)
          $('#code').val(data.code)
          $('#lokasi').val(data.lokasi)
          $('#serialno').val(data.serialno)
          $('#price').val(data.price)
          $('#tipe').val(data.tipe)
          $('#varian').val(data.varian)
          $('#merk').val(data.merk)
          $('#supplier').val(data.supplier)
          $('#kondisi').val(data.kondisi)
        },

      });
    }
  }); 
</script>
@endpush    