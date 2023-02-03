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
            <div class="col-12 justify-center py-5">
              <div class="title-24">Applicant Details</div>
            </div>
            <div class="col-12">
              <div class="bg-tracking h-185">
                <div class="cards-scroll scrollX" id="scroll-bar2">
                  <ul>
                    <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
                    <!-- <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/applicant.svg')}}" class="icon-stepbar"> -->
                      <div class="stepbar one">
                        <span>1</span>
                      </div>
                      <p class="title-stepbar">Applicant</p>
                    </li>
                    <!-- <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">  -->
                    <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/psychotest.svg')}}" class="icon-stepbar">
                      <div class="stepbar two">
                        <span>2</span>
                      </div>
                      <p class="title-stepbar">Psychotest</p>
                    </li>
                    <!-- <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">  -->
                    <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/test-skill.svg')}}" class="icon-stepbar">
                      <div class="stepbar two">
                        <span>3</span>
                      </div>
                      <p class="title-stepbar">Test Skills</p>
                    </li>
                    <!-- <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">  -->
                    <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/interview.svg')}}" class="icon-stepbar">
                      <div class="stepbar three">
                        <span>4</span>
                      </div>
                      <p class="title-stepbar">Interview</p>
                    </li>
                    <!-- <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">  -->
                    <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/probation.svg')}}" class="icon-stepbar">
                      <div class="stepbar four">
                        <span>5</span>
                      </div>
                      <p class="title-stepbar">Probation</p>
                    </li>
                    <!-- <li class="progress-item-check">
                      <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">  -->
                    <li class="progress-item">
                      <img src="{{url('images/iconpack/job_vacancy/disqualification.svg')}}" class="icon-stepbar">
                      <div class="stepbar six">
                        <span>6</span>
                      </div>
                      <p class="title-stepbar">Disqualification</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <table class="table table-bordered table-16 text-left mt-2">
                <tbody>
                  <tr>
                    <td width="28%" style="font-weight:600">NIK</td> 
                    <td width="72%">11223344</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Apply Job</td> 
                    <td width="72%">Business Analyst</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Name</td> 
                    <td width="72%">Hendra</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Gender</td> 
                    <td width="72%">Male</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Date Of Birth</td> 
                    <td width="72%">06 June 1999</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Address</td> 
                    <td width="72%">Jl. Bojong Becik RT 02 RW 07 PASEH - BANDUNG </td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Major</td> 
                    <td width="72%">S1</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Education</td> 
                    <td width="72%">TEKNIK INFORMATIKA</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Psychological Test Date</td> 
                    <td width="72%">06 April 2022</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Skills Test Date</td> 
                    <td width="72%">06 April 2022</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Interview Date</td> 
                    <td width="72%">08 April 2022</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Probation Date</td> 
                    <td width="72%">10 April 2022</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Assign Employee Date</td> 
                    <td width="72%">10 April 2022</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Email</td> 
                    <td width="72%">hendra_sugandi@gmail.com</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Telphone</td> 
                    <td width="72%">089665122154</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Short Resume</td> 
                    <td width="72%">Saya mampu belajar dan beradaptasi dengan cepat, memiliki pengalaman pada bidang yang sama, sehingga saya siap dengan tugas dan tanggung jawab yang akan diberikan oleh perusahaan.</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Award 1</td> 
                    <td width="72%">Olimpiade Menyayi Juara 1</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Award 2</td> 
                    <td width="72%">-</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Award 3</td> 
                    <td width="72%">-</td>
                  </tr>
                  <tr>
                    <td width="28%" style="font-weight:600">Award 4</td> 
                    <td width="72%">-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                    <i class="accord-icon fas fa-file-contract"></i>   
                    <div class="accordion-title">Curriculum Vitae</div>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <!-- <iframe  id="pdf-js-viewer" src="" width="100%" height="750"></iframe> -->
                      <div class="noData" role="alert">
                        <div class="desc">Tidak ada data untuk ditampilkan</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="accordion" style="margin-top:-10px">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                    <i class="accord-icon fas fa-file-contract"></i>   
                    <div class="accordion-title">Award</div>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <!-- <iframe  id="pdf-js-viewer" src="" width="100%" height="750"></iframe> -->
                      <div class="noData" role="alert">
                        <div class="desc">Tidak ada data untuk ditampilkan</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3 px-2">
            <div class="col-12 mb-2">
              <div class="title-24">Evaluation Psychological Test</div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Papikositik/EPPS</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of EPPS" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">TKD</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of TKD" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">DISC</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of DISC" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">EAS</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of EAS" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Paulin/Kreplin</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of paulin" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">TMC</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of TMC" required/>
              </div>
            </div>
            <div class="col-12 justify-center mb-3" style="gap:1.5rem">
              <div class="title-14 no-wrap">More Psychological Test</div>
              <div class="borderlight"></div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 1</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 1</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 1" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 2</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 2</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 2" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 3</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 3</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 3" required/>
              </div>
            </div>
            <div class="col-12 justify-center my-3">
              <div class="borderlight"></div>
            </div>
            <div class="col-12 mb-2">
              <div class="title-24">Fit & Propper Test</div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Accounting</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of accounting" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">IT</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of it" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Computer</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of computer" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">English Language</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of language" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Sewing</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of sewing" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">QC</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of qc" required/>
              </div>
            </div>
            <div class="col-12 justify-center mb-3" style="gap:1.5rem">
              <div class="title-14 no-wrap">More Skills Test</div>
              <div class="borderlight"></div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 1</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 1</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 1" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 2</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 2</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 2" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Test Name 3</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="test name" required/>
              </div>
            </div>
            <div class="col-lg-2">
              <span class="title-sm">Value Test 3</span>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="score of test 3" required/>
              </div>
            </div>
            <div class="col-12 justify-center my-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="row mt-4 px-2">
            <div class="col-12">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table class="table table-content">
                  <thead>
                    <tr>
                      <th class="text-center" colspan="2" rowspan="2"><div class="mb-4">INTERVIEW : ASSESSED ASPECTS</div></th>
                      <th class="text-center" colspan="3">HRD</th>
                      <!-- <th class="text-center" colspan="3">USER</th> -->
                      <th style="width:280px" class="text-center" rowspan="2"><div class="mb-4">REMARK</div></th> 
                    </tr>
                    <tr>
                      <th style="width:90px" class="text-center">Baik</th>
                      <th style="width:90px" class="text-center">Cukup</th>
                      <th style="width:90px" class="text-center">Kurang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="hoverBlue">
                      <td style="width:35px">A.</td> 
                      <td><b>Penampilan / Sikap</b> :  Rapih, PD, Sopan, Keadaan Fisik</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="penampilan" id="radioA1" class="radioCustomInput">
                            <label for="radioA1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="penampilan" id="radioA2" class="radioCustomInput">
                            <label for="radioA2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="penampilan" id="radioA3" class="radioCustomInput">
                            <label for="radioA3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">B.</td> 
                      <td><b> Pengetahuan pada bidangkerja </b> :   Kesesuaian pengetahuan dengan jawaban, memberi jawaban dengan logis</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" id="radioB1" class="radioCustomInput">
                            <label for="radioB1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" id="radioB2" class="radioCustomInput">
                            <label for="radioB2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" id="radioB3" class="radioCustomInput">
                            <label for="radioB3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">C.</td> 
                      <td><b> Motivasi </b> :  Alasan & minat melamar pekerjaan</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" id="radioC1" class="radioCustomInput">
                            <label for="radioC1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" id="radioC2" class="radioCustomInput">
                            <label for="radioC2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" id="radioC3" class="radioCustomInput">
                            <label for="radioC3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">D.</td> 
                      <td><b> Ambisi / Drive </b> : Semangat kerja, Energi, Keinginan, berprestasi</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" id="radioD1" class="radioCustomInput">
                            <label for="radioD1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" id="radioD2" class="radioCustomInput">
                            <label for="radioD2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" id="radioD3" class="radioCustomInput">
                            <label for="radioD3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">E.</td> 
                      <td><b> Inisiatif / Kreatifitas </b> : Kemauan memulai sesuatu, kelincahan dalam mencari solusi</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" id="radioE1" class="radioCustomInput">
                            <label for="radioE1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" id="radioE2" class="radioCustomInput">
                            <label for="radioE2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" id="radioE3" class="radioCustomInput">
                            <label for="radioE3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">F.</td> 
                      <td><b> Komunikasi </b> : Dapat mengungkapkan ide & pemikiran secara jelas dan mudah dipahami</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" id="radioF1" class="radioCustomInput">
                            <label for="radioF1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" id="radioF2" class="radioCustomInput">
                            <label for="radioF2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" id="radioF3" class="radioCustomInput">
                            <label for="radioF3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">G.</td> 
                      <td><b> Cara Berfikir </b> : Sistematis & Kemampuan menganalisa permasalahan</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="fikir" id="radioG1" class="radioCustomInput">
                            <label for="radioG1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="fikir" id="radioG2" class="radioCustomInput">
                            <label for="radioG2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="fikir" id="radioG3" class="radioCustomInput">
                            <label for="radioG3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                    <tr class="hoverBlue">
                      <td style="width:35px">H.</td> 
                      <td><b> Team Work </b> : Berkoordinasi, Kerjasama dengan rekan sekerja, Atasan, atau Bawahan</td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="team" id="radioH1" class="radioCustomInput">
                            <label for="radioH1" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="team" id="radioH2" class="radioCustomInput">
                            <label for="radioH2" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                            <input type="radio" name="team" id="radioH3" class="radioCustomInput">
                            <label for="radioH3" class="radioCustom2"></label>
                        </div>
                      </td>
                      <td>
                        <div style="margin:-6px">
                          <input type="text" class="form-control border-input-10" name="" value="" placeholder="" />
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row mt-3 px-2">
            <div class="col-12 mb-2">
              <div class="title-24">Conclusion</div>
            </div>
            <div class="col-lg-2">
              <div class="title-sm text-truncate">Interviewer name (HRD)</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input name" />
              </div>
            </div>
            <div class="col-lg-8">
              <div class="title-sm">Conclusion</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input remark" />
              </div>
            </div>
            <div class="col-lg-2">
              <div class="title-sm text-truncate">Recomendation</div>
              <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="recomendationHRD" id="yes" class="radioCustomInput">
                    <label for="yes" class="radioCustom2"></label>
                  </div>
                  <label for="yes" class="title-16 pointer ml-1" style="margin-top:6px">Yes</label>
                </div>
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="recomendationHRD" id="no" class="radioCustomInput">
                    <label for="no" class="radioCustom2"></label>
                  </div>
                  <label for="no" class="title-16 pointer ml-1" style="margin-top:6px">No</label>
                </div>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="title-sm text-truncate">Interviewer name (USER)</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input name" />
              </div>
            </div>
            <div class="col-lg-8">
              <div class="title-sm">Conclusion</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input remark" />
              </div>
            </div>
            <div class="col-lg-2">
              <div class="title-sm text-truncate">Recomendation</div>
              <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="recomendationUSER" id="yes2" class="radioCustomInput">
                    <label for="yes2" class="radioCustom2"></label>
                  </div>
                  <label for="yes2" class="title-16 pointer ml-1" style="margin-top:6px">Yes</label>
                </div>
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="recomendationUSER" id="no2" class="radioCustomInput">
                    <label for="no2" class="radioCustom2"></label>
                  </div>
                  <label for="no2" class="title-16 pointer ml-1" style="margin-top:6px">No</label>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="title-sm">Decision</div>
              <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="decision" id="accepted" class="radioCustomInput">
                    <label for="accepted" class="radioCustom2"></label>
                  </div>
                  <label for="accepted" class="title-15 pointer ml-1" style="margin-top:6px">Accepted</label>
                </div>
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="decision" id="considered" class="radioCustomInput">
                    <label for="considered" class="radioCustom2"></label>
                  </div>
                  <label for="considered" class="title-15 pointer ml-1" style="margin-top:6px">Considered</label>
                </div>
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="decision" id="rejected" class="radioCustomInput">
                    <label for="rejected" class="radioCustom2"></label>
                  </div>
                  <label for="rejected" class="title-15 pointer ml-1" style="margin-top:6px">Rejected</label>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="title-sm">Position</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input position" />
              </div>
            </div>
            <div class="col-lg-3">
              <div class="title-sm">Come to Work</div>
              <div class="input-group mt-1 mb-3">
                <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
                <input type="date" class="form-control border-input-10" id="" name="" value="" />
              </div>
            </div>
            <div class="col-lg-3">
              <div class="title-sm">Employee Status</div>
              <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue px-4" for="">Status</span>
                </div>
                <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                  <option selected disabled>Select Status</option>
                  <option name="Tetap">Tetap</option>    
                  <option name="Kontrak">Kontrak</option>    
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="title-sm">Facility & Benefits</div>
              <div class="flex mt-3" style="gap:1.6rem">
                <div class="checkA">
                  <input type="checkbox" class="check1" id="asuransi" value="" name="">
                  <label for="asuransi" class="label-checkbox2">Asuransi</label>
                </div>
                <div class="checkB">
                  <input type="checkbox" class="check1" id="jpk" value="" name="">
                  <label for="jpk" class="label-checkbox2">JPK</label>
                </div>
                <div class="checkC">
                  <input type="checkbox" class="check1" id="jamsostek" value="" name="">
                  <label for="jamsostek" class="label-checkbox2">Jamsostek</label>
                </div>
                <div class="checkD">
                  <input type="checkbox" class="check1" id="makan" value="" name="">
                  <label for="makan" class="label-checkbox2">Makan</label>
                </div>
                <div class="checkE">
                  <input type="checkbox" class="check1" id="jemputan" value="" name="">
                  <label for="jemputan" class="label-checkbox2">Jemputan</label>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="title-sm">Others Fasility & Benefits</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="input other Fasility & benefits" />
              </div>
            </div>
            <div class="col-lg-3">
              <div class="title-sm">Salary</div>
              <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="" value="" placeholder="Input salary" />
              </div>
            </div>
          </div>
          <div class="row mt-4 px-2">
            <div class="col-12 mb-4">
              <div class="title-24">Approval</div>
            </div>
            <div class="col-md-4">
              <div class="cardApproval">
                <div class="title-20">HRD</div>
                <div class="approved">APPROVED</div>
                <div class="name">Hendra Sugandi</div>
                <div class="justify-center mt-1" style="width:60%">
                  <div class="borderGrey"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="cardApproval">
                <div class="title-20">USER APPROVED</div>
                <div class="input-group justify-center" style="gap:1.4rem;margin-top:7px">
                  <div class="justify-start">
                    <div class="radioContainer">
                      <input type="radio" name="recomendationHRD" id="acc" class="radioCustomInput">
                      <label for="acc" class="radioCustom2"></label>
                    </div>
                    <label for="acc" class="title-16 pointer ml-1" style="margin-top:6px">Approved</label>
                  </div>
                  <div class="justify-start">
                    <div class="radioContainer">
                      <input type="radio" name="recomendationHRD" id="reject" class="radioCustomInput">
                      <label for="reject" class="radioCustom2"></label>
                    </div>
                    <label for="reject" class="title-16 pointer ml-1" style="margin-top:6px">Rejected</label>
                  </div>
                </div>
                <div class="name">Hendra Sugandi</div>
                <div class="justify-center mt-1" style="width:60%">
                  <div class="borderGrey"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="cardApproval">
                <div class="title-20 text-center">MIN. MANAGER APPROVED</div>
                <div class="rejected">REJECTED</div>
                <div class="name">Hendra Sugandi</div>
                <div class="justify-center mt-1" style="width:60%">
                  <div class="borderGrey"></div>
                </div>
              </div>
            </div>
          </div>
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