@extends("layouts.app")
@section("title","Free Metal")
@push("styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mt-4 mb-2">
        {{-- @include('production.finishing.free_metal.partials.menu-bar') --}}
        <div class="tab-content card-block">
          <div class="tab-pane active" id="packing" role="tabpanel">
              @include('production.finishing.free_metal.partials.packingBox')
          </div>
          {{-- <div class="tab-pane" id="rasio" role="tabpanel">
              @include('production.finishing.free_metal.partials.rasioMeja')
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>

<script>
  document.getElementById('savePacking').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Data Packing Box Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
  document.getElementById('saveRasio').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Data Rasio di Meja Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
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
$('#nik').keyup(function(){
// console.log("ok");
var ID = $(this).val();

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
          // $('#group').val(data.group)
          // $('#gaji').val(data.gp_tun)
        },

      });
    }
  }); 
  $('#wo').keyup(function(){
  // console.log("ok");
  var ID = $(this).val();

    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("folding.getWoData") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#F0101_ALPH').val(data.F0101_ALPH)
          $('#F4801_DL01').val(data.F4801_DL01)
          
        },

      });
    }
  }); 
</script>
<script>
      $('.select2bs4').select2({
    theme: 'bootstrap4'
});
      $('.select2bs45').select2({
    theme: 'bootstrap4'
});
      $('.select2bs46').select2({
    theme: 'bootstrap4'
});
</script>

@endpush