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
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
                <form action="{{route('fabric.report_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="{{$data->id}}">
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Arrival Date</span>
                            <div class="field2 mt-2">
                                <input type="date" id="date" name="date" value="{{$data->date}}" placeholder="Insert Date">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="title-sm">Supplier</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Supplier</span>
                                </div>
                                <select class="form-control select2bs4_supplier" name="supplier" id="supplier" required>
                                    <option selected></option>
                                    @foreach($supplier as $q)
                                        <option {{ $data->supplier == $q->name ? 'selected' : ''}} value="{{  $q->name }}">{{ $q->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="title-sm">Buyer</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Buyer</span>
                                </div>
                                <select class="form-control select2bs4_buyer" name="buyer_id" id="buyer_id" required>
                                    <option selected></option>
                                    @foreach($buyer as $q)
                                        <option {{ $data->buyer_id == $q->id ? 'selected' : ''}} value="{{  $q->id }}">{{ $q->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Color</span>
                            <div class="field2 mt-2">
                                <input type="text" id="color" name="color" value="{{$data->color}}" placeholder="Insert Color">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Style</span>
                            <div class="field2 mt-2">
                                <input type="text" id="style" name="style" value="{{$data->style}}" placeholder="Insert Style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Inspector</span>
                            <div class="field2 mt-2">
                                <input type="text" id="inspector" name="inspector" value="{{$data->inspector}}" placeholder="Insert Inspector">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="branch" id="branch" value="{{$data->branch}}">
                    <input type="hidden" name="branchdetail" id="branchdetail" value="{{$data->branchdetail}}">
                    <div class="col-lg-12 justify-end" style="padding-top:15px;">
                        <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
  $('.select2bs4_buyer').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4_supplier').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush