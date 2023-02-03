@extends("layouts.app")
@section("title","Save")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row JobOri" style="padding-bottom:8rem">
        <div class="col-md-7 mx-auto">
            <div class="cards" style="padding:20px 28px">
                <div class="title-24 text-center my-4" style="font-weight:600">Upload Documents</div>
                <div class="col-12 my-3">
                    <span class="title-sm">Document Name</span>
                    <div class="input-group mt-1">
                        <input type="text" class="form-control border-input-10" id="" name="" placeholder="document name..." required>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <span class="title-sm">Select Division</span>
                    <div class="input-group mt-1">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue">Division</span>
                        </div>
                        <select class="form-control border-input-10 select2bs4" name="" id="">
                            <option selected disabled>Select Division</option>
                            <option value="IT">IT</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <span class="title-sm">Select Document Category</span>
                    <div class="tab-content">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="flex">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                        <div class="title-14" style="font-weight:500">Tutorial Cara Membuat Rekap Order</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="flex">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                        <div class="title-14" style="font-weight:500">Admin Purchasing Work Flow</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <button type="submit" id="saveData" class="btn-blue btn-block" style="border-radius:10px">Save<i class="ml-2 fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>

<script>
  document.getElementById('saveData').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Success',
      text: 'Your Documet Has been Saved',
      showConfirmButton: false,
      timer: 1800
    })
  });
</script>

<script>
  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
  });
</script>



@endpush