@include('it_dt.ticketing.layouts.header2')
@include('layouts.navbar2')
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap/css/bootstrap.min.css') }}">
  <!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style2.css') }}">
  <!-- Content Wrapper. Contains page content -->

  
  <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-sm-6 col-12"> 
            </div>
            @foreach ($it_support as $key => $value)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{$value ['nama']}}</span>
                    <span class="info-box-number">{{$value ['branchdetail']}}-{{$value ['no']}}</span>
                </div>
                </div>
            </div>
            @endforeach
          </div>
        </div>
    </section>



    
  <div class="content-wrapper kanban">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
        </div>
      </div>
    </section>
  <section class="content pb-3">
      <div class="container-fluid h-100">

        <div class="card card-row card-secondary">
              <div class="card-header">
                <h3 class="card-title"> Waiting {{$waiting}}</h3>
              </div>
            <div class="card-body">
              @foreach ($dataTiketw as $key => $value)
              <div class="card card-info card-outline">
                <div class="card-header">
                    <h5 class="card-title">No {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                    <div class="card-tools">
                        <a href="{{route('tiketit.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                        <i class="fas fa-edit"></i></a>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                    <br>
                    <label  class="custom-control-label">Date : {{ $value['tgl_pengajuan'] }}</label>
                    <br>
                    <label for="customCheckbox4" class="custom-control-label">Priority : {{ $value['priority'] }}</label>
                    <br>
                    <label for="customCheckbox3" class="custom-control-label">Title : {{ $value['judul'] }}</label>
                </div>
              </div>
                @endforeach
          </div>
        </div>

        <div class="card card-row card-primary">
            <div class="card-header">
              <h3 class="card-title">On Process {{$proggres}}</h3>
            </div>
          <div class="card-body">
          @foreach ($dataTiketpro as $key => $value)
            <div class="card card-info card-outline">
              <div class="card-header">
                 <h5 class="card-title">No {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                <div class="card-tools">
                    <a href="{{route('tiketit.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                        <i class="fas fa-edit"></i></a>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                <br>
                <label  class="custom-control-label">Date : {{ $value['tgl_pengajuan'] }}</label>
                <br>
                <label for="customCheckbox4" class="custom-control-label">Priority : {{ $value['priority'] }}</label>
                <br>
                <label for="customCheckbox3" class="custom-control-label">Title : {{ $value['judul'] }}</label>
                <br>
                <label for="customCheckbox5" class="custom-control-label">IT Support : {{ $value['petugas'] }}</label>
              </div>
            </div>
            @endforeach
          </div>
        </div>
       
        <div class="card card-row card-danger">
            <div class="card-header">
              <h3 class="card-title">Pending {{$pending}}</h3>
            </div>
          <div class="card-body">
          @foreach ($dataTiketp as $key => $value)
            <div class="card card-info card-outline">
              <div class="card-header">
                  <h5 class="card-title">No {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                <div class="card-tools">
                    <a href="{{route('tiketit.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                        <i class="fas fa-edit"></i></a>
                    </a>
                </div>
              </div>
              <div class="card-body">
                <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                <br>
                <label  class="custom-control-label">Date : {{ $value['tgl_pengajuan'] }}</label>
                <br>
                <label for="customCheckbox4" class="custom-control-label">Priority : {{ $value['priority'] }}</label>
                <br>
                <label for="customCheckbox3" class="custom-control-label">Title : {{ $value['judul'] }}</label>
                <br>
                <label for="customCheckbox5" class="custom-control-label">IT Support : {{ $value['petugas'] }}</label>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
</div>

@include('layouts.footer')