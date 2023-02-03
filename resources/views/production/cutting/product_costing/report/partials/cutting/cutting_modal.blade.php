<div class="modal fade" id="cost{{$value['no_wo']}}-{{$value['nik']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                    <td class="text-left">{{$value['start']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Finish</td> 
                                    <td class="text-left">{{$value['finish']}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Duration</td> 
                                    <td class="text-left">{{$value['process_time']}}</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Duration/WO</td> 
                                    <td class="text-left">{{number_format($value['durasi_per_wo'], 2, ",", ".")}}</td> 
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Qty/Minute</td> 
                                    <td class="text-left">{{number_format($value['waktu_pcs'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Salary</td> 
                                    <td class="text-left">Rp. {{number_format($value['salary'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Cost/Pcs</td> 
                                    <td class="text-left">Rp. {{number_format($value['cost_pc'], 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="font-weight:600">Total Cost</td> 
                                    <td class="text-left">Rp. {{number_format($value['total_cost_wo'], 2, ",", ".")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>