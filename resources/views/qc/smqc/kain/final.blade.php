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
      <div class="col-6">
        <div class="cards bg-card p-4">
          <label for="">Search Report</label>
          <div class="cards-scroll p-2 scrollX" id="scroll-bar">
            <div class="row">
              <div class="col-lg-6">
                <form action="{{route('kain.search_id')}}" method="post" enctype="multipart/form-data">
                  @csrf    
                  <span class="general-identity-title">ID</span>
                  <div class="field2 mt-2">
                    <input type="text" id="id" name="id" value="" placeholder="Insert ID Report" required>
                  </div>
                  <div class="field2 mt-2" style="padding-top:8px">
                    <button type="submit" class="btn btn-blue">Get<i class="ml-3 fas fa-download"></i></button>
                  </div>
                </form>
              </div>
              <div class="col-lg-6">
                <form action="{{route('kain.search_buyer')}}" method="post" enctype="multipart/form-data">
                  @csrf    
                  <span class="general-identity-title">Buyer</span>
                  <div class="input-group mb-3 mt-2">
                    <select class="form-control select2bs4_branch" name="buyer" id="buyer" required>
                      <option selected></option>
                      @foreach($buyer as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}} </option>
                      @endforeach
                    </select>
                  </div>
                  <div style="padiing-bottom:115px;">
                    <button type="submit" class="btn btn-blue">Get<i class="ml-3 fas fa-download"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="cards bg-card p-4">
          <label for="">Monthly Report</label>
          <div class="cards-scroll p-2 scrollX" id="scroll-bar">
            <form action="{{route('kain.report_bulanan')}}" method="post" enctype="multipart/form-data">
              @csrf  
              <div class="row">
                <div class="col-lg-6"> 
                  <span class="general-identity-title">From</span>
                  <div class="field2 mt-2">
                    <input type="date" id="min" name="min" placeholder="Insert Date" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <span class="general-identity-title">To</span>
                  <div class="field2 mt-2">
                    <input type="date" id="max" name="max" placeholder="Insert Date" required>
                  </div>
                </div>
                <div class="col-lg-12 justify-end" style="padding-top:15px">
                  <button type="submit" class="btn btn-blue">Get<i class="ml-3 fas fa-download"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
  $('.select2bs4_branch').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush