@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-7 mx-auto">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <form action="{{route('md_final.search')}}" method="post" enctype="multipart/form-data">
                @csrf    
                <div class="row">
                  <div class="col-6 mt-3">
                    <span class="title-sm">Buyer</span>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend">
                          <span class="inputGroupBlue"> <i class="fs-20 fas fa-tshirt"></i></span>
                      </div>
                      <select class="form-control border-input-10 select2bs4_branch pointer" name="buyer" id="buyer" required>
                        <option selected></option>
                        @foreach($buyer as $key => $value)
                          <option value="{{$value->id}}">{{$value->name}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-6 mt-3">
                    <span class="title-sm">Approver</span>
                    <div class="field2 mt-1">
                      <input type="text" id="mrc_name" name="mrc_name" value="{{auth()->user()->nama}}" placeholder="Insert Approver Name">
                    </div>
                  </div>
                  <div class="col-12 mt-3 justify-end">
                    <button type="submit" class="btn btn-blue">Get<i class="ml-3 fas fa-download"></i></button>
                  </div>
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
  $('.select2bs4_branch').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush