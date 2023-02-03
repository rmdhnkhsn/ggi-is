@extends("layouts.app")
@section("title","Details")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row jobVacancy">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row"> 
            <!-- Untuk Step Bar  -->
            @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.step_bar')
            <!-- Data index pelamar  -->
            @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.index_applicant')
          </div>
          <!-- Untuk Application letter & Award  -->
          @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.file_applicant')
          <!-- Untuk cek isi relasi  -->
            <?php 
            // Psikologi 
            $test_psikologi = collect($applicant->psychotest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
            // Skills 
            $test_skill = collect($applicant->skilltest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
            // Interview 
            $cek_user = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->where('user_kategory', 'USER')->count('id');
            $data_user = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->where('user_kategory', 'USER')->first();
            $cek_hrd = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->where('user_kategory', 'HRD')->count('id');
            $data_hrd = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->where('user_kategory', 'HRD')->first();
            ?>
          <!-- end  -->

          <div class="row mt-3 px-2">
            <!-- Untuk test psikologi  -->
            @if($test_psikologi != 0 && $data['psyco_date'] != null)
              @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.psikologi_value')
            @endif
            @if($test_skill != 0 && $data['skill_date'] != null)
              <!-- Untuk Test Skill  -->
              @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.skill_value')
            @endif
          </div>
          <!-- Untuk Interview  -->
          @if($data['interview_date'] != null)
              @if(auth()->user()->departemensubsub == 'RECRUITMENT' && $cek_hrd == 0)
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.interview_hrd')
              @elseif(auth()->user()->departemensubsub != 'RECRUITMENT' && $cek_user == 0)
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.interview_user')
              @elseif($cek_hrd != 0 && $cek_user != 0)
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.interview_result')
              @endif
          @endif
          <!-- Untuk Approval  -->

          @if($cek_hrd != 0 && $cek_user != 0 && auth()->user()->departemensubsub == 'RECRUITMENT')
            @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.approval')
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@endpush