@include('layouts.header')
@include('layouts.navbar2')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="btn-group" style="padding-bottom:10px">
                  <a href="{{ url()->previous() }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ticket</h3>
                            </div>
                            <div class="card-body">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm">

                                    <tbody>
                                        <tr>
                                        <th > No Ticket</th>
                                        <td>{{$data->branchdetail}}-{{$data->no_tiket }}</td>
                                        </tr>
                                        <tr>
                                        <th>NIK</th>
                                        <td>{{$data->nik }}</td>
                                        </tr>
                                        <tr>
                                        <th>Name</th>
                                        <td>{{$data->nama }}</td>
                                        </tr>
                                        <tr>
                                        <th>Department</th>
                                        <td>{{$data->bagian }}</td>
                                        </tr>
                                        <tr>
                                        <th>IP Address</th>
                                        <td>{{$user->ip }}</td>
                                        </tr>
                                        <tr>
                                        <th>Ext</th>
                                        <td>{{$user->ext }}</td>
                                        </tr>
                                        <tr>
                                        <th>Error</th>
                                        <td>{{$data->judul }}</td>
                                        </tr>
                                        <tr>
                                        <th>Description error</th>
                                        <td>{{$data->deskripsi }}</td>
                                        </tr>
    
                                        <tr>
                                        <th>Create Date</th>
                                        <td>{{$data->tgl_pengajuan}} {{$data->jam_pengajuan}}</td>
                                        </tr>
                                        <tr>
                                        <th>Status</th>
                                        <td>{{$data->status}}</td>
                                        </tr>

                                        @if($data->foto != null)
                                        <tr>
                                        <th> Picture</th>
                                        <td>
                                            <div class="div3 col-sm-2">
                                                    <a href="{{ url('/tiket/gbr/'.$data['foto']) }}" data-toggle="lightbox"  data-gallery="gallery">
                                                        <img src="{{ url('/tiket/gbr/'.$data['foto']) }}" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                        @if(($data->status == "On Process") OR ($data->status == "Pending")OR ($data->status == "Done"))
                                        <tr>
                                        <th>IT Support</th>
                                        <td>{{$nama }}</td>
                                        </tr>
                                        <tr>
                                        <th>Start Process</th>
                                        <td>{{$data->tgl_pengerjaan}} {{$data->jam_pengerjaan}}</td>
                                        </tr>
                                        @endif
                                        @if(($data->status == "Pending")OR ($data->status == "Done"))
                                        <tr>
                                        <th>Problem Category</th>
                                        <td>{{$data->rusak}}</td>
                                        </tr>
                                        <tr>
                                        <th>Sub Category</th>
                                        <td>{{$data->sub_rusak}}</td>
                                        </tr>
                                        <tr>
                                        <th>Pending Date</th>
                                        <td>{{$data->tgl_pending}} {{$data->jam_pending}}</td>
                                        </tr>
                                        <tr>
                                        <th>Pending Description</th>
                                        <td>{{$data->pesan_pending}}</td>
                                        </tr>
                                        @endif
                                        @if($data->status == "Done")
                                        <tr>
                                        <th>Done Description</th>
                                        <td>{{$data->pesan_selesai}}</td>
                                        </tr>
                                        <tr>
                                        <th>Done Date</th>
                                        <td>{{$data->tgl_selesai}} {{$data->jam_selesai}}</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('it_dt.Ticketing.layouts.footer')

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>