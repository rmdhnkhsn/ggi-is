<div class="modal fade" id="detail{{ $value['ess_id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:680px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb py-3 px-4">
                    <div class="title-22">Detail Data Turn Over</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-4">
                <div class="col-12">
                    <table class="table tbl-content-left">
                        <tr>
                            <td width="25%" class="tbl1">Alamat</td>
                            <td width="75%" class="tbl2 text-wrap" >{{ $value['string1'] }}</td>
                        </tr>
                        <tr>
                            <td width="25%" class="tbl1">Alasan Keluar</td>
                            <td width="75%" class="tbl2 text-wrap">{{ $value['note1'] }}</td>
                        </tr>
                        <tr>
                            <td width="25%" class="tbl1">Approve 1</td>
                            <td width="75%" class="tbl2">{{ $value['concat_approver1'] }}</td>
                        </tr>
                        <tr>
                            <td width="25%" class="tbl1">Approve 2</td>
                            <td width="75%" class="tbl2">{{ $value['concat_approver2'] }}</td>
                        </tr>
                        <tr>
                            <td width="25%" class="tbl1">Action</td>
                            <td width="75%">
                                <div class="flex" style="gap:.6rem">
                                    <a href="" class="btn-blue-md">Print<i class="ml-2 fs-18 fas fa-print"></i></a>
                                    <a href="" class="btn-orange-md" style="max-width:180px">Print Paklaring<i class="ml-2 fs-18 fas fa-print"></i></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>