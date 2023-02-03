@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<style>
.dit {
  border: 1px solid black;
}
table, td, th {
    border: 1px solid black;
    text-align:center;
    }
    table {
        border-collapse: collapse;
        font
    }
    #box1{
        width:180px;
        height:180px;
        padding:10px;
        border: 2px solid grey;
        background:white;
    }
    #td{
        font-color:yellow;
    }
    #tabel{
            width:100%;
            height: auto;
    padding:10px;
    border: 2px solid grey;
            background:white;
        }
    #tab{
    width:100%;
            height: auto;
    border: 1px solid grey;
            background:white;
        }
    #tbl{
    width:100%;
            height: 200px;
    border: 1px solid grey;
            background:white;
        }
    input[type=text] {
    width: 100%;
    text-align:center;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
}
</style>
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-12 flexx" style="gap:.8rem">
        @if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == 'QC_GD')
        <a href="{{route('kain.dashboard')}}" class="btn-grey-md">Report Dashboard<i class="ml-2 fs-20 fas fa-home"></i></a>
        <a href="{{route('shade.addnew', $data->id)}}" class="btn btn-blue btnSMQC">Add New File <i class="ml-2 fs-20 fas fa-plus"></i></a>
        <a href="{{route('shade.edit', $data->shadel->id)}}" title="Edit Report" class="btn-yellow-md">Edit Report<i class="ml-2 fs-20 fas fa-edit"></i></a>
        <a href="{{route('shade.delete', $data->id)}}" class="btn-red-md">Delete Report <i class="ml-2 fs-20 fas fa-trash"></i></a>
        @elseif($cek_user->role == 'MD_KAIN')
        <a href="{{ route('md_frindex.index', $data->buyer_id) }}" class="btn btn-secondary btn-sm col-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
        @elseif($cek_user->role == 'PRC_KAIN')
        <a href="{{ route('prc_index.report', $data->buyer_id) }}" class="btn btn-secondary btn-sm col-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
        @endif
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
              <center><label for="detail" style="font-size:18px;font-weight:bold;">SHADE LOT REPORT</label></center>
              <div class="col-lg-6" style="padding-top:15px;">
                <div class="row">
                  <div class="col-lg-6">BUYER</div>
                  <div class="col-lg-6"><input type="text" class="span10" style="width:auto;" value="{{ $data->shadel->buyer}}" disabled></div>
                </div>
                <div class="row" style="padding-top:10px;">
                  <div class="col-lg-6">NO PO</div>
                  <div class="col-lg-6"><input type="text" class="span10" style="width:auto;" value="{{ $data->shadel->no_po}}" disabled></div>
                </div>
                <div class="row" style="padding-top:10px;">
                  <div class="col-lg-6">COLOR</div>
                  <div class="col-lg-6"><input type="text" class="span10" style="width:auto;" value="{{ $data->shadel->color}}" disabled></div>
                </div>
                <div class="row" style="padding-top:10px;">
                  <div class="col-lg-6">ARRIVAL DATE</div>
                  <div class="col-lg-6"><input type="text" class="span10" style="width:auto;" value="{{ $data->shadel->ad}}" disabled></div>
                </div>
              </div><br>
              <div class="col-lg-12 dit">
                <center><img class="col-12" style="height:auto;padding:20px;"  src="{{ asset('storage/smqc/fabric/shade/'.$data->shadel->file) }}"> </center>
              </div>
              @foreach($data->newfile as $key => $value)
              <div class="col-lg-12 dit">
                <center><img class="col-12" style="height:auto;padding:20px;"  src="{{ asset('storage/smqc/fabric/shade/'.$value->file) }}"> </center>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

@endpush