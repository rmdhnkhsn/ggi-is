
<form action="{{ route('applicant-interview_store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                            <input type="radio" name="penampilan" value="100" id="radioA1" class="radioCustomInput">
                            <label for="radioA1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="penampilan" value="66" id="radioA2" class="radioCustomInput">
                            <label for="radioA2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="penampilan" value="34" id="radioA3" class="radioCustomInput">
                            <label for="radioA3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_penampilan" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">B.</td> 
                        <td><b> Pengetahuan pada bidangkerja </b> :   Kesesuaian pengetahuan dengan jawaban, memberi jawaban dengan logis</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" value="100" id="radioB1" class="radioCustomInput">
                            <label for="radioB1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" value="66" id="radioB2" class="radioCustomInput">
                            <label for="radioB2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="pengetahuan" value="34" id="radioB3" class="radioCustomInput">
                            <label for="radioB3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_pengetahuan" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">C.</td> 
                        <td><b> Motivasi </b> :  Alasan & minat melamar pekerjaan</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" value="100" id="radioC1" class="radioCustomInput">
                            <label for="radioC1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" value="66" id="radioC2" class="radioCustomInput">
                            <label for="radioC2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="motivasi" value="34" id="radioC3" class="radioCustomInput">
                            <label for="radioC3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_motivasi" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">D.</td> 
                        <td><b> Ambisi / Drive </b> : Semangat kerja, Energi, Keinginan, berprestasi</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" value="100" id="radioD1" class="radioCustomInput">
                            <label for="radioD1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" value="66" id="radioD2" class="radioCustomInput">
                            <label for="radioD2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="ambisi" value="34" id="radioD3" class="radioCustomInput">
                            <label for="radioD3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_ambisi" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">E.</td> 
                        <td><b> Inisiatif / Kreatifitas </b> : Kemauan memulai sesuatu, kelincahan dalam mencari solusi</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" value="100" id="radioE1" class="radioCustomInput">
                            <label for="radioE1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" value="66" id="radioE2" class="radioCustomInput">
                            <label for="radioE2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="inisiatif" value="34" id="radioE3" class="radioCustomInput">
                            <label for="radioE3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_inisiatif" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">F.</td> 
                        <td><b> Komunikasi </b> : Dapat mengungkapkan ide & pemikiran secara jelas dan mudah dipahami</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" value="100" id="radioF1" class="radioCustomInput">
                            <label for="radioF1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" value="66" id="radioF2" class="radioCustomInput">
                            <label for="radioF2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="komunikasi" value="34" id="radioF3" class="radioCustomInput">
                            <label for="radioF3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_komunikasi" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">G.</td> 
                        <td><b> Cara Berfikir </b> : Sistematis & Kemampuan menganalisa permasalahan</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="berfikir" value="100" id="radioG1" class="radioCustomInput">
                            <label for="radioG1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="berfikir" value="66" id="radioG2" class="radioCustomInput">
                            <label for="radioG2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="berfikir" value="34" id="radioG3" class="radioCustomInput">
                            <label for="radioG3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_berfikir" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                    <tr class="hoverBlue">
                        <td style="width:35px">H.</td> 
                        <td><b> Team Work </b> : Berkoordinasi, Kerjasama dengan rekan sekerja, Atasan, atau Bawahan</td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="teamwork" value="100" id="radioH1" class="radioCustomInput">
                            <label for="radioH1" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="teamwork" value="66" id="radioH2" class="radioCustomInput">
                            <label for="radioH2" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div class="justify-center">
                            <input type="radio" name="teamwork" value="34" id="radioH3" class="radioCustomInput">
                            <label for="radioH3" class="radioCustom2"></label>
                        </div>
                        </td>
                        <td>
                        <div style="margin:-6px">
                            <input type="text" class="form-control border-input-10" name="remark_teamwork" value="" placeholder="" />
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.conclusion')
</form>