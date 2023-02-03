@extends("layouts.app")
@section("title","Proses Numbering")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 justify-center">
          <span class="title-24">Proses Numbering</span>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="cards p-4">
            <div class="row">
              <div class="col-12">
                <span class="title-sm">No Ikat</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="" name="" value="" placeholder="Scan RF ID...">
                </div>
              </div>
              <div class="col-12">
                <span class="title-sm">No Urut</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="" name="" value="" placeholder="Scan RF ID...">
                </div>
              </div>
              <div class="col-12">
                <span class="title-sm">RF ID</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input" id="" name="" value="" placeholder="Scan RF ID...">
                </div>
              </div>
              <div class="col-12 justify-start">
                <a href="" data-toggle="modal" data-target="#saveNumbering" class="btn-blue">Save<i class="ml-2 fs-20 fas fa-arrow-right"></i></a>
                @include('production.cutting.product_costing.proses_numbering.partials.form-save-numbering')
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="cards p-4">
            <div class="row">
              <div class="col-12">
                <div class="cards-scroll scrollY" id="scroll-bar" style="max-height:540px">
                  <table id="header-fixed" class="table tbl-content-left no-wrap">
                    <thead>
                      <tr>
                        <th>WO</th>
                        <th>NO URUT</th>
                        <th>NO IKAT</th>
                        <th>COLOR</th>
                        <th>SISA QTY</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>17619722</td>
                        <td>1-5</td>
                        <td>1</td>
                        <td>BLA</td>
                        <td>1235</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="#" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

<!-- <script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollY:'auto',
      "pageLength": 10,
      "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
  });
</script> -->

@endpush