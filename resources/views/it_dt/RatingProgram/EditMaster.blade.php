@extends("layouts.app")
@section("title","Rating Program")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.RatingProgram.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row justify-content-center">
      <form action="{{route('userfeedback.update')}}"  id="frmUserfeedback" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-4" style="border-radius : 20px">
          <div class="row">
            <div class="col-12 justify-sb">
                <div class="title-20">Survey Question</div>
            </div>
            <div class="col-md-4 col-12">
                <div class="title-sm">System Name</div>
                <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                        <span class="inputGroupBlue" style="width:46px"><i class="fs-20 fas fa-spell-check"></i></span>
                    </div>
                    <input type="text" class="form-control border-input-10 h-38" style="border-radius : 0 10px 10px 0 !important" id="sistem" name="sistem" value="{{$data->sistem}}">
                    <input type="hidden" class="form-control border-input-10 h-38" id="id" name="id" value="{{$data->id}}" readonly>
                </div>
            </div>
            <div class="col-md-4">
              <div class="title-sm">Route</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                  <span class="inputGroupBlue" style="width:46px"><i class="fs-20 fas fa-spell-check"></i></span>
                </div>
                  <input type="text" class="form-control border-input-10 h-38" id="url" name="url" value="{{$data->url}}" readonly>
              </div>
            </div>
            <div class="col-md-2 mb-1">
              <div class="title-sm">Question Status</div>
                <div class="wrapperRadio mb-3">
                    <input type="radio" name="quest_status" value="1" class="radioBlue" id="editActive" {{ $data ? ($data->isaktif == '1' ? 'checked' : '') : '' }}>
                    <label for="editActive" class="optionBlue check">
                        <span class="descBlue">Active</span>
                    </label>
                </div>
            </div>
            <div class="col-md-2">
              <div class="title-sm" style="opacity : 0"> sd</div>
              <div class="wrapperRadio mb-3">
                <input type="radio" name="quest_status" value="0" class="radioOrange" id="editInactive" {{ $data ? ($data->isaktif == '0' ? 'checked' : '') : '' }}>
                <label for="editInactive" class="optionOrange check">
                  <span class="descOrange">Inactive</span>
                </label>
              </div>
            </div>
            <div class="col-12 mt-2 mb-4">
                <div class="borderlight"></div>
            </div>
            <div class="col-12 justify-sb mb-3">
              <div class="title-18">Question List</div>
              <button id="addRow" type="button" class="btn-blue-md">Add<i class="fs-18 ml-2 fas fa-plus"></i> </button>
            </div>
          </div>
          <div class="containerQuest">
              @foreach($data->question as $key =>$value)
              <div class="col-12 mt-3">
                <div class="title-sm">Question</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>
                  <input type="text" style="border-radius : 0 10px 10px 0 !important" class="form-control border-input-10 h-38" id="question" name="question[]" value="{{$value->question}}" placeholder="Enter question"required>
                  <input type="hidden" class="form-control border-input-10 h-38" id="id_question" name="id_question[]" value="{{$value->id}}" >
                </div>
              </div>
              <div class="col-12">
                <div class="row align-items-center d-flex">
                  <div class="col-10">
                    <div class="title-sm">Type</div>
                    <div class="input-group flex mt-1 mb-3">
                      <div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>
                        <select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]" required>
                          <option selected value="{{$value->question_type}}">{{$value->question_type}}</option>
                          <option value="Agreement">Agreement</option>  
                          <option value="Improvement">Improvement</option>  
                          <option value="Yes/ No">Yes/ No</option> 
                          <option value="Essay">Essay</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <input type="hidden" value="{{$value->isaktif}}" name="isaktif[]">
                    <div class="custom-control custom-switch d-flex justify-content-end mt-1">
                        <input type="checkbox" class="custom-control-input ml-auto" id="closed{{$value->id}}"   {{ $value ? ($value->isaktif == '1' ? 'checked' : '') : '' }}>
                        <label class="custom-control-label pointer" for="closed{{$value->id}}">Active</label>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <div id="newRow">
                
              </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6">
              <button type="button" onclick="location.href='{{route('rating.master')}}' " class="btn-red-md w-100"> Cancel</button>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn-blue-md w-100"> Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
