@extends("layouts.app")
@section("title","Report Accessories")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-12">
        <div class="DTtable-search2">
          <i class="fs-20 fas fa-search"></i>
        </div>
      </div>
    </div>  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <!-- <table id="smqcTableFreeze" class="table hrd-tbl-content no-wrap"> -->
              <table id="example1" class="table hrd-tbl-content no-wrap">
                <thead>
                  <tr class="font-tr" style="justify:center;">
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>No PO</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>PDF</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->supplier}}</td>
                      <td>{{$value->po}}</td>
                      <td>{{$value->item}}</td>
                      <td>{{$value->date}}</td>
                      <td>
                        @if($value->status_id == 1)
                          PASS
                        @else
                          Fail
                        @endif
                      </td>
                      <td>
                        <a href="{{route('aksesoris.pdf', $value->id)}}" class="btn btn-danger btn-sm" title="Download PDF"><i class="fas fa-file-pdf"></i></a>
                      </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 10,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
    });
  });
</script>
@endpush