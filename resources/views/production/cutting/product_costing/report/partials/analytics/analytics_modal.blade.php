<div class="modal fade" id="duration" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">07:00</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">08:25</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">01:25 
                                        <span style="font-weight:600">(85 Minute)</span>
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Qty/Minute</td> 
                                    <td class="text-left">2.35</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Salary</td> 
                                    <td class="text-left">3.000.000</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    <td class="text-left">132.21</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">26.562,2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="cost_gelar{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost Gelar</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Form ID</td> 
                                    <td class="text-left">{{$value['form_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Tanggal Gelar</td> 
                                    <td class="text-left">{{$value['tanggal_gelar']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">{{$value['start_time_gelar']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish_time_gelar']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">{{$value['total_waktu_gelar']}} Minute</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    <td class="text-left">Rp. {{number_format($value['cost_pc_gelar'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo_gelar'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="cost_cutting{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost Cutting</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Form ID</td> 
                                    <td class="text-left">{{$value['form_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Tanggal Gelar</td> 
                                    <td class="text-left">{{$value['tanggal_cutting']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">{{$value['start_time_cutting']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish_time_cutting']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">{{$value['total_waktu_cutting']}} Minute</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    <td class="text-left">Rp. {{number_format($value['cost_pc_cutting'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo_cutting'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="cost_numbering{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost Numbering</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Form ID</td> 
                                    <td class="text-left">{{$value['form_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Tanggal Gelar</td> 
                                    <td class="text-left">{{$value['tanggal_numbering']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">{{$value['start_time_numbering']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish_time_numbering']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">{{$value['total_waktu_numbering']}} Minute</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    <td class="text-left">Rp. {{number_format($value['cost_pc_numbering'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo_numbering'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="cost_pressing{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost Pressing</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Form ID</td> 
                                    <td class="text-left">{{$value['form_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Tanggal Gelar</td> 
                                    <td class="text-left">{{$value['tanggal_pressing']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">{{$value['start_time_pressing']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish_time_pressing']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">{{$value['total_waktu_pressing']}} Minute</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    @if($value['cost_pc_pressing'] != null)
                                    <td class="text-left">Rp. {{number_format($value['cost_pc_pressing'], 2, ",", ".")}}</td>
                                    @else
                                    <td class="text-left">Rp. {{$value['cost_pc_pressing']}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    @if($value['total_cost_wo_pressing'] != null)
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo_pressing'], 2, ",", ".")}}</td>
                                    @else
                                    <td class="text-left">Rp. {{$value['total_cost_wo_pressing']}}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="cost_bundling{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">Detail Cost Bundling</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Form ID</td> 
                                    <td class="text-left">{{$value['form_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Tanggal Gelar</td> 
                                    <td class="text-left">{{$value['tanggal_bundling']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Start</td> 
                                    <td class="text-left">{{$value['start_time_bundling']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish_time_bundling']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration</td> 
                                    <td class="text-left">{{$value['total_waktu_bundling']}} Minute</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td>
                                    <td class="text-left">Rp. {{number_format($value['cost_pc_bundling'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo_bundling'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<div class="modal fade" id="total_cost{{$value['no_wo']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <span class="title-14">WO - {{$value['no_wo']}}</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-left">
                        <table class="table table-not-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Proses Gelar</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_bayar_gelar'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Proses Cutting</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_bayar_cutting'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Proses Numbering</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_bayar_numbering'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Proses Pressing</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_bayar_pressing'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Proses Bundling</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_bayar_bundling'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>