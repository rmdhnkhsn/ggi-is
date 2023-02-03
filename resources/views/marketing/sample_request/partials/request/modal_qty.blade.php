<div class="modal fade" id="qty{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <table class="table table-not-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="bg-striped" colspan="5">Breakdown QTY</th>
                                </tr>
                                <tr>
                                    <th class="bg-striped" width="20%">{{ $value['nama_size1'] }}</th>
                                    <th class="bg-striped" width="20%">{{ $value['nama_size2'] }}</th>
                                    <th class="bg-striped" width="20%">{{ $value['nama_size3'] }}</th>
                                    <th class="bg-striped" width="20%">{{ $value['nama_size4'] }}</th>
                                    <th class="bg-striped" width="20%">{{ $value['nama_size5'] }}</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $value['qty_size1'] }}</td>
                                    <td>{{ $value['qty_size2'] }}</td>
                                    <td>{{ $value['qty_size3'] }}</td>
                                    <td>{{ $value['qty_size4'] }}</td>
                                    <td>{{ $value['qty_size5'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>