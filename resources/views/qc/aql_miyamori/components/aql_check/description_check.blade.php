@extends("layouts.app")
@section("title","DESCRIPTION CHECK")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content aql">
  <div class="container-fluid accordionRound pb-5">
    <div class="row">
      <div class="col-12">
        <form action="">
          <div class="cards-part">
            <div class="cards-head justify-sb2">
              <div class="title-24-blue">INSPECTION DETAIL</div>
              <div class="flex gap-4">
                <div class="justify-center">
                  <div class="title-14-dark mr-2 title-none">QTY INSPECT :</div>
                  <div class="flex" style="width:160px">
                    <input type="text" class="form-control borderInput" id="" name="" value="4" readonly style="border-radius:10px 0 0 10px">
                    <input type="text" class="form-control borderInput" id="" name="" value="500" readonly style="border-radius:0 10px 10px 0">
                  </div>
                </div>
                <a href="{{ route('aql.check')}}" class="btn-blue-md saved">Save<i class="fs-18 ml-2 fas fa-caret-right"></i></a>
              </div>
            </div>
            <div class="cards-body p-3">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th>NO</th>
                      <th>CATEGORY</th>
                      <th>PART</th>
                      <th>ROLE</th>
                      <th>IE</th>
                      <th>IC</th>
                      <th>IE</th>
                      <th>PL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>上衣TOPS</td>
                      <td>身巾・胸囲・ﾊﾞｽﾄ巾/BUST WIDTH/CHEST</td>
                      <td>
                        <div class="container-tbl-btn w-105">
                          <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn w-105">
                          <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn w-105">
                          <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn w-105">
                          <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                        </div>
                      </td>
                      <td>
                        <div class="container-tbl-btn w-105">
                          <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 100,
      dom: 'rt',
    });
  });

  // $('.saved').on('click', function (event) {
  //   event.preventDefault();
  //   const url = $(this).attr('href');
  //   swal({
  //       title: 'Berhasil Disimpan',
  //       text: 'Data AQL berhasil Ditambahkan',
  //       icon: 'success',
  //       buttons: ["Ok"],
  //   }).then(function(value) {
  //       if (value) {
  //           window.location.href = url;
  //       }
  //   });
  // });

  $('.saved').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Berhasil Disimpan",
        text: "Data AQL berhasil Ditambahkan",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#2e93ff",
        confirmButtonText: "Ok",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        }
    }); 
  });
</script>


@endpush