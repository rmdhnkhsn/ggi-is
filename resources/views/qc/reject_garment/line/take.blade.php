@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">NO WO</span>
                <span class="info-box-number">{{$request['no_wo']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="font-size:15px;">LINE</span>
                <span class="info-box-number" style="font-size:15px;">{{$request['line']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ITEM DESC</span>
                <span class="info-box-number">{{$request['item_desc']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">BUYER</span>
                <span class="info-box-number">{{$request['buyer']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('qc.reject_garment.line.partials.form-modal')
        <div class="row">
          <div class="col-lg-2 col-4">
            <a href="{{route('line.get', $request['id_line'])}}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-home"></i> Index</a>
          </div>
          <div class="col-lg-2 col-4">
            <button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus"></i> Tambah</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Line Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Supervisor</th>
                            <th>Style</th>
                            <th>Article</th>
                            <th>Item</th>
                            <th>Colour</th>
                            <th>Qty</th>
                            <th>Size</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tanggal}}</td>
                      <td>{{$value->supervisor}}</td>
                      <td>{{$value->style}}</td>
                      <td>{{$value->article}}</td>
                      <td>{{$value->item}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->qty}}</td>
                      <td>{{$value->size}}</td>
                      <td>
                        @if($value->detail_id == 0)
                        <button class="btn btn-primary btn-sm addDetail" data-toggle="modal" data-id="{{ $value->id }}" title="Tambah Detail" data-target="#modal-breakdown"><i class="fas fa-pencil-alt"></i></button>
                        @else
                        <a href="javascript:void(0)" class="btn btn-info btn-sm showDetail" data-id="{{ $value->id }}" title="Lihat Detail" data-toggle="modal" data-target="#modal-showDetail"><i class="fas fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-warning btn-sm editDetail" data-id="{{ $value->id }}" title="Edit Detail" data-toggle="modal" data-target="#modal-editDetail"><i class="fas fa-cog"></i></a>
                        @endif
                      </td>
                      <td>
                        <a href="javascript:void(0)" class="btn btn-warning btn-sm editProduct" data-id="{{ $value->id }}" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
                        @if($value->detail_id == 0)
                        <a href="{{route('line.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Hapus"><i class="far fa-trash-alt"></i></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
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
  </div>
@include('qc.reject_garment.layouts.footer')
@include('qc.reject_garment.line.atribut.sweetalert')
@include('qc.reject_garment.line.atribut.json')