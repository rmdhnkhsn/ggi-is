@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      @include('marketing.worksheet.partials.stepbar')
      <div class="row">	
        <div class="col-12">
          <div class="cards p-4">
            <div class="flexx gap-6 mb-4">
              <div class="judul_biru mt-1">Measurement Spec</div>
              <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#modal-form-measurement" onclick="add_form();">
                <span class="mr-2">Add Spec</span>  
                <i class="fas fa-plus"></i>
              </button>
            </div>
            @include('marketing.worksheet.partials.form-modal-measurement')
            <table id="example1" class="table tbl-content" >
              <thead>
                <tr class="bg-thead">
                  <th>Action</th>
                  <th>POM</th>
                  <th>Description</th>
                  <th>Tol(+)</th>
                  <th>Tol(-)</th>
                    @foreach ($master_data->rekap_size->toArray() as $column => $field)
                        @if (str_contains($column,'size')&&($field!==null))
                          <th>{{$field}}</th>
                        @endif
                    @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($master_data->measurement->where('tipe','SPEC')->toArray() as $key => $value)
                  @php($i=1)
                  <tr class="font-td"> 
                    @php($edit_url=route('worksheet.measurement.detail',['id'=>$value['id']]))
                    <td><a href="" data-toggle="modal" data-target="#modal-form-measurement" data-id="{{ $value['id'] }}" onclick="edit_form('{{$edit_url}}');">Edit</a></td>
                    <td>{{$value['pom']}}</td>
                    <td>{{$value['description']}}</td>
                    <td>{{$value['tol_positif']}}</td>
                    <td>{{$value['tol_negatif']}}</td>
                    @foreach ($master_data->rekap_size->toArray() as $column => $field)
                        @if (str_contains($column,'size')&&($field!==null))
                          <td>{{$value['size'.$i]}}</td>
                          @php($i+=1)
                        @endif
                    @endforeach
                  </tr>
                @endforeach
              </tbody>
            </table>
            <form action="{{ route('worksheet.measurement.file', $master_data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
            <div class="row mt-4">
              <div class="col-12">
                <div class="title-14 text-left">Measurement Documents</div>
              </div>
              <div class="col-12">
                <div class="customFile mt-1 mb-2">
                  <input type="file" class="customFileInput" id="file" name="file">
                  <label class="customFileLabelsBlue" for="file">
                    <span class="chooseFile" style="margin-left:171px">{{$master_data->file_measurement}}</span>
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="customFile mt-1 mb-2">
                  <input type="file" class="customFileInput" id="file1" name="file1">
                  <label class="customFileLabelsBlue" for="file1">
                    <span class="chooseFile" style="margin-left:171px">{{$master_data->file1}}</span>
                  </label>
                </div>
              </div>
              <div class="col-12">
                  <div class="customFile mt-1 mb-2">
                      <input type="file" class="customFileInput" id="file2" name="file2">
                      <label class="customFileLabelsBlue" for="file2">
                        <span class="chooseFile" style="margin-left:171px">{{$master_data->file2}}</span>
                      </label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="customFile mt-1 mb-2">
                      <input type="file" class="customFileInput" id="file3" name="file3">
                      <label class="customFileLabelsBlue" for="file3">
                        <span class="chooseFile" style="margin-left:171px">{{$master_data->file3}}</span>
                      </label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="customFile mt-1 mb-2">
                      <input type="file" class="customFileInput" id="file4" name="file4">
                      <label class="customFileLabelsBlue" for="file4">
                        <span class="chooseFile" style="margin-left:171px">{{$master_data->file4}}</span>
                      </label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="customFile mt-1 mb-2">
                      <input type="file" class="customFileInput" id="file5" name="file5">
                      <label class="customFileLabelsBlue" for="file5">
                        <span class="chooseFile" style="margin-left:171px">{{$master_data->file5}}</span>
                      </label>
                  </div>
              </div>
            </div>  
            @if($master_data->file_measurement != null)
            <input type="hidden" value="{{$master_data->file_measurement}}" name="file" id="file">
            <input type="hidden" value="{{$master_data->file1}}" name="file1" id="file1">
            <input type="hidden" value="{{$master_data->file2}}" name="file2" id="file2">
            <input type="hidden" value="{{$master_data->file3}}" name="file3" id="file3">
            <input type="hidden" value="{{$master_data->file4}}" name="file4" id="file4">
            <input type="hidden" value="{{$master_data->file5}}" name="file5" id="file5">
            @endif 
            <div class="row">
              <div class="col-12 justify-end gap-4 mt-4">
                <a href="{{route('worksheet.material_sewing',$master_data->id)}}" class="btn-outline-grey-md w-130">Back</a>
                <button type="submit" class="btn-blue-md">Next & Save</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,"searching": false,
        "paging":   false,"info":     false,
        "order": [[ 0, "desc" ]],
    });
  });
  function add_form() {
    $('#form-measurement').attr('action', '{{ route('worksheet.measurement.store')}}');
    $('#form-title').html("Add Measurement");
    $('#id').val(0);
    $('#pom').val("");
    $('#description').val("");
    $('#tol_positif').val("");
    $('#tol_negatif').val("");
    $('#size1').val("");
    $('#size2').val("");
    $('#size3').val("");
    $('#size4').val("");
    $('#size5').val("");
    $('#size6').val("");
    $('#size7').val("");
    $('#size8').val("");
    $('#size9').val("");
    $('#size10').val("");
    $('#size11').val("");
    $('#size12').val("");
    $('#size13').val("");
    $('#size14').val("");
    $('#size15').val("");

    $('#submit').text("Save");
  }
  function edit_form(url) {
    $.get(url, function (data) {
        $('#form-measurement').attr('action', '{{ route('worksheet.measurement.update')}}');
        $('#form-title').html("Edit Measurement");
        $('#id').val(data.id);
        $('#tipe').val(data.tipe).change();
        $('#pom').val(data.pom);
        $('#description').val(data.description);
        $('#tol_positif').val(data.tol_positif);

        $('#size1').val(data.size1);
        $('#size2').val(data.size2);
        $('#size3').val(data.size3);
        $('#size4').val(data.size4);
        $('#size5').val(data.size5);
        $('#size6').val(data.size6);
        $('#size7').val(data.size7);
        $('#size8').val(data.size8);
        $('#size9').val(data.size9);
        $('#size10').val(data.size10);
        $('#size11').val(data.size11);
        $('#size12').val(data.size12);
        $('#size13').val(data.size13);
        $('#size14').val(data.size14);
        $('#size15').val(data.size15);

        $('#submit').text("Edit Data");
    })
  }
</script>
<script>
  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
  });
</script>
@endpush