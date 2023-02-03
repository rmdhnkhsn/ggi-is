@extends("more_program.userfeedback.partials.app")
@section("title","Review Sistem")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesGCCTrafic.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">

<style>
    .tbl-content-left tbody tr th {
        font-size:12px;
    }
    .tbl-content-left tbody tr td {
        font-size:12px;
    }


    table
    {
        counter-reset: rowNumber;
    }

    table tr > td:first-child
    {
        counter-increment: rowNumber;
    }
                    
    table tr td:first-child::before
    {
        content: counter(rowNumber);
        min-width: 1em;
        margin-right: 0.5em;
    }

</style>
@endpush

@section("content")
<section class="content">
  <!-- Main content -->
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row mt-2">
      <div class="col-12">
        <span class="reject-cutting-tittle"></span>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Review Sistem {{$data->first()->userfeedback->sistem}}
          </div>
          <div class="card-body">
            <form action="{{route('userfeedback-reviewstore')}}" id="frmUserfeedback" method="post" enctype="multipart/form-data">
              @csrf
              <!-- <input type="hidden" class="form-control" id="id" name="id" value="" placeholder="Insert id" required> -->
              <!-- <div class="form-group">
                <label for="roll">Branch</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                      <option value="">Select Branch</option>
                      <option value="1">adsf</option>
                  </select>
              </div> -->

              <!-- <div class="form-group">
                <label for="roll">System</label>
                <input type="text" class="form-control" id="sistem" name="sistem" value="" placeholder="Insert System Name" required>
              </div>
              <div class="form-group">
                <label for="roll">Url</label>
                <input type="text" class="form-control" id="url" name="url" value="" placeholder="Insert Url of the System" required>
              </div>
              <div class="form-group">
                <label for="roll">Active</label>
                <select class="form-control select2bs4" style="width: 100%;" name="isaktif" id="isaktif">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
              </div> -->

              <!-- <div class="form-group">
                <label>Order Date</label>
                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="date" name="date" required />
                </div>
              </div> -->
                <input type="hidden" class="form-control" name="users_feedback_id" value="{{$data->first()->users_feedback_id}}" required>

                <div class="bg-white">
                    <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.7rem">
                        <table id="DTtable1" class="table tbl-content-left no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $k=>$v)
                                <tr>
                                  <input type="hidden" class="form-control" name="users_feedback_question_id[]" value="{{$v->id}}" required>
                                  <td>{{$k+1}}</td>
                                  <td><input type="text" class="form-control" value="{{$v->question}}" placeholder=""></td>
                                  <td>
                                    <input type="text" class="form-control" name="answer[]" value="" placeholder="" required>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <label>Kritik & Saran</label>
                      <input type="text" class="form-control" name='saran' required >
                      <label>Rating untuk keseluruhan program</label>
                      <input type="number" class="form-control" name='rating' required>
                    </div>
                      
                </div>
              <input type="submit" class="btn btn-primary btn-block" onclick="return confirm('Save Data ?')">
            </form>
            <form action="{{route('userfeedback-reviewstore')}}" id="frmUserfeedback" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" name="users_feedback_id" value="{{$data->first()->users_feedback_id}}" required>
              <input type="hidden" name='skip' value='1'>
              <button type="submit" class="btn btn-primary btn-block mt-3">jawab lainkali</button>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>

@endsection
@push("scripts")
<script>
    var table = $('#tabelReject').DataTable();

    // $("#frmUserfeedback").submit(function(e){
    //     e.preventDefault();

    //     if (validate_form()==true) {
    //         $("#frmUserfeedback").submit();
    //     }
    // });

    // function add_row() {
    //     var totalRowCount = table.rows.length;
    //     $('#DTtable1').append(' <tr> <td><button type="button" onclick="del_row(this)"><i class="fas fa-plus"></i> Del </button></td> <td><input type="text" class="form-control" id="question" name="question[]" value="" placeholder="Insert Question" required></td> <td> <select class="form-control select2bs4" style="width: 100%;" name="question_type[]" id="question_type"> <option value="Agreement">Agreement</option> <option value="Improvement">Improvement</option> <option value="Yesno">Yes/No</option> <option value="Essay">Essay</option> </select> </td> </tr>');
    // }
    // function del_row(abc) {
    //     $(abc).closest("tr").remove();
    // }
    // function validate_form() {
    //     let url = $('#url').val();
    //     let result = urlbanned.includes(url);

    //     alert('validate');
    //     alert(url);
    //     alert(urlbanned);
    //     alert(result);


    //     if (urlbanned!==''&&result==true) {
    //         alert('Url already exists');
    //         return false;
    //     }

    //     return true;
    // }
</script>
@endpush        