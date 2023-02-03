@extends("layouts.app")
@section("title","Admin Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-cutting.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-12">
            <span class="title-20">Daftar Kain</span>
        </div>
      </div>
      <form action="{{ route('cutting.label_store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12">
              <div class="cards bg-card p-4 scrollX" id="scroll-bar">
                  <button id="cutting_search"><i class="fas fa-search"></i></button>
                  <table id="DTtable" class="table tbl-ctg table-striped">
                      <thead>
                          <tr>
                              <th>WO</th>
                              <th>Style</th>
                              <th>Style Number</th>
                              <th>Buyer</th>
                              <th>Color</th>
                              <th>Roll No</th>
                              <th>Country</th>
                              <th>Fabric</th>
                              <th>QTY Utuh</th>
                              <th>Pemakaian Kain</th>
                              <th>Satuan</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data_gelaran as $key => $value)
                          <tr>
                              <td><input type="hidden" name="form_id[]" id="form_id" value="{{$data->id}}"><input type="hidden" class="form-control border-input" name="no_wo[]" id="no_wo[]" value="{{$value['no_wo']}}">{{$value['no_wo']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="style[]" id="style[]" value="{{$value['style']}}">{{$value['style']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="number_style[]" id="number_style[]" value="{{$value['number_style']}}">{{$value['number_style']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="buyer[]" id="buyer[]" value="{{$value['buyer']}}">{{$value['buyer']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="color[]" id="color[]" value="{{$value['color']}}">{{$value['color']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="roll_no[]" id="roll_no[]" value="{{$value['no_roll']}}">{{$value['no_roll']}}</td>
                              <td><input type="hidden" class="form-control border-input" name="country[]" id="country[]" value="{{$value['country']}}">
                                  <input type="hidden" class="form-control border-input" name="factory[]" id="factory[]" value="{{$value['factory']}}">
                                  {{$value['country']}}
                              </td>
                              <td><input type="hidden" class="form-control border-input" name="fabric[]" id="fabric[]" value="{{$value['part']}}">{{$value['part']}}</td>
                              <td><input type="text" class="form-control border-input" name="qty_utuh[]" id="qty_utuh[]"></td>
                              <td><input type="text" class="form-control border-input" name="pemakaian_kain[]" id="pemakaian_kain[]"></td>
                              <td><input type="text" class="form-control border-input" name="satuan[]" id="satuan[]"></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="col-12 text-right">
              <button type="submit" class="btn ctg-buatForm">Save<i class="wp-icon-btn fas fa-download"></i></button>
          </div>
        </div>
      </form>
    </div>
</section>
@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"><"clear">'
    });
  });
</script>
@endpush