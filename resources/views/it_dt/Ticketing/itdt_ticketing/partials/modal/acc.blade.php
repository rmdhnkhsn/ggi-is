
<form class="formloading" action="{{route('tiket-acc-store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="acc" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Create Ticket Description</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Name</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Tiket for</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="" value="Accounting" readonly>
                    </div>
                    <!-- <div class="col-6">
                        <div class="title-sm mb-1">Category</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="kategori" value="Cash Request"  readonly>
                    </div> -->
                    <div class="col-md-12">
                        <div class="title-sm">*Disbursement type</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="height:40px"><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="" name="kode_pencairan" style="cursor:pointer" required>
                                <option value="" selected>Disbursement type</option>
                                @foreach($jenis_pencairan as $key7=>$value7)
                                <option value="{{$value7->kode_jenis}}">{{$value7->jenis_pencairan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Jenis Pencairan</div>
                        <div class="flexx gap-5" >
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="kategori" value="Cash Request" class="radioOrange" id="cash">
                                <label for="cash" class="optionOrange check">
                                    <span class="descOrange">CASH</span> 
                                </label>
                            </div>
                            <div class="wrapperRadio w-100 mt-1">
                                <input type="radio" name="kategori" value="Transfer" class="radioBlue" id="tf">
                                <label for="tf" class="optionBlue check">
                                    <span class="descBlue">TRANSFER</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                    @if($data_rek['bank']!=null && $data_rek['rekening']!=null)
                    <div class="col-12">
                        <div class="title-sm mb-1">Rekening</div>
                        <div class="input-group flex mb-3">
                            <div class="input-group-prepend">
                                <select class="form-control pointer" id="" name="bank" style="border-radius:10px 0 0 10px">
                                    <option value="{{$data_rek['bank']}}" selected >{{$data_rek['bank']}}</option> 
                                </select>
                            </div>
                            <input type="number"  class="form-control borderInput" name="rekening" value="{{$data_rek['rekening']}}" readonly aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="title-sm mb-1">Rekening</div>
                        <div class="input-group flex mb-3">
                            <div class="input-group-prepend">
                                <select class="form-control pointer" id="" name="bank" style="border-radius:10px 0 0 10px">
                                    @if($data_rek['bank']!=null)
                                    <option value="{{$data_rek['bank']}}" selected >{{$data_rek['bank']}}</option> 
                                    @endif   
                                    <option value="BCA">BCA</option>    
                                    <option value="NIAGA">NIAGA</option>    
                                </select>
                            </div>
                            <input type="number"  class="form-control borderInput" name="rekening" value="{{$data_rek['rekening']}}" placeholder="No Rekening..." aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    @endif

                    <div class="col-6">
                        <div class="title-sm mb-1">*Amount</div>
                        <input type="number" class="form-control border-input-10 mb-3" name="amount_rencana" value="" placeholder="0,00" required>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Account Code</div>
                        @if(auth()->user()->branch=='CLN')
                            <input type="text" class="form-control border-input-10 mb-3" name="akun_kredit" value="1201.111110.IDR" placeholder="your name..." readonly>
                            <input type="hidden" class="form-control" name="kode_jde" value="1201">
                        @elseif(auth()->user()->branch=='MAJA')
                            <input type="text" class="form-control border-input-10 mb-3" name="akun_kredit" value="1204.111110.IDR" placeholder="your name..." readonly>
                            <input type="hidden" class="form-control" name="kode_jde" value="1204">
                        @elseif(auth()->user()->branch=='GK')
                            <input type="text" class="form-control border-input-10 mb-3" name="akun_kredit" value="1206.111110.IDR" placeholder="your name..." readonly>
                            <input type="hidden" class="form-control" name="kode_jde" value="1206">
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">*Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="deskripsi" value="" placeholder="your Description" style="height:120px" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" class="form-control" id="ext" name="ext" value="{{$data->ext}}">
                        <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik }}" >
                        <input type="hidden" class="form-control" id="status" name="status"  Value="Waiting">
                        <input type="hidden" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan"  Value="{{$date}}">
                        <input type="hidden" class="form-control" id="branch" name="branch" value="{{$user->branch}}" >
                        <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$user->branchdetail}}" >
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">*Approver</div>
                        <input type="text" class="form-control border-input-10 mb-3" value="{{$nik_manager->karyawan->nama??null}}" placeholder="Automatic from setting..." required onkeypress="return false;">
                    </div>
                    <div class="col-12 mb-2 mt-4">
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        const options = document.getElementsByClassName('select2-selection--single');
        Array.from(options).forEach(function (element) {
            element.style = "height : 40px !important";
            // console.log(element);
        });
    });
</script>