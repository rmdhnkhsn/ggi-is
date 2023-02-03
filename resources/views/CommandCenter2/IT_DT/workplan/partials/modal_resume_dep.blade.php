<div class="modal fade" id="modal_resume_dep" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                <h5>Resume Digitalisasi IT Per Department Tahun {{$tahun}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="card-scroll px-3">
                <div class="row scrollX" id="scroll-bar">
                    <div class="col-12">
                        <table class="table table-bordered table-striped fa-tbl-content no-wrap">
                            <thead>
                                <tr>
                                    <th width="200px">Dept</th>
                                    @if($total_resume_perbulan['jan']!=0)
                                    <th>Jan</th>
                                    @endif
                                    @if($total_resume_perbulan['feb']!=0)
                                    <th>Feb</th>
                                    @endif
                                    @if($total_resume_perbulan['mar']!=0)
                                    <th>Mar</th>
                                    @endif
                                    @if($total_resume_perbulan['apr']!=0)
                                    <th>Apr</th>
                                    @endif
                                    @if($total_resume_perbulan['mei']!=0)
                                    <th>May</th>
                                    @endif
                                    @if($total_resume_perbulan['jun']!=0)
                                    <th>Jun</th>
                                    @endif
                                    @if($total_resume_perbulan['jul']!=0)
                                    <th>Jul</th>
                                    @endif
                                    @if($total_resume_perbulan['ags']!=0)
                                    <th>Aug</th>
                                    @endif
                                    @if($total_resume_perbulan['sep']!=0)
                                    <th>Sep</th>
                                    @endif
                                    @if($total_resume_perbulan['okt']!=0)
                                    <th>Oct</th>
                                    @endif
                                    @if($total_resume_perbulan['nov']!=0)
                                    <th>Nov</th>
                                    @endif
                                    @if($total_resume_perbulan['des']!=0)
                                    <th>Des</th>
                                    @endif
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resume_perbulan as $key=>$value)
                                <tr>
                                    <td>{{$value['nama_dept']}}</td>
                                    @if($total_resume_perbulan['jan']!=0)
                                    <td>{{$value['jan']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['feb']!=0)
                                    <td>{{$value['feb']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['mar']!=0)
                                    <td>{{$value['mar']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['apr']!=0)
                                    <td>{{$value['apr']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['mei']!=0)
                                    <td>{{$value['mei']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['jun']!=0)
                                    <td>{{$value['jun']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['jul']!=0)
                                    <td>{{$value['jul']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['ags']!=0)
                                    <td>{{$value['ags']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['sep']!=0)
                                    <td>{{$value['sep']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['okt']!=0)
                                    <td>{{$value['okt']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['nov']!=0)
                                    <td>{{$value['nov']}}</td>
                                    @endif
                                    @if($total_resume_perbulan['des']!=0)
                                    <td>{{$value['des']}}</td>
                                    @endif
                                    <th>{{$value['total']}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                            <thead>
                                <tr>
                                    <th width="200px">Total</th>
                                    @if($total_resume_perbulan['jan']!=0)
                                    <th>{{$total_resume_perbulan['jan']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['feb']!=0)
                                    <th>{{$total_resume_perbulan['feb']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['mar']!=0)
                                    <th>{{$total_resume_perbulan['mar']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['apr']!=0)
                                    <th>{{$total_resume_perbulan['apr']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['mei']!=0)
                                    <th>{{$total_resume_perbulan['mei']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['jun']!=0)
                                    <th>{{$total_resume_perbulan['jun']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['jul']!=0)
                                    <th>{{$total_resume_perbulan['jul']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['ags']!=0)
                                    <th>{{$total_resume_perbulan['ags']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['sep']!=0)
                                    <th>{{$total_resume_perbulan['sep']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['okt']!=0)
                                    <th>{{$total_resume_perbulan['okt']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['nov']!=0)
                                    <th>{{$total_resume_perbulan['nov']}}</th>
                                    @endif
                                    @if($total_resume_perbulan['des']!=0)
                                    <th>{{$total_resume_perbulan['des']}}</th>
                                    @endif
                                    <th>{{$total_resume_perbulan['total']}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>