@push("scripts")

<script>


  // $("#addRow").click(function () {
  //   var html = '';
  //   html +='<div class="col-12 mt-3 hapusRow" id="inputFormRowWO">';
  //   html +='<div class="title-sm">Question</div>';
  //   html +='<div class="input-group flex mt-1 mb-3">';
  //   html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
  //   html +='<input type="text" style="border-radius : 0 10px 10px 0 !important" class="form-control border-input-10 h-38" id="question" name="question[]" placeholder="Enter question"required>';
  //   html +='<input type="hidden" class="form-control border-input-10 h-38" id="id_question" name="id_question[]" >';
  //   html +='<input type="hidden" class="form-control border-input-10 h-38" id="isaktif" name="isaktif[]" value="1">';
  //   html +='</div>';
  //   html +='</div>';
  //   html +='<div class="col-12">';
  //   html +='<div class="row align-items-center d-flex">';
  //   html +='<div class="col-11">';
  //   html +='<div class="title-sm">Type</div>';
  //   html +='<div class="input-group flex mt-1 mb-3">';
  //   html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
  //   html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]" required>';
  //   html +='<option selected value="">Enter type</option>';
  //   html +='<option value="Agreement">Agreement</option>'; 
  //   html +='<option value="Improvement">Improvement</option>';
  //   html +='<option value="Yes/ No">Yes/ No</option>';
  //   html +='<option value="Essay">Essay</option>';
  //   html +='</select>';
  //   html +='</div>';
  //   html +='</div>';
  //   html +='<div class="col-1">';
  //   html +='<button id="removeRowWO" type="button" class="btn-delete-row"><i class="fs-20 far fa-times-circle"></i></button>';
  //   html +='</div>';
  //   html +='</div>';
  //   html +='</div>';
  //   html +='</div>';
  //   $('#newRow').append(html);
  // });
$("#addRow").click(function () {
      var html = '';
          html +='<div class="containerQuest hapusRow" id="inputFormRowWO">';
          html += '<row class="mt-3">';
          html +='<div class="col-12">';
          html +='<div class="title-sm">Question</div>';
          html +='<div class="input-group flex mt-1 mb-3">';
          html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
          html +='<input type="text" style="border-radius : 0 10px 10px 0 !important" class="form-control border-input-10 h-38" id="question" name="question[]" placeholder="Enter question" required>';
          html +='<input type="hidden" class="form-control border-input-10 h-38" id="id_question" name="id_question[]" >';
          html +='<input type="hidden" class="form-control border-input-10 h-38" id="isaktif" name="isaktif[]" value="1">';
          html +='</div></div>';
          html +='<div class="col-12">';
          html +='<div class="title-sm">Type</div>';
          html +='<div class="input-group flex mt-1 mb-3">';
          html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
          html +='<select style="border-radius : 0 10px 10px 0 !important" class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]" required>';
          html +='<option selected value="">Enter type</option>';
          html +='<option value="Agreement">Agreement</option>  ';
          html +='<option value="Improvement">Improvement</option>  ';
          html +='<option value="Yes/ No">Yes/ No</option> ';
          html +='<option value="Essay">Essay</option>';
          html +='</select>';
          html +='<button id="removeRowWO" type="button" class="btn-delete-row ml-1"><i class="fs-20 far fa-times-circle"></i></button>';
          html +='</div>'
          html +='</div>';
          html +='</div>';
          html +='</div>';
  
      $('#newRow').append(html);
    });
  // remove row
  $(document).on('click', '#removeRowWO', function () {
    $(this).closest('.hapusRow').remove();
  });

  

  $( document ).ready(function() {
    const ckckckk = document.getElementsByClassName('custom-control-input'); 
    for (let i = 0; i < ckckckk.length; i++) {
      ckckckk[i].addEventListener('click', function () {
        if( ckckckk[i].checked == true ) {
          ckckckk[i].parentNode.previousElementSibling.value = '1'
        } else if ( ckckckk[i].checked == false ) { 
          ckckckk[i].parentNode.previousElementSibling.value = '0' 
        }
      })
    }

  });
</script>

@endpush        