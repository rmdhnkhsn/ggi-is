@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-6">
            <a href="javascript:void(0)" class="btn btn-primary  btn-sm editProduct" data-id="" title="Search Line" data-toggle="modal" data-target="#modal-addReport"><i class="fas fa-plus"></i> Tambah Detail</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.modal -->
    @include('qc.reject_garment.packing.partials.form-modalDetail')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Packing List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>No Box</th>
                      <th>Buyer</th>
                      <th>Style</th>
                      <th>Color</th>
                      <th>WO</th>
                      <th>PO</th>
                      <th>Item</th>
                      <th>Total</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>No Box</th>
                      <th>Buyer</th>
                      <th>Style</th>
                      <th>Color</th>
                      <th>WO</th>
                      <th>PO</th>
                      <th>Item</th>
                      <th>Total</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('qc.reject_garment.layouts.footer')
@include('qc.reject_garment.packing.atribut.sweetalert')
@include('qc.reject_garment.packing.atribut.json2')