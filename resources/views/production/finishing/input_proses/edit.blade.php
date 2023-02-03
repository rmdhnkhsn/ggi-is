@extends("layouts.app")
@section("title","Input Proses Finishing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-md-8">
            <form action="{{ route('folding.updateChecker', $editData->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="cards" style="padding:26px">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="title-20">Input Data</div>
                        </div>
                        <div class="col-12 mb-3">
                            <span class="title-sm">Category Prosess</span>
                            <div class="flex mt-1">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-network-wired"></i></span>
                                </div>
                                <select class="form-control  border-input-10 select2bs4 livesearch" id="nama_kategori"  name="status_proses"  required>
                                    <option  selected>{{ $editData->status_proses }} </option>
                                    @foreach($dataByCategory as $key => $value)
                                    <option value="{{$value['nama_kategori']}}">{{$value['nama_kategori']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <?php 
                        $test = explode(",",$editData->status)
                        ?>
                        <div class="col-12 mb-3">
                            <span class="title-sm">Category Sub Proses</span>
                             <div class="flex mt-1">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-network-wired"></i></span>
                                </div>
                                <select class="form-control  border-input-10  js-example-basic-multiple" id="sub_kategori"  multiple="multiple" name="status[]"  placeholder="masukkan nik..." required>
                                    @foreach ($test as $key6 => $value6 )
                                        <option  selected> {{ str_replace(['"','[',']'], '', $value6) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">NIK</span>
                            <div class="flex mt-1">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-user"></i></span>
                                </div>
                                <select class="form-control  border-input-10 select2bs4 livesearch" id="nik" name="nik"  required>
                                    <option selected> {{ $editData->nik }}</option>
                                    @foreach($user as $key => $value)
                                    <option value="{{$value['nik']}}">{{$value['nik']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">Nama</span>
                            <input type="text" class="form-control border-input-10 mt-1" name="nama" id="nama" value="{{ $editData->nama }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">WO</span>
                            <div class="flex mt-1">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-list-ol"></i></span>
                                </div>
                                <select class="form-control  border-input-10 select2bs4 livesearch" id="wo" name="wo" required>
                                    <option  selected>{{ $editData->wo }} </option>
                                    @foreach($dataByWo as $key => $value)
                                    <option value="{{$value['wo_no']}}">{{$value['wo_no']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">Style</span>
                            <input type="text" class="form-control border-input-10 mt-1" name="style" id="style_name" value="{{ $editData->style }}" readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <span class="title-sm">Buyer</span>
                            <input type="text" class="form-control border-input-10 mt-1" name="buyer" id="buyer"  value="{{ $editData->buyer}}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <span class="title-sm">Jam Mulai</span>
                            <input type="time" class="form-control border-input-10 mt-1" name="jam_mulai"  value="{{ $editData->jam_mulai }}">
                            <!-- <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" />
                                <span class="input-group-addon">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                            </div> -->
                        </div>
                        <div class="col-6 mb-3">
                            <span class="title-sm">Jam Selesai</span>
                            <input type="time" class="form-control border-input-10 mt-1" name="jam_selesai"  value="{{ $editData->jam_selesai }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">Placing</span>
                            <div class="flex mt-1">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-building"></i></span>
                                </div>
                                <select class="form-control  border-input-10 select2bs4 input-data-fa" id="placing" name="placing">
                                    <option  selected>{{ $editData->placing }} </option>
                                    @foreach($dataBranch as $key => $value)
                                    <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="title-sm">Qty Target</span>
                            <input type="text" class="form-control border-input-10 mt-1" name="qty_target"  value="{{ $editData->qty_target }}">
                        </div>
                        <div class="col-12 mb-3">
                            <span class="title-sm">Keterangan</span>
                            <input type="text" class="form-control border-input-10 mt-1" name="remark"  value="{{ $editData->remark }}">
                        </div>
                        <div class="col-12 justify-start mt-2">
                            <button type="submit" class="btn-blue" id="saveData">Simpan<i class="ml-2 fs-18 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="stickyTop">
                <div class="accordionItem p-3 pb-4"> 
                    <header class="accordionHeader">
                        <img src="{{url('images/job-orientation.svg')}}" style="width:100%" class="imgHero">
                    </header>
                    <div class="row p-2 mt-3 mb-1">
                        <div class="col-12 justify-sb">
                            <div class="title-16">Detail Data By Category</div> 
                            <div class="iconFilter">
                                <i class="icons fas fa-bars" id="icons"></i>
                            </div>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="col-12">
                            <a href="{{ route('proses-details')}}" class="buttonNav">
                                <div class="name">All Division</div>
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="{{ route('proses-detailsFolding')}}" class="buttonNav">
                                <div class="name">Folding</div>
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="{{ route('proses-detailsFreeMetal')}}" class="buttonNav">
                                <div class="name">Free Metal</div>
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="{{ route('proses-detailsNedeleDetector')}}" class="buttonNav">
                                <div class="name">Nedle Detector</div>
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="{{ route('proses-detailsOther')}}" class="buttonNav">
                                <div class="name">Other</div>
                                <i class="fas fa-angle-right"></i>
                            </a>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<!-- <script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->

<script>
$(function() {
  $('#datetimepicker1').datetimepicker({
            format: 'HH:mm'
  });
});
</script>

<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  $('#icons').click(function() {         
    if($(this).hasClass('fa-bars')){
      $(this).removeClass('fa-bars');
      $(this).addClass('fa-times');
    }

    else if($(this).hasClass('fa-times')){
      $(this).removeClass('fa-times');
      $(this).addClass('fa-bars');
    }        
  });
</script>

<script>
  document.getElementById('saveData').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Success',
      text: 'Your Data Has been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordionItem')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.iconFilter')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContent')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
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
   $('#wo').change(function(){
  // console.log("ok");
  var ID = $(this).val();
// console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("packing.getDataWo") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#buyer').val(data.buyer)
          $('#style_name').val(data.style_name)
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
   $('#nik').change(function(){
  // console.log("ok");
  var ID = $(this).val();
// console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("folding.getuser") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#nama').val(data.nama)
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
    $('#nama_kategori').change(function(){
      var ID = $(this).val();    
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("folding.getCategory") }}',           
          type: "post",
          dataType: 'json', 
            success:function(res){               
              if(res){
                  $("#sub_kategori").empty();
                  $("#sub_kategori").append('');
                  $.each(res,function(data,sub_kategori){
                    // console.log(data.sub_kategori);
                      $("#sub_kategori").append('<option value="'+data+'">'+data+'</option>');
                  });
              }else{
                $("#sub_kategori").empty();
              }
            }
          });
      }else{
          $("#sub_kategori").empty();

      }      
    });
</script>

@endpush