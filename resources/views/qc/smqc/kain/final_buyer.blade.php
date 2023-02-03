@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
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
            <input type="hidden" name="buyer" id="buyer" value="{{$id}}">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <table id="example1" class="table hrd-tbl-content no-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Buyer</th>
                    <th>Supplier</th>
                    <th>Color</th>
                    <th>Style</th>
                    <th>FAR</th>
                    <th>FIR</th>
                    <th>SLR</th>
                    <th>Inspector</th>
                    <th>Inspection_Date</th>
                    <th>PDF</th>
                  </tr>
                </thead>
                <tbody>
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
    const input = document.getElementById('buyer').value;
    // console.log(input);
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        ajax:{
          data: {
          ID: input,
          },
          url: "{{ route('kain.data_buyer') }}"
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'buyer_id', name: 'buyer_id'},
            {data: 'supplier', name: 'supplier'},
            {data: 'color', name: 'color'},
            {data: 'style', name: 'style'},
            {data: 'far_id', name: 'far_id'},
            {data: 'fir_id', name: 'fir_id'},
            {data: 'shade_id', name: 'shade_id'},
            {data: 'inspector', name: 'inspector'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
        order:
          [0,'desc'],
    });
  });
</script>
@endpush