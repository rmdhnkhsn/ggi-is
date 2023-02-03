@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-12 flexx" style="gap:.8rem">
        <a href="{{route('kain.dashboard')}}" class="btn-yellow-md">Report Dashboard<i class="ml-2 fs-20 fas fa-home"></i></a>
        <button class="btn btn-blue btnSMQC" type="button" data-toggle="modal" data-target="#inac" title="Create">
          <span class="mr-2">Add Item</span>  
          <i class="fs-20 fas fa-plus"></i>
        </button>
        @include('qc.smqc.kain.far.partials.form-modal')
        <a href="{{route('far.final', $data->id)}}" class="btn-green-md">Final Report<i class="ml-2 fs-20 fas fa-eye"></i></a>
      </div>
      <div class="col-12">
        <div class="DTtable-search2">
          <i class="fs-24 fas fa-search"></i>
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
                    <tr>
                      <th>Roll_No</th> 
                      <th>Number_Roll</th>
                      <th>LOT</th>
                      <th>AC_W(Start)</th>
                      <th>AC_W(Mid)</th>
                      <th>AC_W(End)</th>
                      <th>On_Roll</th>
                      <th>Actual</th>
                      <th>Detail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data->far as $key => $value)
                    <tr>
                      <td>{{$value->roll_no}}</td>
                      <td>{{$value->number}}</td>
                      <td>{{$value->lot}}</td>
                      <td>{{$value->ac_beg}}</td>
                      <td>{{$value->ac_mid}}</td>
                      <td>{{$value->ac_end}}</td>
                      <td>{{$value->on_roll}}</td>
                      <td>{{$value->actual}}</td>
                      <td><a href="{{route('fdetail.add', $value->id)}}" class="btn btn-primary btn-sm" title="Add Detail"><i class="fas fa-plus"></i> Detail</a>
                        <?php 
                         $cek_isi = collect($value->fdetail)->count('id');
                        ?>
                        @if($data->buyer_id !== null && $cek_isi != 0 && $value->ac_mid != null && $value->ac_end != null)
                        <a href="{{route('fdetail.open', $value->id)}}" class="btn btn-info btn-sm" title="Open Report"><i class="fas fa-eye"></i> Open</a></center>
                        @else
                        <button onclick="myFunction()" class="btn btn-danger btn-sm" title="Danger Modal"><i class="fas fa-eye"></i> Open</button> 
                        @endif
                      </td>
                      <td><button data-toggle="modal" data-target="#EditFAR{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i> Edit</button>
                          @include('qc.smqc.kain.far.partials.modal-edit')
                        <a href="{{route('far.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete Report" onclick="return confirm('Delete Report ?');"><i class="fas fa-trash"></i> Delete</a></center>
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
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        "pageLength": 25,
        order:
          [0,'desc'],
    });
  });
</script>
<script>
function myFunction() {
  alert("Isi Actual Width Mid & Actual Width End terlebih dahulu..");
}
</script>
@endpush