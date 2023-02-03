@include('Indah.layouts.header')
@include('Indah.layouts.navbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
    
        </div>
        <div class="row mb-2">
          <div class="col-sm-1">
            <a href="{{ route('piket.jadwal')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-plus"></i> Add New</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content pb-3">
        <div class="container col-lg-12 h-100">

        <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">
              ALL               
              </h3>
            </div>
            <div class="card-body">
            @foreach ($All as $key => $value)
            @foreach($user as $u)
            @if($value['all_day'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
              @endforeach
            </div>
          </div>


          <div class="card card-row card-secondary">
            <div class="card-header" >
              <h3 class="card-title">
              Monday               
              </h3>
            </div>
            <div class="card-body">
            @foreach ($Monday as $key => $value)
            @foreach($user as $u)
            @if($value['Monday'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
            @endforeach
            </div>
          </div>

          <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">
              Tuesday               
              </h3>
            </div>
            <div class="card-body">
            @foreach ($Tuesday as $key => $value)
            @foreach($user as $u)
            @if($value['Tuesday'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
            @endforeach
            </div>
          </div>

          <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">
              Wednesday               
              </h3>
            </div>
            <div class="card-body">
            @foreach ($Wednesday as $key => $value)
            @foreach($user as $u)
            @if($value['Wednesday'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
            @endforeach
            </div>
          </div>

          <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">
              Thursday               
              </h3>
            </div>
            <div class="card-body">
            @foreach ($Thursday as $key => $value)
            @foreach($user as $u)
            @if($value['Thursday'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
            @endforeach
            </div>
          </div>

          
          <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">
              Friday              
              </h3>
            </div>
            <div class="card-body">
            @foreach ($Friday as $key => $value)
            @foreach($user as $u)
            @if($value['Friday'] == $u->nik)
              <div class="card card-info card-outline">
                <div class="card-header">
                <h5 class="card-title" style="font-size:13px;padding-top:5px">{{ $u->nama }}</h5>
                  <div class="card-tools" style="padding:2px;">
                      <a href="{{route('piket.delete', $value['id'])}}" title="Tiket">
                          <i class="fas fa-trash"></i></a>
                      </a>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
              @endforeach
            </div>
          </div>


        </div>
    </section>
  </div>
  
@include('Indah.layouts.footer')