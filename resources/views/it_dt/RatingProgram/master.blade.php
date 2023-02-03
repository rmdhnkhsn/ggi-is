@extends("layouts.app")
@section("title","Master")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.RatingProgram.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid RatingProgram pb-4">
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12">
              <div class="justify-sb mb-3">
                <div class="title-24">Survey Questions List</div>
                <button class="btn-blue-md" data-toggle="modal" data-target="#addQuest">Add Question <i class="ml-2 fs-18 fas fa-plus"></i></button>
                @include('it_dt.RatingProgram.partials.addQuestion')
              </div>
              <table id="DTtable" class="table tbl-content">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Program Module</th>
                    <th>Route Nama</th>
                    <th>Total Question</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=> $value)
                  <tr data-toggle="modal" data-target="#myModal{{$value->id}}" class="tdModal">
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <div class="text-grey">{{$value->sistem}}</div>
                    </td> 
                    <td>
                      <div class="text-grey">{{$value->url}}</div>
                    </td> 
                    <td >
                      <div class="text-grey">{{$value->question->count()}}</div>
                    </td> 
                    <td>
                      @if($value->isaktif == '1')
                      <div class="badge-green w-50">Active</div>
                      @else
                      <div class="badge-pink w-50">Nonactive</div>
                      @endif
                    </td> 
                    @include('it_dt.RatingProgram.partials.detail')
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>Program Module</th>
                    <th>Route Nama</th>
                    <th>Total Question</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  document.getElementById("addRow").addEventListener("click", () => {
    document.getElementById("noQuest").classList.add("hide");
  });
  
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
</script>

<script>
  $('.update').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Data has been successfully updated into the list of questions',
      buttons: false,
      timer: 1500
    })
  });
</script>

<script>
  $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'By clicking yes, you will proceed to delete the question',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>

<script>
  $(function () {
    $("#DTtable").DataTable({
      "pageLength": 10,
      dom: 'tp',
    });
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10 px-2" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
              .search( this.value )
              .draw();
        });
    });
  });
</script>

<script>
  $("#addRow").click(function () {
    var html = '';
        html +='<div class="containerQuest hapusRow" id="inputFormRowWO">';
        html +='<div class="w-100">';
        html +='<div class="title-sm">Question</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<input type="text" class="form-control border-input-10 h-38" id="question" name="question[]" placeholder="Enter question">';
        html +='</div></div>';
        html +='<div class="w-100">';
        html +='<div class="title-sm">Type</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]">';
        html +='<option selected disabled>Enter type</option>';
        html +='<option name="Agreement">Agreement</option>  ';
        html +='<option name="Improvement">Improvement</option>  ';
        html +='<option name="Yes/ No">Yes/ No</option> ';
        html +='<option name="Essay">Essay</option>';
        html +='</select>';
        html +='</div></div>';
        html +='<button id="removeRowWO" type="button" class="btn-delete-row"><i class="fs-20 far fa-times-circle"></i></button>';
        html +='</div>';

    $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowWO', function () {
    $(this).closest('#inputFormRowWO').remove();
  });
</script>

@endpush        