@extends("layouts.app")
@section("title","Vacancy Description")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
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
    <div class="row pb-4">
      <div class="col-12 vacancyDesc">
        <div class="cards-18 p-4">
            <div class="row">
                <div class="col-12 text-center pt-2 pb-5">
                    <div class="title-24">Vacancy Description</div>
                    <div class="sub-title-14">Add description to job vacancies</div>
                </div>  
            </div>
            <?php 
            if ($data->ers_vacancy != null) {
                $uraian_singkat = $data->ers_vacancy->uraian_singkat;
                $jobdesk = $data->ers_vacancy->jobdesk;
                $maximal_usia = $data->ers_vacancy->maximal_usia;
                $pendidikan = $data->ers_vacancy->pendidikan;
                $ipk = $data->ers_vacancy->ipk;
                $penempatan = $data->ers_vacancy->penempatan;
                $info_lainnya = $data->ers_vacancy->info_lainnya;
                $minimal_salary = $data->ers_vacancy->minimal_salary;
                $maximal_salary = $data->ers_vacancy->maximal_salary;
                $other_benefit = $data->ers_vacancy->other_benefit;
            }else{
                $uraian_singkat = null;
                $jobdesk = null;
                $maximal_usia = null;
                $pendidikan = null;
                $ipk = null;
                $penempatan = null;
                $info_lainnya = null;
                $minimal_salary = null;
                $maximal_salary = null;
                $other_benefit = null;
            }
            ?>
            <form action="{{ route('request-desc_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="ers_id" name="ers_id" value="{{$data->ers_id}}">  
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="title-20-dark">Details</div>
                        <div class="border-55"></div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Departement</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="departemen" name="string1" value="{{$data->string1}}" placeholder="Departement..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Level Jabatan</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="level_jabatan" name="string2" value="{{$data->string2}}" placeholder="Level Jabatan..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Posisi</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="bagian" name="string4" value="{{$data->string4}}" placeholder="Posisi..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Status Karyawan</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="status_karyawan" name="string5" value="{{$data->string5}}" placeholder="Status Karyawan..." required>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <span class="title-sm">Uraian Singkat</span>
                        <div class="messageGrey mt-1">
                            <textarea id="konten" name="uraian_singkat" placeholder="Uraian Singkat...">{{$uraian_singkat}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <span class="title-sm">Jobdesk</span>
                        <div class="messageGrey mt-1">
                            <textarea id="konten2" name="jobdesk" placeholder="Job desk...">{{$jobdesk}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 mb-2">
                        <div class="title-20-dark">Requirements</div>
                        <div class="border-55"></div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Pendidikan{{$data->note5}}</span>
                        <!-- <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="pendidikan" name="note5" value="{{$data->note5}}" placeholder="Pendidikan..." required>
                        </div> -->
                        <select class="form-control input-data-fa" id="pendidikan" name="pendidikan">
                            <option selected></option>
                            <option {{ strtoupper($pendidikan) == '1' ? 'selected' : ''}} value="1">SD</option>
                            <option {{ strtoupper($pendidikan) == '2' || $pendidikan == 'SLTP' ? 'selected' : ''}} value="2">SMP/SLTP</option>
                            <option {{ strtoupper($pendidikan) == '3' || $pendidikan == 'SLTA' ? 'selected' : ''}} value="3">SMA/SLTA</option>
                            <option {{ strtoupper($pendidikan) == '4' ? 'selected' : ''}} value="4">D1</option>
                            <option {{ strtoupper($pendidikan) == '5' ? 'selected' : ''}} value="5">D2</option>
                            <option {{ strtoupper($pendidikan) == '6' ? 'selected' : ''}} value="6">D3</option>
                            <option {{ strtoupper($pendidikan) == '7' ? 'selected' : ''}} value="7">S1</option>
                            <option {{ strtoupper($pendidikan) == '8' ? 'selected' : ''}} value="8">S2</option>
                            <option {{ strtoupper($pendidikan) == '9' ? 'selected' : ''}} value="9">S3</option>
                        </select>
                    </div>
                    <div class="col-md-3 my-2">
                        <span class="title-sm">Minimal Usia</span>
                        <div class="input-group mt-1">
                            <input type="number" step="0.01" class="form-control border-input-10" id="minimal_usia" name="num1" value="{{$data->num1}}" placeholder="Minimal Usia..." required>
                        </div>
                    </div>
                    <div class="col-md-3 my-2">
                        <span class="title-sm">Maximal Usia</span>
                        <div class="input-group mt-1">
                            <input type="number" step="0.01" class="form-control border-input-10" id="maximal_usia" name="maximal_usia" value="{{$maximal_usia}}"placeholder="Maximal Usia..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Fakultas/Jurusan</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="fakultas" name="note6" value="{{$data->note6}}" placeholder="Fakultas atau Jurusan..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">IPK</span>
                        <div class="input-group mt-1">
                            <input type="number" step="0.01" class="form-control border-input-10" id="ipk" name="ipk" value="{{$ipk}}" placeholder="Minimum IPK..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Kepribadian</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="kepribadian" name="note9" value="{{$data->note9}}" placeholder="Kepribadian..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Pengalaman</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="pengalaman" name="note7" value="{{$data->note7}}" placeholder="Pengalaman..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Penempatan</span>
                        <select class="form-control input-data-fa data_ppic" id="penempatan" name="penempatan" required="required">
                            <option selected></option>
                            @foreach($branch as $key => $value)
                                <option {{ $value['nama_branch'] == $penempatan ? 'selected' : ''}} value="{{ $value['nama_branch'] }}">{{ $value['nama_branch'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Informasi Lainya</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="info_lainnya" name="info_lainnya" value="{{$info_lainnya}}" placeholder="Informasi Lainya...">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 mb-2">
                        <div class="title-20-dark">Benefits</div>
                        <div class="border-55"></div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Minimal Salary</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="minimal_salary" name="minimal_salary" value="{{$minimal_salary}}" placeholder="Minimal Salary..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <span class="title-sm">Maximal Salary</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="maximal_salary" name="maximal_salary" value="{{$maximal_salary}}" placeholder="Maximal Salary..." required>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <span class="title-sm">Other Benefits</span>
                        <div class="messageGrey mt-1">
                            <textarea id="konten3" placeholder="Other Benefits..." id="other_benefit" name="other_benefit">{{$other_benefit}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 justify-start mt-3">
                        <button type="submit" id="saveData" class="btn-blue">Save<i class="ml-2 fas fa-download"></i></button>
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

<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>

<script>
  document.getElementById('saveData').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Success',
      text: 'Your Documet Has been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
   var konten = document.getElementById("konten");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   var konten = document.getElementById("konten2");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   var konten = document.getElementById("konten3");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>

@endpush