@extends("layouts.app")
@section("title","Sample User")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample3.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('sample-request') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample Request</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-scheduling') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-calendar-alt"></i>
            </div>
            <div class="col-12">
              <div class="desc">Scheduling</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-dashboard') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-user') }}" class="column-2">
        <div class="cards nav-card bg-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-users"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Sample User</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-5">
      <div class="col-12">
          <div class="cards p-4">
            <div class="justify-sb">
              <span class="title-24">Data User Sample</span>
              <form action="{{ route('sample.storeUser')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <a href="" class="btn-blue ml-auto" data-toggle="modal" data-target="#add_user">Add User<i class="ml-2 fs-18 fas fa-plus"></i></a>
              @include('sample_room.status_sample.partials.sample_user.add_user',['submit' => 'Submit'])
            </form> 
             
            </div>
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="table table-content no-wrap py-2" width="100%">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($dataUser as $key => $value)
                    <tr>
                        <td>{{ $value['nik'] }}</td>
                        <td>{{ $value['nama'] }}</td>
                        <td>{{ $value['jabatan'] }}</td>
                        <td>
                          <div class="container-tbl-btn flex">
                            <a href="javascript:void(0)" class="btn-simple-edit" data-toggle="modal" data-target="#edit_user{{ $value->id }}"><i class="fs-18 fas fa-pencil-alt"></i></a>                    
                            @include('sample_room.status_sample.partials.sample_user.edit_user')
                            <a href="{{route('sample.deleteUser',$value['id'])}}" class="btn-simple-delete ml-1"><i class="fs-18 fas fa-trash"></i></a>
                          </div>
                        </td>
                    </tr>
                  @endforeach

                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('#Date').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>

@endpush