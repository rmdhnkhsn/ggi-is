@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Report</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('qr.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.sample.report.partials.form-edit', ['submit' => 'Update'])
                                </form>
                                <br>
                                <div class="row WSDetail">
                                    @if($data->file)
                                    <div class="col-md-3">
                                        <div class="cards relative h-200">
                                            <a href="{{ url('/qc/sample/images/'.$data->file) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{ url('/qc/sample/images/'.$data->file) }}" class="imageHover" />
                                                <div class="objectHover">
                                                    <div class="justify-center">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <div class="justify-center">
                                                        <div class="text">Preview Image</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <form action="{{ route('sample.file.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" style="width:4em;text-align:center;" name="id" id="id" value="{{$data->id}}"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="no_file" id="no_file" value=""> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="file" id="file" value=""> 
                                                <button type="submit" class="removeImage" onclick="return confirm('Hapus Foto ?');"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @if($data->file2)
                                    <div class="col-md-3">
                                        <div class="cards relative h-200">
                                            <a href="{{ url('/qc/sample/images/'.$data->file2) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{ url('/qc/sample/images/'.$data->file2) }}" class="imageHover" />
                                                <div class="objectHover">
                                                    <div class="justify-center">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <div class="justify-center">
                                                        <div class="text">Preview Image</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <form action="{{ route('sample.file.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" style="width:4em;text-align:center;" name="id" id="id" value="{{$data->id}}"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="no_file" id="no_file" value="2"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="file2" id="file2" value=""> 
                                                <button type="submit" class="removeImage" onclick="return confirm('Hapus Foto ?');"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @if($data->file3)
                                    <div class="col-md-3">
                                        <div class="cards relative h-200">
                                            <a href="{{ url('/qc/sample/images/'.$data->file3) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{ url('/qc/sample/images/'.$data->file3) }}" class="imageHover" />
                                                <div class="objectHover">
                                                    <div class="justify-center">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <div class="justify-center">
                                                        <div class="text">Preview Image</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <form action="{{ route('sample.file.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" style="width:4em;text-align:center;" name="id" id="id" value="{{$data->id}}"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="no_file" id="no_file" value="3"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="file3" id="file3" value=""> 
                                                <button type="submit" class="removeImage" onclick="return confirm('Hapus Foto ?');"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @if($data->file4)
                                    <div class="col-md-3">
                                        <div class="cards relative h-200">
                                            <a href="{{ url('/qc/sample/images/'.$data->file4) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{ url('/qc/sample/images/'.$data->file4) }}" class="imageHover" />
                                                <div class="objectHover">
                                                    <div class="justify-center">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <div class="justify-center">
                                                        <div class="text">Preview Image</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <form action="{{ route('sample.file.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" style="width:4em;text-align:center;" name="id" id="id" value="{{$data->id}}"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="no_file" id="no_file" value="4"> 
                                                <input type="hidden" style="width:4em;text-align:center;" name="file4" id="file4" value=""> 
                                                <button type="submit" class="removeImage" onclick="return confirm('Hapus Foto ?');"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')
<script>
$('#reservationdate2').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker2" ).datepicker({
  showButtonPanel: true
});
</script>
<script type="text/javascript">
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>