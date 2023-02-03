<!-- Modal -->
<div class="modal fade" id="details-{{$row['id']}}"role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered text-left">
                            <tr>
                                <td width="50%" style="font-weight:600">Kode Kerja</td>
                                <td width="50%" style="font-weight:400" id="part2">{{$row['kode_kerja']}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Jam Kerja</td>
                                <td width="50%" style="font-weight:400">{{$row['jam_kerja']}} Jam</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Istirahat</td>
                                <td width="50%" style="font-weight:400">{{$row['istirahat']}} Menit</td>
                            </tr>
                        </table>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</div>

<form action="{{ route('master_kode_kerja.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$row['id']}}">
    <div class="modal fade" id="edit_detail-{{$row['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align:left;">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-12">
                            <span class="title-sm">Kode Kerja</span>
                            <div class="fields mt-1 mb-3">
                                <input type="text" id="kode_kerja" name="kode_kerja" value="{{$row['kode_kerja']}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Jam Kerja (Satuan Jam)</span>
                            <div class="fields mt-1 mb-3">
                                <input type="number" id="jam_kerja" name="jam_kerja" value="{{$row['jam_kerja']}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Istirahat (Satuan Menit)</span>
                            <div class="fields mt-1 mb-3">
                                <input type="number" id="istirahat" name="istirahat" value="{{$row['istirahat']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-2 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>



