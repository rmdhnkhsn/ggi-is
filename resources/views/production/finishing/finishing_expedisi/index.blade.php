@extends("layouts.app")
@section("title","Finishing To Expedisi")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")

<style>
  ::placeholder {
    color: #fff;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 mb-2">
        <div class="cards-18" style="padding: 30px 35px">
          <div class="title-22 text-center">Form Input PL Finishing to Expedition</div>
          <div class="justify-center">
            <div class="borderBlue"></div>
          </div>
          <div class="row mt-4">
            <div class="col-md-6 mb-3">
              <span class="title-sm">WO</span>
              <div class="flex mt-1">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:55px"><i class="fs-20 fas fa-list-ol"></i></span>
                </div>
                <select class="form-control border-input-10 select2bs4" style="width:100%" name="" id="">
                  <option selected disabled>Select WO</option>
                  <option value="112233">112233</option>
                  <option value="445566">445566</option>
                  <option value="778899">778899</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">Style</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan style..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">PO</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan PO..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">OR</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan OR..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">Buyer</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="buyer..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">Agent</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="agent..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">Nomor Kontrak</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan nomor kontrak..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">QTY Order</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan qty..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">Warehouse</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan warehouse..." required>
              </div>
            </div>
            <div class="col-md-6">
              <span class="title-sm">OFF CTN</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" id="" name="" placeholder="masukkan off ctn..." required>
              </div>
            </div>
            <div class="col-12">
              <span class="title-sm">Tanggal</span>
              <div class="input-group date mt-1" id="Date" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                  <div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; padding: 0 20px; gap: .7rem !important">
                    <i class="fas fa-calendar-alt"></i><span class="fs-14">Date</span><i class="fas fa-caret-down"></i>
                  </div>
                </div>
                <input type="text" class="form-control datetimepicker-input border-input-10" data-target="#Date" placeholder="Select Date"/>
              </div>
            </div>

            <div class="col-12 my-4">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button class="btn-green btn-block" id="addSize" style="border-radius:10px">Add Size<i class="ml-3 fas fa-plus"></i></button>
              @include('production.finishing.packing_list.partials.modal')
            </div>
          </div>
        </div>
        <div id="newRowSize"></div>
        <div class="row my-3">
          <div class="col-12">
            <button type="submit" id="save" class="btn-blue btn-block" style="border-radius:10px">Simpan<i class="ml-3 fas fa-download"></i></button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="cards-18" style="padding: 28px 22px">
          <div class="title-20 text-left">Daily Target Buyer List</div>
          <div class="row mt-4">   
            <div class="col-12">
              <div class="cards-scroll pr-2 scrollY" id="scroll-bar-sm" style="max-height:382px">
                <table class="table tbl-content-left">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>BUYER</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>H & M</td>
                      <td>
                        <div class="container-tbl-btn">
                          <a href="{{ route('expedisi-details')}}" class="btn-blue-md" style="width:110px">Details<i class="fs-18 ml-2 fas fa-chevron-right"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Lorem ipsum</td>
                      <td>
                        <div class="container-tbl-btn">
                          <a href="{{ route('expedisi-details')}}" class="btn-blue-md" style="width:110px">Details<i class="fs-18 ml-2 fas fa-chevron-right"></i></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="cards-18" style="padding: 28px 22px">
          <div class="title-20 text-left">All Data Packing List</div>
          <div class="row mt-4">   
            <div class="col-12">
              <div class="cards-scroll pr-2 scrollY" id="scroll-bar-sm" style="max-height:382px">
                <table class="table tbl-content-left">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>WO</th>
                      <th>BUYER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="clickable-row" data-href="">
                      <td>1</td>
                      <td>17845276</td>
                      <td>H & M</td>
                    </tr>
                    <tr class="clickable-row" data-href="">
                      <td>2</td>
                      <td>17845276</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-12 mt-3">
              <a href="" class="btn-blue-md">See Details<i class="fs-18 ml-3 fas fa-chevron-right"></i></a>
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
<script src="{{asset('/js/packing_list/script.js')}}"></script>


<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  document.getElementById('save').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Success',
      text: 'Data Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $('#Date').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })
</script>

@endpush