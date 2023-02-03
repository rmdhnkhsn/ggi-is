@extends("qc.smqc.layouts.app2")
@section("title","Report Fabric")
@push("styles")
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-1">
          <div class="row">
            <div class="cards-scroll scrollX" id="scroll-bar">
              <form action="{{ route('fdetail.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                      @include('qc.smqc.kain.far.fdetail.partials.form-modal')
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

@endpush