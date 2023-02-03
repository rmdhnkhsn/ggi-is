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
                        @if($data['application_letter']!=null)
                        <iframe  id="pdf-js-viewer" src="{{ asset('storage/job_vacancy/application_letter/'.$data['application_letter']) }}" width="100%" height="530"></iframe>
                        @else
                        <div class="noData" role="alert">
                            <div class="desc">Tidak ada data untuk ditampilkan</div>
                        </div>
                        @endif
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
                        @if($data['award']!=null)
                        <iframe  id="pdf-js-viewer" src="{{ asset('storage/job_vacancy/award/'.$data['award']) }}" width="100%" height="530"></iframe>
                        @else
                        <div class="noData" role="alert">
                            <div class="desc">Tidak ada data untuk ditampilkan</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($data['psyco_score'] != 0)
        <div id="accordion" style="margin-top:-10px">
            <div class="cards">
                <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id="headingTwo">
                    <i class="accord-icon fas fa-file-contract"></i>   
                    <div class="accordion-title">File Psychological Test</div>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="cards accordion-body">
                        @if($data['award']!=null)
                        <iframe  id="pdf-js-viewer" src="{{ asset('storage/job_vacancy/file_psikotest/'.$data['file_psikotest']) }}" width="100%" height="530"></iframe>
                        @else
                        <div class="noData" role="alert">
                            <div class="desc">Tidak ada data untuk ditampilkan</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>