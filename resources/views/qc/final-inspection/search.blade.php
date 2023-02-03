@extends("layouts.app")
@section("title","Final Inspection")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-inspection.css')}}">
@endpush

@push("sidebar")
  @include('qc.final-inspection.layouts.navbar2')
@endpush

@section("content")
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-11 ml-auto mr-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="title-search">Search WO</h4>
                <form action="{{ route('finali.index') }}" method="get">
                  <div class="input-group">
                    <input type="text" class="form-search mr-1" placeholder="Type WO Numbers" name="search" aria-label="Type Keywords" aria-describedby="basic-addon2" required autofocus/>
                      <button type="submit" class="icon-search"><i class="fas fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script>
$(document).ready(function() {
  
});
</script>
@endpush
