@extends("layouts.app")
@section("title","PPIC")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <div class="col-12 text-left">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-component"><i class="fas fa-plus"></i></button>
              @include('production.cutting.product_costing.ppic.atribut.modal-component')
              <br>
              <table class="table table-not-striped table-bordered" id="tabel_breakdown">
                  <thead>
                      <tr style="text-align:center;">
                          <th class="bg-striped">Component</th>
                          <th class="bg-striped">Action</th>
                      </tr>
                  </thead>
                  <tbody id="tabel_breakdown_body">
                      @foreach($wo->ppic_component as $key => $value)
                      @foreach($component as $key2 => $value2)
                      @if($value->item_number == $value2['item_number'])
                      <tr>
                          <td>{{$value2['seq']}} - {{$value2['desc']}} ({{$value2['status']}})</td>
                          <td><center><a href="{{route('cutting.ppic.delete', $value->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></center></td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                  </tbody>
              </table>
            </div>
            <form action="{{ route('cutting.ppic.update')}}" method="post" enctype="multipart/form-data">
              @csrf
              @include('production.cutting.product_costing.ppic.atribut.form-edit')
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script>
    $('#start_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $(document).ready(
        function () {
            $('#multipleSelectExample').select2();
        }
    );
</script>
@endpush