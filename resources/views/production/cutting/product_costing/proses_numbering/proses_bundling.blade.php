@extends("layouts.app")
@section("title","Proses Bundling")
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
          <span class="title-24">Proses Bundling</span>
        </div>
      </div>
      <?php
      $no = collect($data->data_bundling)->count('id');
      if ($no == 0) {
        $no_ikat = 1;
        $urut_awal = 1;
        $urut_akhir = 5;
        $sisa = $data->qty-5;
        $rf_id = $data->no_wo.' ('.$data->size.$no_ikat.$data->color.'-'.$urut_awal.'/'.$urut_akhir.')';
      }else {
        $coba = collect($data->data_bundling)->last();
        $no_ikat = $coba->no_ikat+1;
        $urut_awal = $coba->urut_awal+5;
        $urut_akhir = $coba->urut_akhir+5;
        $sisa = $coba->sisa-5;
        $rf_id = $data->no_wo.' ('.$data->size.$no_ikat.$data->color.'-'.$urut_awal.'/'.$urut_akhir.')';
      }
      ?>
      <?php 
        $isian = collect($data->data_bundling)->count('id');
      ?>
      <div class="row mt-3">
        @if($isian == 0)
          <div class="col-md-5">
            <div class="cards p-4">
              <form action="{{ route('proses_bundling.input_rfid')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <span class="title-sm">No Ikat</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="hidden" id="form_id" name="form_id" value="{{$data->form_id}}">
                      <input type="hidden" id="proses_id" name="proses_id" value="{{$data->id}}">
                      <input type="hidden" id="sisa" name="sisa" value="{{$sisa}}">
                      <input type="text" class="form-control border-input" id="no_ikat" name="no_ikat" value="{{$no_ikat}}" placeholder="No Ikat">
                    </div>
                  </div>
                  <div class="col-12">
                    <span class="title-sm">No Urut</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="hidden" id="urut_awal" name="urut_awal" value="{{$urut_awal}}">
                      <input type="hidden" id="urut_akhir" name="urut_akhir" value="{{$urut_akhir}}">
                      <input type="text" class="form-control border-input" value="{{$urut_awal}}-{{$urut_akhir}}" placeholder="No Urut">
                    </div>
                  </div>
                  <div class="col-12">
                    <span class="title-sm">RF ID</span>
                    <div class="input-group mt-1 mb-3">
                      <input type="text" class="form-control border-input" id="rf_id" name="rf_id" value="{{$rf_id}}" placeholder="Scan RF ID...">
                    </div>
                  </div>
                  <div class="col-12 justify-start">
                    <button type="submit" data-toggle="modal" data-target="#saveNumbering" class="btn-blue">Save<i class="ml-2 fs-20 fas fa-arrow-right"></i></button>
                  </div>
                </div>
              </form>  
            </div>
          </div>
        @endif
        @if($isian == 0)
        <div class="col-md-7">
        @else
        <div class="col-md-12">
        @endif
          <div class="cards p-4">
            <div class="row">
              <div class="col-12">
                <div class="cards-scroll scrollXY" id="scroll-bar" style="max-height:540px">
                  <table id="header-fixed" class="table tbl-content-left no-wrap">
                    <thead>
                      <tr>
                        <th>WO</th>
                        <th>NO IKAT</th>
                        <th>NO URUT</th>
                        <th>COLOR</th>
                        <th>RF ID</th>
                        <th>RF ID Manual</th>
                        <th>SISA QTY</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->data_bundling as $key => $value)
                      <tr>
                        <td>{{$data->no_wo}}</td> 
                        <td>{{$value->no_ikat}}</td>
                        <td>{{$value->urut_awal}}-{{$value->urut_akhir}}</td>
                        <td>{{$data->color}}</td>
                        <td>{{$value->rf_id}}</td>
                        @if($value->manual == null)
                        <td>
                          <form action="{{ route('proses_bundling.manual')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex">
                              <input type="hidden" id="id" name="id" value="{{$value->id}}">
                              <input type="text" class="form-control border-input" id="manual" name="manual" style="width:200px">
                              <button type="submit" class="btn-blue ml-1" style="width:47px"><i class="fs-20 fas fa-download"></i></button>
                            </div>
                          </form>
                        </td>
                        @else
                        <td>
                          {{$value->manual}}
                        </td>
                        @endif
                        <td>{{$value->sisa}}</td>
                        <td>
                          <div class="container-tbl-btn justify-start">
                            <a href="{{route('proses_bundling.delete_rfid', $value->id)}}" class="btn-simple-delete"><i class="fas fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#EditNumbering-{{$value->id}}" class="btn-simple-edit ml-1"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.proses_numbering.partials.form-edit-numbering')
                            
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="justify-end mt-3">
                  <a href="{{route('proses_numbering.index')}}" class="btn-blue"><i class="fas fa-arrow-left mr-2"></i>Back</a>
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